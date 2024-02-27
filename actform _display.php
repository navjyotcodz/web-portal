<?php

include 'nav_config.php';
include'navbar.php';
 $valueTooSearch =$_REQUEST['sel_states'];
 $valueSearch =$_REQUEST['sel_category'];
  $valueTSearch =$_REQUEST['sel_type'];

$category=$_REQUEST['category'];
  $title=$_REQUEST['title'];
 $description=$_REQUEST['description'];
 $applicability=$_REQUEST['applicability'];
 $date =$_REQUEST['date'];
  $state=$_REQUEST['state'];
 $type_act=$_REQUEST['type_act'];
 $target_file=$_REQUEST['file_name'];
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
  <form action="" method="POST">
&nbsp &nbsp <label>States</label>
	&nbsp <select name="sel_states" onchange="form.submit()">
	<option  value="">select states</option>
	<?php
	include 'nav_config.php';
	 $sql="SELECT distinct a.state,b.states_name,b.id from actform a,states b where a.state =b.id ORDER BY b.states_name ASC";
	$result=mysqli_query($conn,$sql);
		//mysqli_fetch_array function k zariye result set s data fetch kia jarha h aur res variable m store krrha h
	while($res=mysqli_fetch_array($result)){
    $state = $res['state'];
		$id=$res['id'];
		?>
		echo " <option  value="<?php echo $id?>" <?if($id == $valueTooSearch){?>selected<?} ?>><?php echo $res["states_name"];?></option>";
		<?php
	}
	?>
	</select>&nbsp &nbsp
	<label>Category</label>
	<select name="sel_category" onchange="form.submit()"> 
		<option value="">select category</option>
 <?php 
 $sql="SELECT distinct a.act_category,b.category_name,b.id from actform a,act_master b where a.act_category =b.id";
 $result= mysqli_query($conn,$sql);
 	while($res=mysqli_fetch_array($result)){
     $category=$res['category'];
	$id=$res['id'];
	?>
	echo " <option  value="<?php echo $id?>" <?if($id == $valueSearch){?>selected<?} ?>><?php echo $res["category_name"];?></option>";
		<?php
	}
 ?>

</select>

&nbsp &nbsp
<label>Type act</label>
	<select name="sel_type" onchange="form.submit()"> 
		<option value="">select type act</option>
 <?php 
 if(!empty($valueTooSearch))
	{
		$stmt = " where  b.id ='$valueTSearch'";
	}
 $sql="SELECT distinct type_act from actform";
 $result= mysqli_query($conn,$sql);
 	while($res=mysqli_fetch_array($result)){
     $type_act=$res['type_act'];
	$id=$res['id'];
	?>
	echo " <option  value="<?php echo $type_act?>" <?if($type_act == $valueTSearch){?>selected<?} ?>><?php echo $res["type_act"];?></option>";
		<?php
	}
 ?>

</select>



 <div class="col-lg-12">
 <br><br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 <tr class="bg-light text-dark text-center">
 
 <th> sno</th>
  <th>Category</th>
 <th> Short Title</th>
 <th> Description</th>
 <th> Applicability</th>
 <th> WEF</th>
 <th> State</th>
 <th> Uploads</th>
 <th> Type of ACT</th>
 <th> Industry</th>

 <?php
  include'nav_config.php';
	 if(!empty($valueTooSearch)){
	 		$stmt = " AND  b.id='$valueTooSearch'";
	 }
	 
	 if(!empty($valueSearch)){
	 		$stmtt = " AND  c.id='$valueSearch'";
	 }
	  if(!empty($valueTSearch)){
	 		$stmttt = " AND  type_act='$valueTSearch'";
	 }
  $sql="select a.*,b.states_name ,c.category_name,d.industry_name from actform a ,states b ,act_industry d ,act_master c where a.state=b.id and a.act_category =c.id and a.act_industry =d.id  $stmt $stmtt  $stmttt";


  $result=mysqli_query($conn,$sql);
   $p=1;
  while ($res = mysqli_fetch_array($result))
	 
      {
       ?>
 <tr class="text-center">
         <td> <?php echo  $p; ?> </td>
         <td> <?php echo $res['category_name'];?> </td>
         <td> <?php echo $res['short_title']; ?> </td>
		 <td> <?php echo $res['description']; ?> </td>
         <td> <?php echo $res['applicability']; ?> </td>
         <td> <?php echo $res['wef']; ?> </td>
         <td> <?php echo $res['states_name']; ?> </td>
         <td><img src="<?php echo $res['file_name']; ?>" width="100px" height="50px"></a></td>
         <td> <?php echo $res['type_act']; ?> </td>
		 
          <td><?php 
         $industryIds = explode(",",$res['act_industry']);
         $indIdString =implode(',' ,$industryIds);
         $indQuery ="SELECT industry_name FROM act_industry WHERE id IN ($indIdString)";
         $Result =mysqli_query($conn,$indQuery);
          if(!$Result){
	    die('Error: '.mysqli_error($conn));
        }
        $indNames =mysqli_fetch_all($Result,MYSQLI_ASSOC)	;
        $indNames =array_column($indNames,'industry_name');
         echo implode(",",$indNames);
        ?> </td>
	 </tr>		
	 <?php
	 $p++;
	 }
 ?>
 </table> 
 </div>

</form>
</div>
</body>
</html>