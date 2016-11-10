<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>sending sms</title>
   

 <script>
 
	
	// passing dept, course,batch detail as parameter to export
		function getpnr()
		{
			
			var no=document.getElementById('no').value;
			var msg=document.getElementById('msg').value;
						document.getElementById('send').href="actstudsms.php?no="+no+"&msg="+msg;
					
		}
			function getcourse()
{
	document.getElementById('form1').submit();
}
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>

<body>

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data"  >
<div class="boxHead" style="height:5%;">sending SMS</div>
<table><tr><td>Batch : </td><td>
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
	echo '<select name="batch" id="batch" onchange="getcourse()">';
echo "<option value='-1'>---Select---</option>";
$a="select course_id,spec_id from dept_course where dept_id='$id'";
$re=mysqli_query($conn,$a);
while($row=mysqli_fetch_array($re))
  {
	  $cid2=$row["course_id"];
	  $sid2=$row["spec_id"];
	  //echo "hshjshjhs".$cid2;
	  //echo $sid2;
	  	  $cn="select course_spec_id from course_specialization where course_id=$cid2 and spec_id=$sid2";
	  $cnr=mysqli_query($conn,$cn);
	  while($row1=mysqli_fetch_array($cnr)) 
	  {
		  $cnn=$row1["course_spec_id"];
		  //echo "ssfsfs".$cnn;
		  	$y="select year_batch from batch where course_spec_id=$cnn";
			$ey=mysqli_query($conn,$y);
			while($f=mysqli_fetch_array($ey))
			{
				
					if(isset($_POST['batch']))
		 				{
			 				echo '<option ';
			 				if($_REQUEST['batch']==$f['year_batch'])
			 					echo 'selected = "selected" ';
			 					echo " value='$f[0]' >".$f[0]."</option>";
			 
					
		 				}
						else
							{
								echo "<option id='' value=".$f[0].">".$f[0]."</option>";
							}
		
			}
	  }
  }
  echo "</select>";
  if(isset($_POST['batch']))
		 {
		 	
		    $b=$_POST['batch'];
		 }
		 else
		 {
		 }
  
				?>
</td></tr>
<tr>
    <td>course</td><td>
   <?php
//dynamically select course
$user=$_SESSION['log_user'];
	$sql="select id from department where hod='$user'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$id=$row['id'];
		
	}
	//echo $id;
echo '<select name="course" id="course" onchange="getcourse()">';
echo "<option value='-1'>---Select---</option>";
 
	$s="select course_id from dept_course where dept_id=$id";
	echo $s;
	$es=mysqli_query($conn,$s);
	while($r=mysqli_fetch_array($es))
	{
				$cid=$r['course_id'];
				echo $cid;
				$x="select course from courses where id=$cid";
				$ex=mysqli_query($conn,$x);
				while($f=mysqli_fetch_array($ex))
				{
					if(isset($_POST['course']))
		 				{
			 				echo '<option ';
			 				if($_REQUEST['course']==$f['course'])
			 					echo 'selected = "selected" ';
			 					echo " value='$f[0]' >".$f[0]."</option>";
			 
					
		 				}
						else
							{
								echo "<option id='' value=".$f[0].">".$f[0]."</option>";
							}
		
		 
				
		 
			}

	}
	echo '</select>';
	
	if(isset($_POST['course']))
		 {
		 	$co=$_POST['course'];
		    $b=$_POST['batch'];
		 }
		 else
		 {
		 }
  ?>
  
  <tr><td>Student name</td><td><select name="no" id="no">
  <?php echo $b;?>
    <option>--select--</option>
  <?php
  $sq="select id from courses where course='$co'";
$resul=mysqli_query($conn,$sq);
while($row=mysqli_fetch_array($resul))
{	
  	$id=$row['id'];
}
    $sql="select spec_id from course_specialization where course_id=$id";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
{	
  	$spec=$row['spec_id'];
	$x="select course_spec_id from course_specialization where course_id=$id and spec_id=$spec";
	$ex=mysqli_query($conn,$x);
	while($r=mysqli_fetch_array($ex))
	{
		$csid=$r['course_spec_id'];
		$y="select batch_id from batch where course_spec_id=$csid and year_batch=$b";
		$ey=mysqli_query($conn,$y);
	while($r=mysqli_fetch_array($ey))
	{
		$bid=$r['batch_id'];
		$g="select adm_no from stud_batch_rel where batch_id=$bid";
		$eg=mysqli_query($conn,$g);
		while($r=mysqli_fetch_array($eg))
		{
			$adm=$r['adm_no'];
			$m="select name,mobile from stud where adm_no='$adm'";
			$em=mysqli_query($conn,$m);
			while($r=mysqli_fetch_array($em))
			{
				$mob=$r['mobile'];
				$name=$r['name'];
				?>
                <option value="<?php echo $adm; ?>"><?php echo $name; ?></option>
		<?php
        }
		}
		
	}
	}
	
}
?>
</select>
  <tr><td>Message :</td><td><textarea name="msg" id="msg"></textarea></table>
  <center><a id='send' onClick="getpnr()"> <table>
<tr><td width="202" height="38" bgcolor="#999999" ><center>send</center></td></tr></table>
</a></center>
  	</form>
    	
	</body>
</html>