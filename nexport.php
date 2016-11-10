<!doctype html>
<html>
<head>
<script language="javascript">
function getcourse()
{
	document.getElementById('form1').submit();
}
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
			<script>
        function getpnr()
		{
			
			var course=document.getElementById('course').value;
			var batch=document.getElementById('batch').value;
			var dept=document.getElementById('dept').value;
			var spec=document.getElementById('spec').value;
			document.getElementById('export').href="dashboard_principal.php?menu=nexportselect&para1="+course+"&para2="+batch+"&para3="+dept+"&para4="+spec;
					
		}
				</script>
<meta charset="utf-8">

<title>student searching</title>

</head>

<body>
<div class="boxHead" style="padding-top:1.5%; height:auto;">Export data</div>

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data"  > 
<table width="881"><tr><td width="142" height="82">Department :</td><td width="144">
<?php
include('connect1.php');
echo '<select name="dept" id="dept" onChange="getcourse()">';
echo "<option value=''>---select---</option>";
$order = "SELECT dept FROM department;";	
$result=mysqli_query($conn,$order);					
while($f=mysqli_fetch_array($result))
{
	
		if(isset($_POST['dept']))
		 {
			 echo '<option ';
			 if($_REQUEST['dept']==$f['dept'])
			 echo 'selected = "selected" ';
			 echo " value='$f[0]' >".$f[0]."</option>";
			 
			
		 }
		else
		{
					echo "<option id='' value=".$f[0].">".$f[0]."</option>";
					
		}
		
		 
}
		 
      echo '</select>';
	  
	   if(isset($_POST['dept']))
		 {
		 	$ndept=$_POST['dept'];
		 
		 }
		 else
		 {
			 
		 }
?></td>
<td width="82">Course :</td><td width="165">
<?php
echo"<select name='course' id='course' onChange='getcourse()'>";
echo "<option value=''>--select--</option>";
$y="select id from department where dept='$ndept'";
$ey=mysqli_query($conn,$y);
while($r=mysqli_fetch_array($ey))
{
	$id=$r['id'];
}
$x="select distinct course_id from dept_course where dept_id='$id'";
$ex=mysqli_query($conn,$x);
while($r=mysqli_fetch_array($ex))
{
	$cid=$r['course_id'];
	$sql="select distinct course from courses where id='$cid'";
	$resultcc=mysqli_query($conn,$sql);
	while($f=mysqli_fetch_array($resultcc))
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
					//echo 'selected = "selected" ';
		 }
		
		 
	}
}
echo '</select>';
	  
	   if(isset($_POST['course']))
		 {
		 	$nc=$_POST['course'];
		 
		 }
		 else
		 {
			 
		 }
	 ?>
       </td>
   </tr>
   <tr>
       <td width="76">Specialization:</td>
    <td width="244">
    <select name="spec" id="spec" onChange="getcourse()">
    <option value="">-- select--</option>
    <?php
	$y="select id from department where dept='$ndept'";
$ey=mysqli_query($conn,$y);
while($r=mysqli_fetch_array($ey))
{
	$did=$r['id'];
}
	$y="select id from courses where course='$nc'";
$ey=mysqli_query($conn,$y);
while($r=mysqli_fetch_array($ey))
{
	$id=$r['id'];
}

$s="select spec_id from dept_course where course_id='$id' and dept_id='$did'";
$es=mysqli_query($conn,$s);
while($r=mysqli_fetch_array($es))
{
	$sid=$r['spec_id'];
	$spe="select specialisation  from specialization where spec_id='$sid'";
						 		$sp=mysqli_query($conn,$spe);
								while($f=mysqli_fetch_array($sp))
									{
										if(isset($_POST['spec']))
											 {
			 									echo '<option ';
			 									if($_REQUEST['spec']==$f['specialisation'])
												{
												
												 echo 'selected = "selected" ';
												}
			 										echo " value='$f[0]' >".$f[0]."</option>";
			 
					
		 									}
										else
											{
													echo "<option id='' value=".$f[0].">".$f[0]."</option>";
											}
		
		 
									}
}
								?>	
                                
								
							
	</select>
	  <?php
	   if(isset($_POST['spec']))
		 {
		 	$sp=$_POST['spec'];
		 
		 }
		 else
		 {
		 }
        
	  	
	?>
	    <td width="82">Batch:</td>
    <td>
    
    <select name="batch" id="batch">
    <option value="">---select--</option>
    <?php
			$y="select id from courses where course='$nc'";
$ey=mysqli_query($conn,$y);
while($r=mysqli_fetch_array($ey))
{
	$id=$r['id'];
}
$c="select spec_id from specialization  where specialisation='$sp'";
$ec=mysqli_query($conn,$c);
while($r=mysqli_fetch_array($ec))
{
	$sid=$r['spec_id'];
}
$a="select course_spec_id from course_specialization where course_id='$id' and spec_id='$sid'";
$ea=mysqli_query($conn,$a);
while($r=mysqli_fetch_array($ea))
{
	$csid=$r['course_spec_id'];
	$h="select batch_id from batch where course_spec_id='$csid'";
	$eh=mysqli_query($conn,$h);
	while($r=mysqli_fetch_array($eh))
	{
			
					$bid=$r['batch_id'];	
						$year="select distinct year_batch from batch where batch_id='$bid'";
						 $ryear=mysqli_query($conn,$year);
						 while($f=mysqli_fetch_array($ryear))
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
	
	  echo '</select>';
	  
	   
        	
    ?>
	</select></td></td></tr></table>
<p>&nbsp;</p>
<p>&nbsp;</p>

<a id='export' onclick='getpnr()'> <center><table>
<tr><td width="202" height="38" bgcolor="#999999" ><center>Export</center></td></tr></table></center>
</a>