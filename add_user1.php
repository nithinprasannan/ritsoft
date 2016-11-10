<?php
ob_start();
session_start();
error_reporting(0);
if(!(isset($_SESSION['log_user'])))
	header('Location:index.php');
?>
<div class="boxHead" style="padding-top:1.5%; height:auto;">ADD USER</div>
<script>
function validate()
{
	var utype=document.getElementById("utype").value;
    if(utype=="")
        {
            alert("Enter User type");
            document.getElementById("utype").focus();
            return false;
        }
	
}
</script>
<style>
form [type=input]{ width: 160px;height: 28px;}
form select{ width: 172px;height: 28px;}
</style>
<form action="add_user1.php" method="post" name="add" class="sear_form">
  <br><br><div align="center">  
    <table width="319" border="0" align="center">
      <tr>
        <td><strong>User Type</strong></td>
          <td height="29"><select name="utype" id="utype">
            <option value="">--Choose User Type--</option>
           <option>hod</option>
    <option>dean</option>
	<option>officestaff</option>
	<option>pgdean</option>
	<option>ugdean</option>
	<option>principal</option>
	<option>teaching staff</option>
	<option>admin</option>
	<option>student</option>
	<option>staffadvisor</option>
        </select></td>
      </tr>
      <tr>
        <td><strong>Name</strong></td>
         <td> <input name="ntxt" type="text" required="required" pattern="[a-zA-Z ]+"/></td>
      </tr>
	   <tr>
        <td><strong>User Name</strong></td>
        <td><input name="uname" type="text" required="required" pattern="[a-zA-Z0-9 ]+" onblur="check(this.value)"/></td>
      </tr>
	   <tr>
        <td><strong>Password</strong></td>
       <td><input name="pswd" type="password" required="required"/></td>
      </tr>
      <tr>
       <td colspan="2" align="center"><input name="submit" type="submit" value="SUBMIT" align="middle" class="button" onclick="return validate()"/></td>
      </tr>
    </table>
  </div>
</form>
<?php
include "dboperation.php";
if (isset($_REQUEST['submit']))
{
  $ut=$_POST['utype'];
  $n=$_POST['ntxt'];
  $un=$_POST['uname'];
 // $pw=md5($_POST['pswd']);
  $pw=$_POST['pswd'];
  $rs=mysql_query("select * from login where username='$un'");
  $p=mysql_fetch_assoc($rs);
  $r=mysql_num_rows($rs);
  if(!$r)
  {
 
 mysql_query("insert into login values('".$_POST['utype']."','".$_POST['ntxt']."','".$_POST['uname']."','".$pw."')") or die(mysql_error());
 header('Location:dashboard_admin.php?menu=adduser');
 }
 else
 {
	
//	echo "<script>alert('User name allready Issued. Please choose another one!!')</script>";
	header('Location:dashboard_admin.php?menu=adduser');
 }
}
?>

