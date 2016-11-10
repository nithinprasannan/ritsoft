<?php
include('connect1.php');
ob_start();
session_start();
$msg=$_POST['msg'];

	$us=$_SESSION['log_user'];
	$ch = curl_init();
	$user="globalelective";
	$p="global777";
	$sql="select id from department where hod='$us'";
	$re=mysqli_query($conn,$sql);
while($r=mysqli_fetch_array($re))
{
	$dep=$r['id'];
	//echo "ndmsndm".$dep;
	$s="select course_id,spec_id from dept_course where dept_id=$dep";
	$res=mysqli_query($conn,$s);
while($r=mysqli_fetch_array($res))
{
	$cid=$r['course_id'];
	$sid=$r['spec_id'];
	$csid="select course_spec_id from course_specialization where course_id=$cid and spec_id=$sid";
	$a=mysqli_query($conn,$csid);
	while($r=mysqli_fetch_array($a))
	{
		$b=$r['course_spec_id'];
		$c="select batch_id from batch where course_spec_id=$b";
		$d=mysqli_query($conn,$c);
		while($r=mysqli_fetch_array($d))
		{
			$bid=$r['batch_id'];
			$e="select adm_no from stud_batch_rel where batch_id=$bid";
			//echo "bid".$bid;
			$ee=mysqli_query($conn,$e);
			while($r=mysqli_fetch_array($ee))
			{
				$adm=$r['adm_no'];
				//echo "dkjdkjk".$adm;
				$f="select name,mobile from stud where adm_no='$adm'";
				$ef=mysqli_query($conn,$f);
				while($r=mysqli_fetch_array($ef))
				{
					$nam=$r['name'];
					$mob=$r['mobile'];
					//echo $nam.$mob;
					curl_setopt($ch,CURLOPT_URL, "http://easyhops.co.in/sendsms");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,"uname=globalelective&pwd=global777&senderid=RITMCA&to=$mob&msg=Hi Mr./Miss'$nam:-$msg&route=T");
					$buffer = curl_exec($ch);
					
				}
			}
		}
	}
	}
	
}
if($buffer!='')
{
	header('location:dashboard.php?menu=success');
}
?>
