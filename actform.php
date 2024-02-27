<?php 
error_reporting(0);
include 'nav_config.php';
include 'auth_session.php';

echo $mode;
  $mode=$_REQUEST['mode'];
  $id=$_REQUEST['id'];
   echo $category=$_REQUEST['category'];
    $title=$_REQUEST['title'];
  $description=$_REQUEST['description'];
  $applicability=$_REQUEST['applicability'];
  $date =$_REQUEST['date'];
  $state=$_REQUEST['state'];
   $type_act=$_REQUEST['type_act'];
  $industry=$_REQUEST['industry'];
  

	 


  if ($mode == '') {
    $mode = "add";
 }
 
 if ($mode == "edit") {
  $sql = "SELECT * FROM `actform` WHERE `id`='$id'";
  $result = $conn->query($sql);
  $res = mysqli_fetch_array($result);

    if($result)
	{		
        $category = $res['act_category'];
          $title = $res['short_title'];
            $description = $res['description'];
			$applicability = $res['applicability'];
		   $date = $res['wef'];
		    echo $type_act = $res['type_act'];
		 $industry = $res['act_industry'];
			$m_industry_name =rtrim($industry,",");
			
			$state = $res['state'];
			$target_file = $res['file_name'];

       
	}            	
 }
   

  if($mode=="delete")
  {  
	 $sql = "DELETE FROM `actform` WHERE `id`='$id'";
     $result = $conn->query($sql);
     if ($result == TRUE){
	 echo '<script>alert("Record delete successfully.");
	 window.location.href="actform_display.php"
	 </script>';
	 exit;
    }else{      
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  body{
  justify-content: center;
  align-items: center;
  min-height: 10vh;
  background: url("nav/p8.avif") no-repeat;
  background-size: cover;
  background-position: center;
}

.wrapper{
  width: 450px;
  background: transparent;
  border: 3px solid rgba(255, 255, 255, .2);
  backdrop-filter: blur(15px);
  color: white;
  font-size:19px;
  border-radius: 12px;
  padding: 15px 20px;
  margin-left:480px;
    margin-top:0;


}
.input-boxi select {
    color: white;
    background-color: transparent;
  }

  .input-boxi option {
    background-color: transparent;
  }

  .input-boxi select[multiple] {
    height: auto;
  }

  .input-boxi select[multiple] option:selected {
    background-color: green;
  }
.wrapper h1{
  font-size: 36px;
  text-align: center;
}
.wrapper .input-box{
  position: relative;
  width: 100%;
  height: 40px;
  margin:25px 0;
}
.input-box input{
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid rgba(255, 255, 255, .2);
  border-radius: 40px;
  font-size: 16px;
  color: white;
  padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
  color: white;
padding:5px;
  font-size:20px;
  border-radius:5px;
}

.wrapper .btn{
  width: 100%;
  height: 45px;
background-color:#fff;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, .1);
  cursor: pointer;
  font-size: 16px;
  color: #333;
  font-weight: 600;
}
.b1{
	background-color:transparent;
	color:white;
	font-size:19px;
}

.input-box select{
	color:white;
	background-color:transparent;
}
.input-box select option{
	color:white;
  background-color:black;

}
.input-box input{
	color:white;
	padding:10px 5px ;
}


  </style>
</head>
<body>
<?php 
include 'navbar.php';
?>
 <div class="wrapper">
   <form id="studentForm" name="frm_stud" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="mode" value="<?php echo $mode;?>">
	<input type="hidden" name="id" value="<?php echo $id;?>"> 
	
    <div class="input-box">
	<select name="category" class="input-box" value="<?php echo $category ;?>">
	<option  value="">select category</option>
    <?php 
	include 'nav_config.php';
    $sql ="SELECT * FROM act_master";
	$result =mysqli_query($conn,$sql);
	while($res=mysqli_fetch_array($result)){
		$id=$res['id'];
		$category_name=$res['category_name'];
	?>
		echo "<option value="<?php echo $id?>" <?php  if($id == $category){?>selected<?php } ?>><?php echo $res["category_name"];?></option>";	 
	<?php
	}
	?>
	</select></div>
    <div class="input-box">
	<input type="text" name="title" placeholder="Enter short title" value= "<?php echo $title; ?>"></div>
    <div class="input-box">
	<input type="text" name="description" value= "<?php echo $description; ?>"  placeholder="Enter some text"></div>
    <div class="input-box">
	<input type="text" name="applicability" pattern ="[0-9]+" value="<?php echo $applicability; ?>" placeholder="Enter applicability"></div>
	            <div class="input-box">
	<input type="date" name="date"  value="<?php echo $date; ?>" title="enter date in mm-dd-yyy formet"></div>
    <div class="input-box">
	<select name="state" class="input-box b1" value= "<?php echo $state; ?>">
	<option  value="">select states</option>
	<?php
	$sql="SELECT * from states ";
	$result=mysqli_query($conn,$sql);
	while($res=mysqli_fetch_array($result)){
		$id=$res['id'];
		?>
		echo " <option  value="<?php echo $id?>" <?php if($state == $id){?>selected<?php } ?>><?php echo $res["states_name"];?></option>";
		
		<?php
	}
	?>
	</select></div>
	<label>Industry</label>
    <div class="input-boxi">
	<select name="industry[]"   value="<?php echo $industry; ?>" id="industry" multiple>
	<option  value="">select industry</option>
	<?php
	$ind=explode (",","$m_industry_name");
	$sql="SELECT * from act_industry ";
	$result=mysqli_query($conn,$sql);
	while($res=mysqli_fetch_array($result)){
		$id=$res['id'];
		?>
		echo " <option  value="<?php echo $id?>" <?php if(in_array($id,$ind) == $id){?>selected<?php } ?>><?php echo $res["industry_name"];?></option>";
		<?php
	}
	?>
	</select></div><br>
	<div class="input-box">
	<input type="file"  class="input-box " name="file_name" value="<?php echo  $target_file ?>"><?php echo  $target_file ?> </div>
	<br><div class="input-box">
	<select name="type_act" class="input-box b1" value="<?php echo $type_act;?>">
	<option value="">select Act</option>
	<option value="State" <?php if($type_act == "State") echo "selected"; ?>>State</option>
	<option value="National"<?php if($type_act == "National") echo "selected"; ?>>National</option>
	</select></div>
	<button type="submit" name="done" class="btn" onclick="return ss()">submit</button>
	</form>
   </div>
<script src="nav_script.js"></script>
<script>
    function confirmLogout() {
        var confirmLogout = confirm('are you want to logout');
        if (confirmLogout) {
            window.location.href = "logout.php";
            header('location: login.php');


        }
    }
</script>
</body>
</html>
