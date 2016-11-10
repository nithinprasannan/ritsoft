<?php
ob_start();
session_start();
error_reporting(0);
?>
<?php 
 //session_start();
if(!(isset($_SESSION['log_user'])))
	header('Location:index.php');
$course=$_SESSION['course'];
$branch=$_SESSION['branch'];
$batch=$_SESSION['batch'];
$pr=$_SESSION['pr'];
$cr=$_SESSION['cr'];


?>
<style>
form input[type=text],form input[type=date],textarea,form  input[type=password],form select{     width: 210px;   height: 35px;    text-align: center; vertical-align:middle;} 
</style>
<div class="boxHead" style="padding-top:1.5%; height:auto;">STUDENT CERTIFICATE</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
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
	</style>
<form id="form1" name="form1" method="post" action="#" enctype="multipart/form-data" class="sear_frm">
  <div align="center">
    <h4>&nbsp;</h4>
    <table width="510" bordercolorlight="#C136F5" bgcolor="#B8D8E4">
      <tr>
        <th width="256" height="59" scope="row"><div align="left">Course</div></th>
        <td width="244">&nbsp;
          <div align="left">
            <input type="text" name="textfield" id="textfield" value="<?php echo $course;?>">
          </div></td>
      </tr>
      <tr>
        <th height="49" scope="row"><div align="left">
          <div align="left">Branch </div></th>
        <td>&nbsp;
          <div align="left">
            <input type="text" name="textfield2" id="textfield2" value="<?php echo $branch;?>">
          </div></td>
      </tr>
      <tr>
        <th height="80" scope="row"><div align="left">Batch</div></th>
        <td><div align="left">
          <input type="text" name="textfield3" id="textfield3" value="<?php echo $batch;?>">
        </div></td>
      </tr>
      <tr>
        <th height="46" scope="row"><div align="left">Previous Semester</div></th>
        <td><div align="left">
          <input type="text" name="textfield4" id="textfield4" value="<?php echo $pr;?>" disabled>
        </div></td>
      </tr>
      <tr>
        <th height="61" scope="row"><div align="left">New Semester</div></th>
        <td><div align="left">
          <input type="text" name="textfield5" id="textfield5" value="<?php echo $cr;?>" disabled>
        </div></td>
      </tr>
      <tr>
        <th height="74" colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit"></th>
      </tr>
    </table>
    <p>&nbsp;</p>
	<table>
	  <tr>
      </tr>
      <tr>
      </tr>
      <tr>
      <td colspan="2"><div align="center"></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
  </table>
    <p>&nbsp;</p>
</div>
<?php 
  if (isset($_POST['submit']))
	{ 
	include('try1.php');
	$course=$_SESSION['course'];
$branch=$_SESSION['branch'];
$batch=$_SESSION['batch'];
$pr=$_SESSION['pr'];
$cr=$_SESSION['cr'];
	$max=0;
	
	$bsql="select batch_id from batch where year_batch=$batch and course_spec_id =(select course_spec_id from course_specialization where course_id=(select id from courses where course='$course') and spec_id=(select spec_id from specialization where specialisation='$branch') )";

		$bresult=mysql_query($bsql);
	while($db_field=mysql_fetch_assoc($bresult))
	{
		$batch_id=$db_field['batch_id'];
		
	}
	//echo "batch".$batch_id;
	$sql="select sem_id from sem where semester='$cr'";
	$result=mysql_query($sql);	
	while($db_field=mysql_fetch_assoc($result))
	{
	$sem_id=$db_field['sem_id'];	
	}
	//echo "semid".$sem_id;
	$check="select * from sem_batch where sem_id=$sem_id ";
	$resultc=mysql_query($check);
	$num=mysql_num_rows($resultc);	
	if($course=='Btech')
	{//echo "hii";
		$check="select * from sem_batch where sem_id=8 and batch_id=$batch_id";
	$resultc=mysql_query($check);
	$num=mysql_num_rows($resultc);	
	//echo "num".$num;
	}
	if($course=='Mtech')
	{
		$check="select * from sem_batch where sem_id=4 and batch_id=$batch_id";
	$resultc=mysql_query($check);
	$num=mysql_num_rows($resultc);	
	}
	if($course=='MCA')
	{
		$check="select * from sem_batch where sem_id=6 and batch_id=$batch_id";
	$resultc=mysql_query($check);
	$num=mysql_num_rows($resultc);	
	}
	
	if($num==0)
	{
	$q="insert into sem_batch values(null,$batch_id,$sem_id)";
	$r=mysql_query($q);
	 echo '<script language="javascript" type="text/javascript">alert("Sem Updation Successful..")</script>';
	}
	else
	{
		 echo '<script language="javascript" type="text/javascript">alert("Maximum Sem Duration Reached..")</script>';
	}
	
	
	}
  ?>
</form>
