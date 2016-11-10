<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add staff advisor</title>

</head>

<body>
<form id="form1" name="form1" method="post" action="actaddadvsr.php" >
 <div class="boxHead" style="height:5%">Select a staff Advisor</div>
 <div class="newbtn"><a href="dashboard_hod.php?menu=view_advsr">VIEW ALL STAFF ADVISOR</a></div>
<center><table><tr>
  <td height="40">&nbsp;</td></tr><tr><td>staff name :</td><td>
  <select name="staff">
  <option value="">--Choose Staff Name--</option>
  <?php
  ob_start();
session_start();
include('connect1.php');

	$user=$_SESSION['log_user'];
	$sql="select id from department where hod='$user'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$id=$row['id'];
	}
	$sql1="select staff_id from staff_dep where dept_id='$id'";
	$result1=mysqli_query($conn,$sql1);
	while($row=mysqli_fetch_array($result1))
	{
		$p=$row['staff_id'];
		$sql2="select name from staff_detail where staff_id='$p'";
		$result2=mysqli_query($conn,$sql2);
		while($row1=mysqli_fetch_array($result2))
		{
			$name=$row1['name'];			?>
        <option value="<?php echo $p;
		?>"> <?php echo $name;?></option>
        <?php
	}
	}
	
  ?>
  </select>
  </td></tr>
<tr>
  <tr>
    <td>course</td><td>
  <select name="cid" id="chk" >
  <option>Choose Course</option>
  <?php
    $cid="select course_id from dept_course where dept_id='$id'";
  $re=mysqli_query($conn,$cid);
  while($row=mysqli_fetch_array($re))
  {
	  $cid2=$row["course_id"];
	  //echo "courseid".$cid2;
	  $cn="select course from courses where id='$cid2'"	;
	  $cnr=mysqli_query($conn,$cn);
	  while($row1=mysqli_fetch_array($cnr)) 
	  {
		  $cnn=$row1["course"];
		  
		  	  	?>
     <option value="<?php echo $cid2; ?>" > <?php echo $cnn;?></option> 
     <?php
  
  }
  }
 
  ?>
    </select>
  </td></tr>
<tr><td>Batch:</td><td>
<select name="batch">
  <option>Choose Batch</option>

<?php 
//echo "fhsgjshdj".$id;
$a="select course_id,spec_id from dept_course where dept_id='$id'";
$re=mysqli_query($conn,$a);
while($row=mysqli_fetch_array($re))
  {
	  $cid2=$row["course_id"];
	  $sid2=$row["spec_id"];
	  echo "hshjshjhs".$cid2;
	  echo $sid2;
	  	  $cn="select course_spec_id from course_specialization where course_id=$cid2 and spec_id=$sid2";
	  $cnr=mysqli_query($conn,$cn);
	  while($row1=mysqli_fetch_array($cnr)) 
	  {
		  $cnn=$row1["course_spec_id"];
		  echo "ssfsfs".$cnn;
		  	$y="select year_batch from batch where course_spec_id=$cnn";
			$ey=mysqli_query($conn,$y);
			while($row=mysqli_fetch_array($ey))
			{
				echo $row["year_batch"];
		  	  	?>
                <option value=<?php echo $row["year_batch"] ?> ><?php echo $row["year_batch"] ?></option>
                <?php
			}
	  }
  }
				?>
</select>

</table></center>
<input type="text" value="<?php echo $id; ?>"  name="id" hidden="1">
<center><input type="submit" value="save"><input type="reset" name="" id="" value="Cancel"/></center>
</form>


</body>
</html>