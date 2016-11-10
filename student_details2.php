<?php
ob_start();
session_start();
error_reporting(0);
?>
<style>
form input[type=text],form input[type=date],textarea,form  input[type=password],form select{     width: 210px;   height: 35px;    text-align: center; vertical-align:middle;} 
</style>
<div class="boxHead" style="padding-top:1.5%; height:auto;">SEM REGISTRATION</div>
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
<form id="form1" name="form1" method="post" action="#" enctype="multipart/form-data" class="sear_frm" target="_blank">
  <?php
include('try1.php');

$psemester='Nil';


$adm=$_SESSION['adm'];
$query="select * from stud where adm_no='$adm'";
 $result=mysql_query($query);
 $num=mysql_num_rows($result);
 
	while($db_field=mysql_fetch_assoc($result))
	{ 
	$name=$db_field['name'];
	
	$yr=$db_field['yr_adm'];
	$adr=$db_field['address'];
	$batch_id=0;
	$tel=$db_field['mobile'];
	}
	$query2="select batch_id from stud_batch_rel where adm_no='$adm' ";
	 $result2=mysql_query($query2);
	 while($db_field=mysql_fetch_assoc($result2))
	{ 
	$batch_id=$db_field['batch_id'];
	}
	$co="select course from courses where id=(select course_id from course_specialization where course_spec_id=(select course_spec_id from batch where batch_id=$batch_id))";
	$resultco=mysql_query($co);
	 while($db_field=mysql_fetch_assoc($resultco))
	{
		$course= $db_field['course'];
	}
	$sp="select specialisation from specialization where spec_id=(select spec_id from course_specialization where course_spec_id=(select course_spec_id from batch where batch_id=$batch_id))";
	$resultsp=mysql_query($sp);
	 while($db_field=mysql_fetch_assoc($resultsp))
	{
		$spec=$db_field['specialisation'];
	}
	
 $sc="select shname from scolarship where shid=(select shid from stud_screlation where adm_no='$adm')";
 $scresult=mysql_query($sc);
 $num=mysql_num_rows($scresult);
 if($num>0)
 {
 while($db_field=mysql_fetch_assoc($scresult))
 {
	 $shname=$db_field['shname'];
 }
 }
 else
 $shname='NIL';
 
