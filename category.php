<?php
include 'nav_config.php';
include 'auth_session.php';
include 'navbar.php';

 if(isset($_POST['submit1'])){
	 $category =$_POST['category'];
	 
	 $username = $_SESSION["username"];
		$query ="SELECT id from user where username ='$username'";
         $result = mysqli_query($conn, $query);
		 if($result){
			 $row =mysqli_fetch_assoc($result);
            $user_id = $row['id'];
	 
	 if(empty($category)){
	 echo '<script>alert("please enter category")</script>'; 
	}
    else
    {
	 $sql= "INSERT into act_master (category_name,user_id) values('$category','$user_id')";
	 $result=mysqli_query($conn,$sql);
	 if($result){
		echo '<script>alert("Data inserted");</script>';
	 }else{
		 echo '<script>alert("not inserted")</script>';
     }
   }
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
  min-height: 100vh;
  background: url("nav/p8.avif") no-repeat;
  background-size: cover;
  background-position: center;
}

	
.wrapper{
  width: 470px;
  height:300px;
  background: transparent;
  border: 2px solid white;
  backdrop-filter: blur(24px);
  color: #fff;
  border-radius: 12px;
  padding: 30px 40px;
  margin-left:550px;
    margin-top:150px;

}

.wrapper h1{
  font-size: 36px;
  text-align: center;
}
.wrapper .input-box{
  position: relative;
  width: 100%;
  height: 50px;
  
  margin: 30px 0;
}
.input-box input{
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid white;
  border-radius: 40px;
  font-size: 16px;
  color: #fff;
  padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
  color: #fff;
}

.wrapper .btn{
  width: 100%;
  height: 45px;
  background: #fff;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, .1);
  cursor: pointer;
  font-size: 16px;
  color: #333;
  font-weight: 600;
}
</style>
</head>
<body>

<div class="wrapper">
        <form action="" method="POST">
        <h1>Category form</h1>

        <form action="" method="POST">
		 <div class="input-box">
        <input type="text" name="category" placeholder="Enter category" >
      </div>
	   <button type="submit" name="submit1" class="btn">submit</button>	
</form>
</div>
<script>
    function confirmLogout() {
        var confirmLogout = confirm('are you want to logout');
        if (confirmLogout) {
            window.location.href = "logout.php";


        }
    }
</script>
</body>
</html>