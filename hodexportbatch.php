<html>
<head><title>Student detail exporting</title>
         <script language="javascript">
	
	// passing dept, course,batch detail as parameter to export
		function getpnr()
		{
			
			var course=document.getElementById('course').value;
			var batch=document.getElementById('batch').value;
			document.getElementById('export').href="dashboard_hod.php?menu=hodexportselectbatch&para1="+course+"&para2="+batch;
					
		}
				</script>    </head>
<body>
<div class="boxHead" style="height:5%;">Exporting student details</div>
<br>
<br>
<br>
<center>
<table width="411">
<tr>
<td width="202" height="38" bgcolor="#999999" >
<a href="dashboard_hod.php?menu=hodexportall"><center>
All student
</center></a>
</td>
<td width="202" height="38" bgcolor="#00CCFF" >
<a href="dashboard_hod.php?menu=hodexportbatch"><center> Batch</center></a>
</td>
</tr>
</table>
<form>
<br><br><br>
<table width="410">
<tr>
  <td width="167" height="46">&nbsp;</td><td width="231">&nbsp;</td>
</tr>
<td>Course :</td><td><select name='course' id="course">
<?php
ob_start();
include('connect1.php');
  session_start();
$user=$_SESSION['log_user'];
$did="select id from department where hod='$user'";
$result=mysqli_query($conn,$did);
while($r=mysqli_fetch_array($result))
{
	$id=$r['id'];
}
    $cid="select distinct course_id from dept_course where dept_id='$id'";
  $re=mysqli_query($conn,$cid);
  while($row=mysqli_fetch_array($re))
  {
	  $cid2=$row["course_id"];
	  $cn="select course from courses where id='$cid2'"	;
	  $cnr=mysqli_query($conn,$cn);
	  while($row1=mysqli_fetch_array($cnr)) 
	  {
		  $cnn=$row1["course"];
		?>
     <option value="<?php echo $cnn; ?>" > <?php echo $cnn;?></option> 
     <?php
  
  }
  }
  
  ?>
   
	
</select></td></tr>
<tr><td>Year of Batch :</td><td><input type="text" name="batch" id="batch"></td></tr></table>
<br><br>

&nbsp;</p>
<a id='export' onclick='getpnr()'> <table>
<tr><td width="202" height="38" bgcolor="#999999" ><center>Export</center></td></tr></table>
</a>
</form>
</center>

</body>
</html>