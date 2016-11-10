<?php
include('connect1.php');
$st=$_POST["staff"];
$cor=$_POST["cid"];
$batch=$_POST["batch"];
$id=$_POST["id"];
$count=0;//checking repeating value
$a="select spec_id from dept_course where course_id=$cor and dept_id=$id";
//echo $a;
$ra=mysqli_query($conn,$a);
while($row=mysqli_fetch_array($ra))
{
	$sid=$row["spec_id"];
	$b="select course_spec_id from course_specialization where course_id=$cor and spec_id=$sid ";
	$eb=mysqli_query($conn,$b);
	while($row=mysqli_fetch_array($eb))
	{
	$csid=$row['course_spec_id'];
	}
	//echo $csid;
	$sql4="select batch_id from batch where course_spec_id='$csid' and year_batch='$batch'";
	$result=mysqli_query($conn,$sql4);
	while($row3=mysqli_fetch_array($result))
	{
		$id=$row3["batch_id"];
	}
	$chk="select * from staffadvisor";
	$rechk=mysqli_query($conn,$chk);
	while($r=mysqli_fetch_array($rechk))
	{
		$one=$r['staff_id'];
		$two=$r['batch_id'];
		if($two==$id)
		{
			$count=$count+1;
		}
				
	}
}
//echo "msm".$ret;
	if($count==0)
	{
	$in="insert into staffadvisor"."(staff_id,batch_id)"."values('$st',$id)";	 
	//echo "<br><br><center>***********Successful***********</center>";	
	$ret= mysqli_query($conn,$in);

	
  header('location:dashboard_hod.php?menu=sadvsr');
	   }
	   else
	   {
		  header('location:dashboard_hod.php?menu=nadvsr');  
	   }
	   	   
   
	
   mysqli_close($conn);
?>