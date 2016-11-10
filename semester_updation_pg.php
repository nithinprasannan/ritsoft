<?php session_start();
if(!(isset($_SESSION['log_user'])))
	header('Location:index.php');
include('try1.php');
$course=" ";
$branch="";
$yr="";
$user=$_SESSION['log_user'];

//echo $user;
$sql="select usertype from login where username='$user'";
$result=mysql_query($sql);
	while($db_field=mysql_fetch_assoc($result))
	{
		
		$role=$db_field['usertype'];
	}
//echo $role;
?>
<!doctype html>
<html>
<head>
 
<meta charset="utf-8">
<title>Untitled Document</title>
</head>


<script type="text/javascript">
function Checkcolor(val)
{
	var element=document.getElementById('branch1');
	var element2=document.getElementById('branch2');
	var element3=document.getElementById('branch3');
	var element4=document.getElementById('branch4');
	if(val=='Mtech')
		{element.style.display='block';
			
		}
		else
		
		{element.style.display='none';
			 
			}
		
		
		if(val=='Btech')
		{//element.style.display='none';
			element2.style.display='block';
			//element3.style.display='none';
		}
		else
		
		{//element.style.display='none';
			 element2.style.display='none';
		
		//element3.style.display='block';
		
			}
			if(val=='MCA')
		{element3.style.display='block';
			
		}
		else
		
		{element3.style.display='none';
			 
			}
			if(val=='Barch')
		{element4.style.display='block';
			
		}
		else
		
		{element4.style.display='none';
			 
			}
			
		
			
}
</script>


<body>
<div class="boxHead" style="padding-top:1.5%; height:auto;"> SEMESTER UPDATION OF BATCH
</div>
<form id="form1" name="form1" method="post">

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div align="center">
    <table width="708" height="301" border="0">
     
      <tr>
        <th width="279" height="58" scope="row"><div align="left">Course</div></th>
        <td width="419"><?php include('try1.php');
		  $course="";
  $batch="";
  $branch="";
 
		if($role=='ugdean')
 {
		
		//$sql="select distinct course from courses";
		echo "<select name=course value=Course  onChange='Checkcolor(this.value);' required><option></option>" ;
		//$result=mysql_query($sql);
	//while($db_field=mysql_fetch_assoc($result))
	//{
		//print "hii";
		
			echo '<option value="Btech">Btech</option>';
			echo '<option value="Barch">Barch</option>';
			//echo "<option>hii";
			//echo "";
		//}
		echo '</select>';
 }
 
 if($role=='pgdean')
 {
		
		//$sql="select distinct course from courses";
		echo "<select name=course value=Course  onChange='Checkcolor(this.value);' required><option></option>" ;
		//$result=mysql_query($sql);
	//while($db_field=mysql_fetch_assoc($result))
	//{
		//print "hii";
		
			echo '<option value="Mtech">Mtech</option>';
			echo '<option value="MCA">MCA</option>';
			//echo "<option>hii";
			//echo "";
		//}
		echo '</select>';
 }
		
		
		?>          <div align="right"></div></td>
      </tr>
      <tr>
        <th height="51" scope="row"><div align="left">Branch</div></th>
        <td>
        
        <select name="branch1" id="branch1" style='display:none'>
<option>(Choose Specialization)</option>      
<option>Transportation Engineering</option>
<option>Industrial Engineering & Management</option>
<option>Industrial Drives & Control</option>
<option>Advanced Communication & Information System</option>
<option>Advanced Electronics & Communication</option>
<option>Computer Science & Engineering</option>
</select>
<select name="branch2" id="branch2" style='display:none'>
<option>(Choose Specialization)</option>      
<option>Civil Engineering</option>
<option>Computer Science & Engineering</option>
<option>Mechanical Engineering</option>
<option>Electrical & Electronics Engineering</option>
<option>Electronics & Communication Engineering</option>

</select>
<select name="branch3" id="branch3" style='display:none'>
     
<option>Computer Application</option>

</select>
<select name="branch4" id="branch4" style='display:none'>
     
<option>Architecture</option>
</select></td>
      </tr>
      <tr>
        <th height="56" scope="row"><div align="left">Year Of Admission</div></th>
        <td><?php include('try1.php');
		
		$sql="select distinct year_batch from batch ";
		echo "<select name=batch_yr value=batch_yr required><option></option>" ;
		$result=mysql_query($sql);
	while($db_field=mysql_fetch_assoc($result))
	{
		//print "hii";
		
			echo '<option value="'.$db_field['year_batch'].'">'.$db_field['year_batch'].'</option>';
			//echo "<option>hii";
			//echo "";
		}
		echo '</select>';
		?></td>
      </tr>
      <tr >
        <th height="58" colspan="2" scope="row">
          <input type="submit" name="submit" id="submit" value="Submit">
        </p></th>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>

   <p>&nbsp;</p>
 
	<?PHP 
	include('try1.php');
	
	$course=$_POST['course'];
	if($course=='Mtech')
  $branch=$_POST['branch1'];
  else if($course=='Btech')
  $branch=$_POST['branch2'];
  else if($course=='MCA')
  $branch=$_POST['branch3'];
  else if($course=='Barch')
  $branch=$_POST['branch4'];
  $batch=$_POST['batch_yr']; 
  $sql="select  * from sem_batch sr where sr.batch_id=(select batch_id from batch where course_spec_id=(select course_spec_id from course_specialization where spec_id=(select spec_id from specialization where specialisation='$branch') and course_id=(select id from courses where course='$course')) and year_batch=$batch)";
		
		$result=mysql_query($sql);
		$num=mysql_num_rows($result);
		if($num==0)
		{
			$bsql="select batch_id from batch where course_spec_id=(select course_spec_id from course_specialization where spec_id=(select spec_id from specialization where specialisation='$branch') and course_id=(select id from courses where course='$course')) and year_batch=$batch";
		$bresult=mysql_query($bsql);
	while($db_field=mysql_fetch_assoc($bresult))
	{
		$batch_id=$db_field['batch_id'];
		
	}
			
			$pr='Nil';
			$cr='S1';
			
		}
		
		else
		{
	while($db_field=mysql_fetch_assoc($result))
	{
		$batch_id=$db_field['batch_id'];
		$sem_id=$db_field['sem_id'];

		
		$s="select semester from sem where sem_id=$sem_id"	;
		$result2=mysql_query($s);
		while($db_field=mysql_fetch_assoc($result2))
	{
		$pr=$db_field['semester'];
	}
	$new_sem_id=$sem_id+1;
	$s="select semester from sem where sem_id=$new_sem_id"	;
		$result2=mysql_query($s);
		while($db_field=mysql_fetch_assoc($result2))
	{
		$cr=$db_field['semester'];
	}
	}
	
	
	echo $new_sem_id;
	
		}
		$r=mysql_query($q);
	echo $new_sem_id;

	if (isset($_POST['submit']))
	{ 
	$_SESSION['course']=$course;
	$_SESSION['branch']=$branch;
	$_SESSION['batch']=$batch;
	$_SESSION['pr']=$pr;
	$_SESSION['cr']=$cr;
	 echo "<script>location.href='dashboard_pgdean.php?menu=semupconform'</script>";
	}
    ?>
   

</form>
