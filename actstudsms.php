<html>
<head>
</head>
<body>
<?php
include('connect1.php');
	$msg=$_GET['msg'];
	//echo $msg;
	$no=$_GET['no'];
	//echo $no;
	$sql="select mobile,name from stud where adm_no='$no'";
	$esql=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($esql))
	{
		$mob=$row['mobile'];
		$nam=$row['name'];
	}
	$ch = curl_init();
	$user="globalelective";
	$p="global777";
	curl_setopt($ch,CURLOPT_URL, "http://easyhops.co.in/sendsms");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,"uname=globalelective&pwd=global777&senderid=RITMCA&to=$mob&msg=Hi Mr./Miss $nam:-$msg&route=T");
					$buffer = curl_exec($ch);
					
					if($buffer!='')
{
	header('location:dashboard_hod.php?menu=success');
}
if($buffer=='')
{
	header('location:dashboard_hod.php?menu=notsuccess');
}
	?>
	
    </body>
    </html>