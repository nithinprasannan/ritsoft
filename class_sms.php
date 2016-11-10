<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="classsend.php"  >
 <div class="boxHead" style="height:5%">Send message for class</div>
 <?php
 include('connect1.php');
 ob_start();
session_start();

	$user=$_SESSION['log_user'];
	$sql="select id from department where hod='$user'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$id=$row['id'];
		
	}
	
	?>
	<table width="392"><tr>
	    <td width="126" height="50">course</td><td width="162">
  <select name="course" id="chk" >
  <option>--choose course--</option>
  <?php
    $cid="select course_id from dept_course where dept_id=$id";
  $re=mysqli_query($conn,$cid);
  while($row=mysqli_fetch_array($re))
  {
	  $cid2=$row["course_id"];
	  $cn="select course from courses where id=$cid2"	;
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
  <tr><td height="55">Batch:</td><td>

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
</select></td></tr> 
<tr>
  <td width="126">Message :&nbsp;</td><td width="162"><textarea name="msg"></textarea></td></tr>
</table>
  <center>
  <input type="submit" value="send"><input type="reset" name="" id="" value="Cancel"/></center></form>
   </body>
</html>