<?php
include('connect1.php');
$msg=$_POST["msg"];
$cor=$_POST["course"];
$batch=$_POST["batch"];
$ch = curl_init();
	$user="globalelective";
	$p="global777";
$sql="select spec_id from course_specialization where course_id=$cor";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
{	
   	$spec=$row["spec_id"];
	$sql="select course_spec_id from course_specialization where course_id=$cor and spec_id=$spec";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
{	
   	$csid=$row["course_spec_id"];
	
$c="select batch_id from batch where course_spec_id=$csid and year_batch=$batch";
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
					curl_setopt($ch, CURLOPT_POSTFIELDS,"uname=globalelective&pwd=global777&senderid=RITMCA&to=$mob&msg=Hi Mr./Miss $nam:-$msg&route=T");
					$buffer = curl_exec($ch);
					
				}
			}
		}
	}
	}
	

if($buffer!='')
{
	header('location:dashboard_hod.php?menu=success');
}
?>