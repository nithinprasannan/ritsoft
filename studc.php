<?php
ob_start();
session_start();
error_reporting(0);
// include('header.php');
//if(!(isset($_SESSION['log_user'])))
//	header('Location:index.php');
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
<form id="form1" name="form1" method="post" action="p3.php" enctype="multipart/form-data" class="sear_frm">
  <?php 

 include('try1.php');

$adm=$_SESSION['adm'];
$query="select * from stud where adm_no='$adm'";
//echo $adm;
 $result=mysql_query($query);
 $num=mysql_num_rows($result);
 
	while($db_field=mysql_fetch_assoc($result))
	{ 
	$name=$db_field['name'];
	$yr_adm=$db_field['yr_adm'];
	//$batch_id=0;
	//echo $batch_id;
	}
	
$yr=date("d-m-Y",strtotime($yr_adm));	
$squery="select sem_id  from sem_batch where batch_id=(select batch_id from stud_batch_rel where adm_no='$adm')";
	 $sresult=mysql_query($squery);
	 
	 while($db_field=mysql_fetch_assoc($sresult))
	{ 
	$sem_id=$db_field['sem_id'];
	//echo $sem_id;
	$sem="select semester from sem where sem_id=$sem_id";
	$sem_result=mysql_query($sem);
	while($db_field=mysql_fetch_assoc($sem_result))
	{
	$semester=$db_field['semester'];
	}
	$sem_id=$sem_id-1;
	$sem="select semester from sem where sem_id=$sem_id";
	$sem_result=mysql_query($sem);
	while($db_field=mysql_fetch_assoc($sem_result))
	{
	$psemester=$db_field['semester'];
	}
	} 

		
		$sql="select course from courses where id=(select course_id from course_specialization where course_spec_id=(select course_spec_id from batch where batch_id=(select batch_id from stud_batch_rel where adm_no='$adm')))";
		$result=mysql_query($sql);
	while($db_field=mysql_fetch_assoc($result))
	{
		$c=$db_field['course'];
	}

		
		$sql="select specialisation from specialization where spec_id=(select spec_id from course_specialization where course_spec_id=(select course_spec_id from batch where batch_id=(select batch_id from stud_batch_rel where adm_no='$adm')))";
		$result=mysql_query($sql);
	while($db_field=mysql_fetch_assoc($result))
	{
		$b=$db_field['specialisation'];
	}
	

	$d_id="";
	$rcpt_no=0;
	 include('try1.php');
	 
	$sql="select course_spec_id from batch where batch_id=(select batch_id from stud_batch_rel where adm_no='$adm')";
	 $result=  mysql_query($sql);
	 while($db_field=mysql_fetch_assoc($result))
	{ 
																				
	$d_id=$db_field['course_spec_id'];
	}
	
//	$_SESSION['d_id']=$d_id;
	$sql="select rcpt_no from serial_no where d_id='$d_id'";
	 $result=  mysql_query($sql);
	  while($db_field=mysql_fetch_assoc($result))
	{ $rcpt_no=$db_field['rcpt_no'];
		}
		$rcpt_no=str_pad($rcpt_no+1,3,0,STR_PAD_LEFT);
	
		 	
	?>
  
  <div align="center">
    <h4>&nbsp;</h4>
	<table width="741" height="412" border="0" bordercolorlight="#C136F5" bgcolor="#B8D8E4">
	  <tr>
	    <th width="141" scope="row">Admission Number</th>
	    <td width="214"><input type="text" name="textfield" id="textfield" value="<?php echo $adm;?>"></td>
	    <td width="158"><div align="left">Date</div></td>
	    <td width="210"><input type="text" name="textfield6" id="textfield6" value="<?php echo date("d/m/Y"); ?>"></td>
	    </tr>
	  <tr>
	    <th scope="row">Name</th>
	    <td><input type="text" name="textfield2" id="textfield2" value="<?php echo $name;?>"></td>
	    <td><div align="left"><span class="planFeatures">Purpose For Certificate</span></div></td>
	    <td><span class="planFeatures">
	      <textarea name="purpose" cols="45" rows="5" id="purpose" required></textarea>
	      </span></td>
	    </tr>
	  <tr>
	    <th scope="row">Course</th>
	    <td><input type="text" name="textfield3" id="textfield3" value=" <?php echo $c;?>"></td>
	    <td><div align="left"><span class="planFeatures">Certificate issued by</span></div></td>
	    <td><span class="planFeatures">
	      <input type="text" name="log" id="log" value="<?php echo $_SESSION['log_user']; ?>">
	    </span></td>
	    </tr>
	  <tr>
	    <th scope="row">Branch</th>
	    <td><input type="text" name="textfield4" id="textfield4" value=" <?php echo $b;?>"></td>
	    <td>Certificate Number</td>
	    <td><input type="text" name="no" id="no" value="<?php echo $rcpt_no; ?>"></td>
	    </tr>
	  <tr>
	    <th scope="row">Semester</th>
	    <td><input type="text" name="textfield5" id="textfield5" value=" <?php echo $semester;?>"></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
		<tr>
	   
	    <td><input type="hidden" name="yearadm" id="yearadm" value=" <?php echo $yr_adm;?>"></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
		<tr>
	   
	    <td><input type="hidden" name="did" id="did" value=" <?php echo $d_id;?>"></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <th colspan="4" scope="row"><input type="submit" name="submit" id="submit" value="NEXT"></th>
	    </tr>
	  </table>
	<p>&nbsp;</p>
	<table>
	  <tr>
      </tr>
      <tr>
      </tr>
      <tr>
      <td colspan="2"><div align="center">
      
      </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
  </table>
    <p>&nbsp;</p>
</div>
</form>
