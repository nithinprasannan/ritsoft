<?php
ob_start();
session_start();
error_reporting(0);
include 'connect1.php';
if(!isset($_SESSION['log_user']))
{
	header('Location:index.php');
}
$adm_no = $_REQUEST['adm_no'];
echo"</br><center>******STUDENT RECORD******</center>";
$sq="SELECT * FROM stud WHERE adm_no='$adm_no'";
$ex = mysqli_query($conn,$sq);

	$row=mysqli_fetch_array($ex);
	$img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
	echo '<table border="1" class="tbl" cellpadding="5" style="float:left;">
	<tr>
	<td colspan="2" align="center"><h3>Personal Details</h3></td>
	</tr>
	<tr>
	<td colspan="2" align="center"><img src="'.$img.'" width="75" /><br>Admission No.'.$row['adm_no'].'</td>
	</tr>
	<tr>
	<td>Name & Address </td>
	<td> '.$row['name'].' <br />
	'.$row['address'].'</td>
	</tr>
	<tr>
	<td> DOB </td>
	<td>'.$row['dob'].' </td>
	</tr>
	<tr>
	<td>Religion & Caste</td>
	<td>'.$row['religion'].', '.$row['caste'].'</td>
	</tr>
	<tr>
	<td>Contact no.</td>
	<td>'.$row['phone'].'<br />
	'.$row['mobile'].'</td>
	</tr>
	<tr>
	<td>E-mail</td>
	<td>'.$row['email'].'</td>
	</tr>
	<tr>
	<td>Guardian &  Relation</td>
	<td> '.$row['name_guard'].', '.$row['relation'].'</td>
	</tr>
	<tr>
	<td> Occupaton & Annual Income </td>
	<td> '.$row['occupation'].', '.$row['income'].'</td>
	</tr>
	</table>';
	
	$batch ="select batch_id from stud_batch_rel where adm_no='$adm_no'";
	$rebatch=mysqli_query($conn,$batch);
	while($row=mysqli_fetch_array($rebatch))
	{
		$id=$row['batch_id'];
		
	}
	$csi="select year_batch,course_spec_id from batch where batch_id=$id";
	$rcsi=mysqli_query($conn,$csi);
	while($row=mysqli_fetch_array($rcsi))
	{
		$bid=$row['year_batch'];
		
		$csid=$row['course_spec_id'];
		
	}
	$cid="select course_id,spec_id from course_specialization where course_spec_id=$csid";
	$rcid=mysqli_query($conn,$cid);
	while($row=mysqli_fetch_array($rcid))
	{
		$ccid=$row['course_id'];
		
		$sid=$row['spec_id'];
		
		
	}
	$cn="select course from courses where id=$ccid";
	$rcn=mysqli_query($conn,$cn);
	while($row=mysqli_fetch_array($rcn))
	{
		$ocn=$row['course'];
				
	}
	$sn="select specialisation from specialization where spec_id=$sid";
	$rsn=mysqli_query($conn,$sn);
	while($row=mysqli_fetch_array($rsn))
	{
		$osn=$row['specialisation'];
				
	}
	$did="select dept_id from dept_course where spec_id=$sid and course_id=$ccid";
	$rdid=mysqli_query($conn,$did);
	while($row=mysqli_fetch_array($rdid))
	{
		$odid=$row['dept_id'];
		
				
	}
	$dn="select dept from department where id=$odid";
	$rdn=mysqli_query($conn,$dn);
	while($row=mysqli_fetch_array($rdn))
	{
		$odn=$row['dept'];
				
	}
	
	
	echo'<table border="1" class="tbl" cellpadding="5" style="float:left;">
	<tr>
	<td colspan="2" align="center"><h3>Academic Details</h3></td>
	</tr>
	<tr>
	<td>Year of batch </td>
	<td>'.$bid.'</td>
	</tr>
	<tr>
	<td>Department </td>
	<td>'.$odn.'</td>
	</tr>
	<tr>
	<td>course</td>
	<td>'.$ocn.'</td>
	</tr>
	<tr>
	<td>Specialization</td>
	<td>'.$osn.' </td>
	</tr>
		</table>';
		
	
?>
<style>
.tbl{margin: 20px; width:30%;}
</style>
