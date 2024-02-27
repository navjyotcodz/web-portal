<?php
session_start();
 include "nav_config.php";
 include 'auth_session.php';

 include'navbar.php';

   $mode = $_REQUEST['mode'];
   $id = $_REQUEST['id'];
   
 if($mode==''){
	echo $mode="add";
  }
?>
<!DOCTYPE html> 
<html>
<head>
 <title></title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
   
   

</head>
<body>
<div><br>
 <form action="nav_save.php" name="frm_stud" method="POST" enctype="multipart/form-data">
 <input type="hidden" name="mode" value="<?php echo $mode; ?>">
<input type="hidden" name="id" value="<?php echo $id; ?>">

	
   <h5 class= text-center> Certificate Form</h5>
 <div class="container">  
 <div class="col-lg-12">
 <br><br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-light text-dark text-center">
 
 
 <th> Id </th>
 <th> Firstname </th>
 <th> Qualification </th>
 <th><label>Certificate upload<label></th>

 <th> Action </th>
 </tr >
 
 <?php
 
 include 'nav_config.php';
     $sql = "select a.id ,a.certificate ,a.firstname,c.quali_name from stud_table a join qualification c on a.qualification=c.id  WHERE a.id='$id' ";
   
  $result = mysqli_query($conn,$sql);

 while($res = mysqli_fetch_array($result)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['id'];?> </td>
 <td> <?php echo $res['firstname'];?> </td>
 <td> <?php echo $res['quali_name']; ?> </td>
  <td> <input type="file" name="certificate"><?php echo $res['certificate'];  ?></td>
  
 <td> <button type="submit" class="btn-light" name="submit" onclick="return save()">send</button> </td>


 </tr>

 <?php 
 }
  ?>
 
 </table>  
 
 </div>
 </div>


</form>
</div>
</body>
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

</html>
