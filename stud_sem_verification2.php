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
    
    
    
<form id="form1" name="form1" method="post" action="#" enctype="multipart/form-data" class="sear_frm">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php include('try1.php');
		$adm=$_SESSION['adm'];
		$psemester='Nil';
		$sql="select name from stud where adm_no='$adm'";
		$result=mysql_query($sql);
		while($db_field=mysql_fetch_assoc($result))
	{ 
	$name=$db_field['name'];
	}
	$squery="select sem_id  from sem_batch where batch_id=(select batch_id from stud_batch_rel where adm_no='$adm')";
	 $sresult=mysql_query($squery);
	 $num=mysql_num_rows($sresult);
	 if($num>0)
	 {
	 while($db_field=mysql_fetch_assoc($sresult))
	{ 
	$sem_id=$db_field['sem_id'];
	
	$sem="select semester from sem where sem_id=$sem_id";
	$sem_result=mysql_query($sem);
	while($db_field=mysql_fetch_assoc($sem_result))
	{
	$semester=$db_field['semester'];
	}
	//echo 'hello'.$sem_id;
	$sem_id=$sem_id-1;
	$sem="select semester from sem where sem_id=$sem_id";
	$sem_result=mysql_query($sem);
	while($db_field=mysql_fetch_assoc($sem_result))
	{
	$psemester=$db_field['semester'];
	}
	} 
	 }
	 else
	 {
		echo "<script>location.href='dashboard_student.php?menu=sem'</script>";
		 }
		 
		 ?>
  <div align="center">
    <table width="614" height="221"  bordercolorlight="#C136F5" bgcolor="#B8D8E4">
      <thead>
        <tr>
          <th width="1" height="47"></th>
          <th colspan="5" scope="col" abbr="Starter" bgcolor="#00CCFF"><label>WELCOME 
            <?php $name=strtoupper($name);echo $name?></label></th>
          </tr>
      </thead>
      <tfoot>
        <tr>
          <th height="62" colspan="2" scope="row">&nbsp;</th>
          <td width="166">&nbsp;</td>
          <td width="138"><input type="submit" name="submit2" id="submit2" value="SUBMIT"  class="logbtn" ></td>
          <td width="222">&nbsp;</td>
          <td width="7" colspan="4">&nbsp;</td>
        </tr>
      </tfoot>
      <tbody>
        <tr>
          <th height="50" scope="row">&nbsp;</th>
          <td colspan="3"><label>Current Semester</label> </td>
          <td colspan="2">
            <input type="text" name="textfield" id="textfield" value="<?php echo $psemester;?>" disabled></td>
          </tr>
        <tr>
          <th height="50" scope="row">&nbsp;</th>
          <td colspan="3"><label>New Semester</label></td>
          <td colspan="2">
            <input type="text" name="textfield2" id="textfield2" value="<?php echo $semester;?>" disabled></td>
          </tr>
      </tbody>
    </table>
    <h4>&nbsp;</h4>
    <p>&nbsp;</p>
	<table>
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
</div>
<?php 
   if(isset($_POST['submit2'])){
	  $sql="select * from stud_sem_registration where adm_no='$adm' and previous_sem='$psemester' and new_sem='$semester'";
		$result=mysql_query($sql); 
		 $num=mysql_num_rows($result);
		 if($num==0)
		 {
			echo "<script>location.href='dashboard_student.php?menu=semdetail'</script>";
		 }
	
        
		 else
		 { 
	
	echo "<script language='JavaScript' type='text/JavaScript'>alert('Your application already received')</script>";
	
    
		 }
		 
   }
   
   
   
   
   ?>
</form>
