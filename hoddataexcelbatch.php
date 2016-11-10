<?php
include('connect1.php');
$course=$_POST['course'];
$batch=$_POST['batch'];
ob_start();

  session_start();
$fld=$_POST['c1'];
$ff=implode(",",$fld);
	
$head=$course.'    batch   '.$batch.'    details';
					$cell = sizeof($fld);
					echo "<table border='1'>";
					echo "<tr><th colspan='".$cell."' align='center'>".$head."</tr><tr>";
					for($i=0;$i<sizeof($fld);$i++)
					{
						echo "<th>".$fld[$i]."</th>";
					}
					
					$user=$_SESSION['log_user'];
	$sql="select id from department where hod='$user'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$id=$row['id'];
	}		
			//echo $id;	
			//echo $course;	
			$ci="select id from courses where course='$course'";
			$esql=mysqli_query($conn,$ci);
			while($row=mysqli_fetch_array($esql))
			{
				$gci=$row["id"];
			}
	$id1="select spec_id from dept_course where dept_id=$id and course_id=$gci";
	$result1=mysqli_query($conn,$id1);
	while($row=mysqli_fetch_array($result1))
	{
		//$cid=$row['course_id'];
		$sid=$row["spec_id"];
		$csid="select course_spec_id from course_specialization where course_id=$gci and spec_id=$sid";
		 $rlt=mysqli_query($conn,$csid);
		while($row=mysqli_fetch_array($rlt))
		{
			$ci=$row["course_spec_id"];
			
		$idb="select batch_id from batch where course_spec_id='$ci' and year_batch=$batch";
	 $resultb=mysqli_query($conn,$idb);
	while($row=mysqli_fetch_array($resultb))
	{
		
		$bid=$row['batch_id'];
		
		$adm="select adm_no from stud_batch_rel where batch_id=$bid";
		$radm=mysqli_query($conn,$adm);
		while($row=mysqli_fetch_array($radm))
		{
			$ad=$row["adm_no"];
$sq="SELECT ".$ff." FROM stud  where adm_no='$ad'";
			
			
			$ex = mysqli_query($conn,$sq);
			$n=mysqli_num_rows($ex);
								$no = 1;
					//echo '<table  border="1"><tr><th>Sl No</th><th>Admission No</th><th>Name</th><th>Gender</th><th>Course</th><th>Branch</th><th>Branch Code</th></tr>';"
					
					while($row=mysqli_fetch_array($ex))
					{
						echo "<tr>";
						for($i=0;$i<sizeof($fld);$i++)
						{ 
						$cnt = $i;
						echo "<td>".$row[$i].'</td>';
						
						//$no++;
					}
					
										}
					echo "</tr>";
	}
				
	}
	}
			
	}echo '</table>';	
				




// The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");
 
// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=college-export".@date('d-m-y_H-i-s').".xls");
?>