$yr=$s=date("d-m-Y",strtotime($yr));	
$squery="select sem_id  from sem_batch where batch_id=(select batch_id from stud_batch_rel where adm_no='$adm')";
	 $sresult=mysql_query($squery);
	 
	 while($db_field=mysql_fetch_assoc($sresult))
	{ 
	$sem_id=$db_field['sem_id'];
	
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
?>
         
  <div align="center">
    <h4>&nbsp;</h4>
	<table width="789" height="1089" border="0" bordercolorlight="#C136F5" bgcolor="#B8D8E4">
	  <tr>
	    <th width="176" height="66" scope="row"><div align="left"><label>Name</label></div></th>
	    <td width="211">
	      
	      <input type="text" name="textfield" id="textfield" value="<?php echo $name;?>"></td>
	    <td width="173"><div align="left"><label>Present residential Address</label></div></td>
	    <td width="211"><input type="text" name="textfield8" id="textfield8" value="<?php echo $adr;?>"></td>
	    </tr>
	  <tr>
	    <th scope="row"><div align="left"><label>Admission No</label> </div></th>
	    <td><input type="text" name="textfield2" id="textfield2" value="<?php echo $adm;?>">
	      </td>
	    <td><div align="left"><label>Phone Number</label></div></td>
	    <td><input type="tel" name="tel2" id="tel2" value="<?php echo $tel; ?>"></td>
	    </tr>
	  <tr>
	    <th height="128" scope="row"><div align="left"><label>Year Of Admission</label></div></th>
	    <td><input type="text" name="textfield3" id="textfield3" value=" <?php echo $yr;?>">
	      </td>
	    <td><div align="left">
	      <label>whether eligible for fee consession if so with nature of concession</label>
	      </div></td>
	    <td><input type="text" name="textfield7" id="textfield7" value="<?php echo $shname; ?>"></td>
	    </tr>
	  <tr>
	    <th height="99" scope="row"><div align="left"><label>Course and stream</label></div></th>
	    <td><input type="text" name="textfield4" id="textfield4" value=" <?php echo $course." & ".$spec;?>">
	      </td>
	    <th scope="row"><div align="left">
	      <label>Date of Application</label>
	      </div></th>
	    <td><input type="text" name="textfield9" id="textfield9" value="<?php echo date("d/m/Y"); ?>"></td>
	    </tr>
	  <tr>
	    <th height="67" scope="row"><div align="left">
	      <label>Class to which promotion saught for</label>
	      </div></th>
	    <td><input type="text" name="textfield5" id="textfield5" value="<?php
		
	echo $semester;
	?>"></td>
	    <th scope="row">&nbsp;</th>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td height="54"><div align="left">
	      <label>Class  last studied</label>
	      </div></td>
	    <td><input type="text" name="textfield6" id="textfield6" value="<?php echo $psemester;?>"></td>
	    <td height="54">&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <th height="22" colspan="4" scope="row" bgcolor="#00CCFF"><div class="boxHead" style="padding-top:1.5%; height:auto;">FILL THE BELOW FEILDS</div></th>
	    </tr>
	  <tr>
	    <td height="49"><label>Class Number</label><span class="mand">*</span></td>
	    <td><span class="planFeatures">
	      <input name="clsno" type="text" required id="clsno">
	      </span></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td><div align="left">
	      <p align="left">
	        <label>Whether fees has been paid for all instalments of previous semesters</label><span class="mand">*</span>
	        </p>
	      <p align="left">&nbsp;</p></td>
	    <td><table width="200">
	      <tr>
	        <td><label> :
	          <input type="radio" name="pay" value="YES" id="pay_2" required>
	          YES
	          <input type="radio" name="pay" value="NO" id="pay_3" required>
	          NO</label></td>
	        </tr>
	      <tr>
	        <td>&nbsp;</td>
	        </tr>
	      </table></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td height="73"><label>Whether registered for pre-semester</label><span class="mand">*</span></td>
	    <td><table width="200">
	      <tr>
	        <td><label> :
	          <input type="radio" name="y/n" value="YES" id="y/n_2" required>
	          YES
	          <input type="radio" name="y/n" value="NO" id="y/n_3" required>
	          NO </label></td>
	        </tr>
	      <tr>
	        <td>&nbsp;</td>
	        </tr>
	      </table></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td height="104"><label>The subject in which you have to pass in respect of previous class</label><span class="mand">*</span></td>
	    <td><textarea name="subject2" id="subject2" required></textarea></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td height="137"><div align="left">
	      <label>Whether there was any shortage of attendance for any of the previous Semester and whether condonation has been obtained</label><span class="mand">*</span>
	      </div></td>
	    <td><table width="200">
	      <tr>
	        <td><label> :
	          <input type="radio" name="att" value="YES" id="att_2" required>
	          YES
	          <input type="radio" name="att" value="NO" id="att_3" required>
	          NO</label></td>
	        </tr>
	      <tr>
	        <td>&nbsp;</td>
	        </tr>
	      </table></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td><div align="left"><label>Period During Which the study in the college was discontinued and reason there of.</label><span class="mand">*</span></div></td>
	    <td><span class="planFeatures">
	      <textarea name="reason2" id="reason2" required></textarea>
	      </span></td>
	    <td><div align="left"></div></td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <th colspan="4" scope="row"><input type="submit" name="submit" id="submit" class="logbtn" value="SUBMIT"></th>
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
        <?php 
	   if(isset($_POST['submit'])){
		   
		   $_SESSION['clsno']=$_POST['clsno'];
		   $_SESSION['reason']=$_POST['reason2'];
		   $_SESSION['y/n']=$_POST['y/n'];
		   $_SESSION['subject']=$_POST['subject2'];
		   $_SESSION['pay']=$_POST['pay'];
		   $_SESSION['att']=$_POST['att'];
		   $sql="select * from stud_sem_registration where adm_no=$adm and previous_sem='$psemester' and new_sem='$semester'";
		$result=mysql_query($sql); 
		 $num=mysql_num_rows($result);
		 if($num==0)
		 {

		   
		   
		    echo "<script language='JavaScript' type='text/JavaScript'>
<!--
window.location='preview.php';
//-->
</script>
";
	   }
	    else
		 {		

echo "<script language='JavaScript' type='text/JavaScript'>alert('Your application already received')</script>";
	   }
	   }
 
	  
	  ?>
 
 
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
