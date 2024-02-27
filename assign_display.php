<?php
include "nav_config.php";
include 'auth_session.php';

$mode = $_REQUEST['mode'];
$id = $_REQUEST['id'];
$user_id = $_REQUEST['user_id'];
$menu_id = $_REQUEST['menu_id'];
 
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
<?php 
include 'navbar.php';
?>
	<div><br>
  <form action="" method="POST">
<div class="container">  
 <div class="col-lg-12">
 <br><br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 <tr class="bg-light text-dark text-center">
 <th> sno</th>
  <th> user_id</th>
 <th> menu_id</th>
	<?php 
	
	 include "nav_config.php";
  $sql ="SELECT a.*,b.username,c.menu_name FROM user_menu a,user b ,menu c where a.user_id =b.id and a.menu_id =c.id order by user_id asc";
  $result= mysqli_query($conn,$sql);
  
  $p=1;
  while($res =mysqli_fetch_array($result)){
	   $id = $res['id'];
	  ?>
   <tr class="text-center">
   <td> <?php echo $p;?> </td>
   <td> <?php echo $res['username'];?> </td>
   <td> <?php echo $res['menu_name'];?> </td>

 <?php 
 $p++;
  };?>
  </table> 
 </div>
 </div>

</form>
</div>
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
