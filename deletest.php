<?php
include('connect1.php');
$sid=$_GET["id"];
$bid=$_GET["batch"];

$sql="delete from staffadvisor where staff_id=$sid and batch_id=$bid";
$esql=mysqli_query($conn,$sql);
header('Location:dashboard_hod.php?menu=view_advsr') 
?>