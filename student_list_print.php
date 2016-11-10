
<div class="boxHead" style="padding-top:1.5%; height:auto;"><center>STUDENTS LIST FOR SEM REGISTRATION</center>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link href="css/list.css" rel="stylesheet" />

<style>
#header{background-color: #fff;
  /*width: 109%;*/
  margin: 0 auto;
  vertical-align: middle;
  line-height: 102px;
  padding-bottom: 1px;
  /* margin: 0px; */
  margin-bottom: 8px;}
#header img{  margin-top: 12px;}
form label{    font-family: Times New Roman !important;    font-size: 16px;    font-weight: normal;}

form table{ background-color:#FFF}
	</style>


<body onLoad="javascript :window .print();">

<?php
error_reporting(0);
// student list for sem registration
session_start();
if(!(isset($_SESSION['log_user'])))
	header('Location:index.php');
$course=$_SESSION['course'];
	$branch=$_SESSION['branch'];   
	$batch=$_SESSION['batch'];
$conn = mysql_connect("localhost","root","");
mysql_select_db("ritsoft",$conn);
$result = mysql_query("select  * from stud_sem_registration sr where sr.batch_id=(select batch_id from batch where course_spec_id=(select course_spec_id from course_specialization where spec_id=(select spec_id from specialization where specialisation='$branch') and course_id=(select id from courses where course='$course')) and year_batch=$batch)");
?>
<html>
<body>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<table>
<tr>

<td>ADMISSION NUMBER</td>
<td>NAME</td>
<td>COURSE</td>
<TD>BRANCH</TD>
<td>BATCH</td>
<TD>APPLICATION STATUS</TD>
<TD>APPLIED DATE</TD>
<TD>APPROVE STATUS</TD>
<TD>APPROVED DATE</TD>
<td>PREVIOUS SEMESTER</td>
<TD>SEMESTER TO WHICH PROMOTION SAUGHT FOR</TD>
</tr>
<?php
$i=0;
while($row = mysql_fetch_array($result)) {

$sql2="select name from stud where adm_no='$row[adm_no]'";
	$result2=mysql_query($sql2);
	while($db_field=mysql_fetch_assoc($result2))
	{ 
	$name=$db_field['name'];
	}

?>
<tr>

<td><?php echo $row["adm_no"]; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $course; ?></td>
<td><?php echo $branch; ?></td>
<td><?php echo $batch; ?></td>
<td><?php echo $row["apl_status"]; ?></td>
<td><?php echo $row["apl_date"]; ?></td>
<td><?php echo $row["apv_status"]; ?></td>
<td><?php  $yr=$row["apv_date"];
if($yr!='0000-00-00')
{
$yr=date("d-m-Y",strtotime($yr));
echo $yr;
}
 ?></td>
<td><?php echo $row["previous_sem"]; ?></td>
<td><?php echo $row["new_sem"]; ?></td>
</tr>
<?php
$i++;
}
?>

</table>
</form>
</div>
</body></html>
