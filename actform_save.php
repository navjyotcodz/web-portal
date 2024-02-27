<?php
session_start();
include "nav_config.php";
include 'auth_session.php';

if(isset($_REQUEST['done'])){

  $mode=$_REQUEST['mode'];
  $id=$_REQUEST['id'];
  $category=$_REQUEST['category'];
  $title=$_REQUEST['title'];
  $description=$_REQUEST['description'];
  $applicability=$_REQUEST['applicability'];
  $date =$_REQUEST['date'];
  $state=$_REQUEST['state'];
  $industry=$_REQUEST['industry'];
  $industry_string = implode(",", $industry);
  $type_act=$_REQUEST['type_act'];
  
  $username = $_SESSION["username"];
		$query ="SELECT id from user where username ='$username'";
         $result = mysqli_query($conn, $query);
		 if($result){
			 $row =mysqli_fetch_assoc($result);
            $user_id = $row['id'];
  
  
  
    if ($mode == 'add')
    {

        $target_dir = "nabo/";
        $target_file = $target_dir . basename($_FILES["file_name"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["done"]))
        {
            $check = getimagesize($_FILES["file_name"]["tmp_name"]);
            if ($check !== false)
            {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            }
            else
            {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file))
        {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["file_name"]["size"] > 500000)
        {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        )
        {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0)
        {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        }
        else
        {
            if (move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_file))
            {
                echo "The file " . htmlspecialchars(basename($_FILES["file_name"]["name"])) . " has been uploaded.";
            }
            else
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }

       echo $sql= "INSERT INTO actform(`act_category`, `short_title`,`description`, `applicability`,`wef`, `state`,`act_industry`,`file_name`,`type_act`,`user_id`) VALUES ('$category', '$title','$description', '$applicability','$date','$state','$industry_string','$target_file', '$type_act','$user_id')";

       $result = mysqli_query($conn, $sql);
        if ($result){
       if ($mode == 'add'){
?>
            <script>
                alert("data inserted");
                window.location.href = "actform_display.php";
            </script>
        
<?php
        }
        else
        {
            echo "data not inserted";
        }
    }
	}	
}

}

if ($mode == "edit")
{

    $rand = rand(1000, 9999);
    $target_dir = 'nabo/' . ($rand + 1) . '.jpeg';

    $tf = fopen($target_dir, 'w');
    fclose($tf);

    $target_name = $_FILES['file_name']['name'];
    $file_name_in_db = basename($target_name);
    $target_dir_in_db = str_replace('nabo/', '', $target_dir);
    $target_file = $target_dir . $target_name;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image


    // Check if file already exists
    if (file_exists($target_file))
    {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file_name"]["size"] > 500000)
    {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    )
    {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0)
    {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file 
    }
    else
    {
        if (move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_file))
        {
            echo "The file " . htmlspecialchars(basename($_FILES["file_name"]["name"])) . " has been uploaded.";
        }
        else
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if (!empty($_FILES["file_name"]["tmp_name"]))
    {
        echo "yes";
        $f = ",`file_name`='$target_file'";
    }
    else
    {
        echo "no";
    }

    $sql = "UPDATE `actform` SET `act_category`='$category',`short_title`='$title',`description`='$description',`applicability`='$applicability',`state` ='$state',`act_industry`='$industry_string',`type_act` ='$type_act' $f WHERE `id`='$id'";

    $result = $conn->query($sql);
    if ($result == TRUE)
    {
        ?>
        <script>
            alert("Record updated successfully.");
            window.location.href = "actform_display.php";
        </script>
<?php 
        // echo "Record updated successfully.";
    }
    else
    {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}



?>