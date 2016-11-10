<?php
session_start();
$username=$_POST["username"];
$password=$_POST["password"];

include("dboperation.php");
$obj=new dboperation();
$query1="select * from login where username='$username' ";
$result1=$obj->selectdata($query1);
$row1=$obj->fetch($result1);
//if($row1['username']==$username&&$row1['password']==md5($password))
	if($row1['username']==$username&&$row1['password']==($password))

{
	$obj2=new dboperation();
	$query2="select * from login where username='$username' ";
	$result2=$obj2->selectdata($query2);
	$row2=$obj2->fetch($result2);
	$rol= $row2['usertype'];
	if($rol == 'admin')
	{
		$_SESSION["log_user"]=$username;
		header('location:dashboard_admin.php');
	}
	if($rol == 'officestaff')
	{
		$_SESSION["log_user"]=$username;
		header('location:dashboard_staff.php');	
	}
	if($rol == 'student')
	{
		$_SESSION["log_user"]=$username;
		header('location:dashboard_student.php');	
	}
	if($rol == 'pgdean')
	{
		$_SESSION["log_user"]=$username;
		header('location:dashboard_pgdean.php');	
	}
	if($rol == 'ugdean')
	{
		$_SESSION["log_user"]=$username;
		header('location:dashboard_ugdean.php');	
	}
	if($rol == 'hod')
	{
		$_SESSION["log_user"]=$username;
		header('location:dashboard_hod.php');	
	}
	if($rol == 'principal')
	{
		$_SESSION["log_user"]=$username;
		header('location:dashboard_principal.php');	
	}
	
	
}
else
{ 
echo ('<script type="text/javascript">alert (" invalid username or password !");window.location = "index.php"; </script>');
	//header('location:index.php');	
}
?>