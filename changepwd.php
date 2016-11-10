<?php
ob_start();
session_start();
error_reporting(0);
if(!(isset($_SESSION['log_user'])))
	header('Location:index.php');
?>
<div class="boxHead" style="padding-top:1.5%; height:auto;">Change password</div>
<script type="text/javascript" src="validator/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="validator/validationEngine.jquery.css" />
<script type="text/javascript" src="validator/jquery.validationEngine.js"></script>
<script type="text/javascript" src="validator/jquery.validationEngine-en.js"></script>
<script type="text/javascript"language="javascript">
$(document).ready(function(){
   $("#form1").validationEngine();
});
</script>



<style>
form [type=input]{ width: 160px;height: 28px;}
form select{ width: 172px;height: 28px;}
</style>
<form id="form1" name="form1" method="post" action="" class="sear_form">
  <br><br><div align="center">  
    <table width="319" border="0" align="center">
      <tr>
        <td><strong>Old Password</strong></td>
        <td><label for="textfield"></label>
          <input type="password" class="form_control validate[required]" placeholder="Old Password" name="oldpwd" id="oldpwd" /></td>
      </tr>
      <tr>
        <td><strong>New Password</strong></td>
        <td><label for="textfield2"></label>
          <input type="password" class="form_control validate[required]" placeholder="New Password" name="newpwd" id="newpwd" /></td>
      </tr>
      <tr>
        <td><strong>Confirm Password</strong></td>
        <td><label for="textfield2"></label>
          <input type="password" class="form_control validate[required]" placeholder="Confirm Password" name="conpwd" id="conpwd" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="change" class="change logbtn" id="change" value="Change"  /></td>
      </tr>
    </table>
  </div>
</form>
<?php
if (isset($_REQUEST['change']))
{
	$old_pwd=$_POST['oldpwd'];
	$new_pwd=$_POST['newpwd'];
	$con_pwd=$_POST['conpwd'];
	
	include "dboperation.php";
	$obj5=new dboperation();
	$query5="SELECT * FROM login WHERE username = '".$_SESSION['log_user']."'";
	$result5=$obj5->selectdata($query5);
	$row=$obj5->fetch($result5);
	//$pwd=("$row[1]");
	
	if($row['password'] == $old_pwd ){
		if($new_pwd == $con_pwd){
	$obji=new dboperation();
    $queryi = "UPDATE login SET password = '".$new_pwd."' WHERE username = '".$_SESSION['log_user']."'";
		  $obji->Ex_query($queryi);
		//	$qry = mysql_query("UPDATE login SET password = '".$new_pwd."' WHERE username = '".$_SESSION['log_user']."'");
			if($queryi){
				echo '<script>alert("Password updated successfully.")</script>';
				header('Location:index.php');
			}
			else
				echo '<script>alert("Error. Please try after sometime")</script>';
		}else{
			echo '<script>alert("Password mismatching.")</script>';
		}
	}else{
		echo '<script>alert("Old password is wrong.")</script>';
	}
}
?>

