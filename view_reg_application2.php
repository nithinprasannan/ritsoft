<?php 


include('try1.php');
$us=$_SESSION['log_user'];
	
	$sql="select id from department where hod='$us'";
	$re=mysql_query($sql);
	while($r=mysql_fetch_array($re))
{
	$dep=$r['id'];
	
	$s="select course_id,spec_id from dept_course where dept_id=$dep";
	$res=mysql_query($s);
while($r=mysql_fetch_array($res))
{
	$cid=$r['course_id'];
	
	$sid=$r['spec_id'];
	
	break;
}
	
	$cn="select course from courses where id=$cid";
	$ecn=mysql_query($cn);
	while($r=mysql_fetch_array($ecn))
	{
		$cnn=$r['course'];
		
	}
	$sn="select specialisation from specialization  where spec_id=$sid";
	$esn=mysql_query($sn);
	while($r=mysql_fetch_array($esn))
	{
		$snn=$r['specialisation'];
	}
	
}



		
?>
  


    

<div class="boxHead" style="padding-top:1.5%; height:auto;">APPLICANTS FOR SEM REGISTRATION</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link href="css/list.css" rel="stylesheet" />

<style>
#header{background-color: #fff;
  /*width: 109%;*/
  margin: 0 auto;
  vertical-align: middle;
  line-height: 102px;
  padding-bottom: 1px;
  /* margin: 0px; */
  margin-bottom: 8px;}
#header img{  margin-top: 12px;}
form label{    font-family: Times New Roman !important;    font-size: 16px;    font-weight: normal;}
	</style>
<form id="form1" name="form1" method="post" action="#" enctype="multipart/form-data" class="sear_frm">
  <?php 


$adm=$_SESSION['adm'];
$query="select * from stud where adm_no='$adm'";
 $result=mysql_query($query);
 $num=mysql_num_rows($result);
 
	while($db_field=mysql_fetch_assoc($result))
	{ 
	$name=$db_field['name'];
	
	$yr_adm=$db_field['yr_adm'];
	$batch_id=0;
	
	}
	
$yr=date("d-m-Y",strtotime($yr_adm));	
$squery="select sem_id  from sem_batch where batch_id=(select batch_id from stud_batch_rel where adm_no='$adm')";
	 $sresult=mysql_query($squery);
	 
	 while($db_field=mysql_fetch_assoc($sresult))
	{ 
	$sem_id=$db_field['sem_id'];
	
	$sem="select semester from sem where sem_id=$sem_id";
	$sem_result=mysql_query($sem);
	while($db_field=mysql_fetch_assoc($sem_result))
	{
	$semester=$db_field['semester'];
	}
	$sem_id=$sem_id-1;
	$sem="select semester from sem where sem_id=$sem_id";
	$sem_result=mysql_query($sem);
	while($db_field=mysql_fetch_assoc($sem_result))
	{
	$psemester=$db_field['semester'];
	}
	} 

		$sql="select course from courses where id=(select course_id from course_specialization where course_spec_id=(select course_spec_id from batch where batch_id=(select batch_id from stud_batch_rel where adm_no='$adm')))";
		$result=mysql_query($sql);
	while($db_field=mysql_fetch_assoc($result))
	{
		$c=$db_field['course'];
	}
	//echo $c;

		$sql="select specialisation from specialization where spec_id=(select spec_id from course_specialization where course_spec_id=(select course_spec_id from batch where batch_id=(select batch_id from stud_batch_rel where adm_no='$adm')))";
		$result=mysql_query($sql);
	while($db_field=mysql_fetch_assoc($result))
	{
		$b=$db_field['specialisation'];
	}

		
		 ?>
          
  
  <div align="center">
    <h4>&nbsp;</h4>
    <table border="0" cellpadding="10" cellspacing="1" width="50%" bordercolorlight="#C136F5" bgcolor="#B8D8E4"  align="">
      <tr class="listheader">
        <th height="43" scope="row"><div align="left"><label>Course</label>
          
          <select name="cid2" id="cid2" >
            <option>Choose Course</option>
            <?php
  $sql="select id from department where hod='$us'";
  echo "hii";
	$re=mysql_query($sql);
	while($r=mysql_fetch_array($re))
{
	$dep=$r['id'];
	echo $dep;
}
    $cid="select course_id from dept_course where dept_id='$dep'";
  $re=mysql_query($cid);
  while($row=mysql_fetch_array($re))
  {
	  $cid2=$row["course_id"];
	  
	  echo "courseid".$cid2;
	  $cn="select course from courses where id='$cid2'"	;
	  $cnr=mysql_query($cn);
	  while($row1=mysql_fetch_array($cnr)) 
	  {
		  $cnn=$row1["course"];
		  
		  	  	?>
            <option value="<?php echo $cnn; ?>" > <?php echo $cnn;?></option>
            <?php
  
  }
  }
 
  ?>
        </select>
        </div></th>
        <td>
         <label> Specialization</label>
            
          <select name="sid2" id="sid2" >
            <option>Choose specialization</option>
            <?php
  echo "hii";
  include ('try1.php');
 $us=$_SESSION['log_user'];
	
	//$us='hodcs';
	//echo $us;
  $sql="select id from department where hod='$us'";
  echo "hii";
	$re=mysql_query($sql);
	while($r=mysql_fetch_array($re))
{
	$dep=$r['id'];
	//echo $dep;
}
    $sid="select spec_id from dept_course where dept_id='$dep'";
  $re=mysql_query($sid);
  while($row=mysql_fetch_array($re))
  {
	  $sid2=$row["spec_id"];
	  
	  //echo "seid".$sid2;
	  $cn="select distinct specialisation from specialization where spec_id='$sid2'"	;
	  $cnr=mysql_query($cn);
	  while($row1=mysql_fetch_array($cnr)) 
	  {
		  $spec=$row1["specialisation"];
		  
		  	  	?>
            <option value="<?php echo $spec; ?>" > <?php echo $spec;?></option>
            <?php
  
  }
  }
 
  ?>
          </select></td>
        <td><input type="submit" name="submit" id="submit" value="VIEW SEM REGISTRATION APPLICATIONS" ></td>
      </tr>
      <tr class="listheader">
        <th width="253" height="43" scope="row"><div align="left"><label>Batch</label>
            <?php include('try1.php');
		
		$sql="select distinct year_batch from batch ";
		echo "<select name=batch value=batch required><option></option>" ;
		$result=mysql_query($sql);
	while($db_field=mysql_fetch_assoc($result))
	{
		//print "hii";
		
			echo '<option value="'.$db_field['year_batch'].'">'.$db_field['year_batch'].'</option>';
			//echo "<option>hii";
			//echo "";
		}
		echo '</select>';
		?>
        </div></th>
        <td width="252"> <label>Semester</label>
          <select name="select" id="select">
          <option>....select sem....</option>
            <option>S1</option>
            <option>S2</option>
            <option>S3</option>
            <option>S4</option>
            <option>S5</option>
            <option>S6</option>
            <option>S7</option>
            <option>S8</option>
            <option>S9</option>
            <option>S10</option>
        </select></td>
        <td><div align="left">
          <input type="submit" name="submit2" id="submit2" value="     VIEW APPROVED STUDENTS LIST      ">
        </div>          <div align="left"></td>
      </tr>
    </table>
    <p>&nbsp;</p>
	<table>
	 
      <tr>
      <td colspan="2"><div align="center">
        
 
 
      </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
  </table>
    <p>&nbsp;</p>
</div>
</form>


</div>
</label>
  <?php
  if(isset($_POST['submit']))
  {//echo 'hii';
	 $sem=$_POST['select'];
	$course=$_POST['cid2'];
	//echo $course;
  $batch=$_POST['batch'];
   /*if($course=='Mtech')
  $branch=$_POST['branch1'];
  else if($course=='Btech')
  $branch=$_POST['branch2'];
  else if($course=='MCA')
  $branch=$_POST['branch3'];
  else if($course=='Barch')
  $branch=$_POST['branch4'];*/
	 $branch=$_POST['sid2'];
	// echo $branch;
   $_SESSION['course']=$course;
  $_SESSION['batch']=$_POST['batch'];
  $_SESSION['branch']=$branch;
  
  $_SESSION['sem']=$sem;
  $result=mysql_query("select  * from stud_sem_registration sr where sr.batch_id=(select batch_id from batch where course_spec_id=(select course_spec_id from course_specialization where spec_id=(select spec_id from specialization where specialisation='$branch') and course_id=(select id from courses where course='$course')) and year_batch=$batch) and sr.new_sem='$sem'");
  $num=mysql_num_rows($result);
 // echo $num.'hii num';
  if($num>0)
  {
	  echo "<script>location.href='dashboard_hod.php?menu=semregaprove'</script>";

  }
  else
  {
	  echo '<script language="javascript" type="text/javascript">alert("No much results ..")</script>';
	 
  }
	  
	  
  }
   if(isset($_POST['submit2']))
  {//session_start();
  $course=$_POST['cid2'];
  $batch=$_POST['batch'];
  /*if($course=='Mtech')
  $branch=$_POST['branch1'];
  else if($course=='Btech')
  $branch=$_POST['branch2'];
  else if($course=='MCA')
  $branch=$_POST['branch3'];
  else if($course=='Barch')
  $branch=$_POST['branch4'];*/
  $branch=$_POST['sid2'];
   $_SESSION['course']=$course;
  $_SESSION['batch']=$_POST['batch'];
  $_SESSION['branch']=$branch;
  $result=mysql_query("select  * from stud_sem_registration sr where sr.batch_id=(select batch_id from batch where course_spec_id=(select course_spec_id from course_specialization where spec_id=(select spec_id from specialization where specialisation='$branch') and course_id=(select id from courses where course='$course')) and year_batch=$batch)");
  $num=mysql_num_rows($result);
  if($num>0)
  {
	  echo "<script>location.href='dashboard_hod.php?menu=aprovelist'</script>";
  }
  else
  {
	  echo '<script language="javascript" type="text/javascript">alert("No much results ..")</script>'; 
	  
  }

  
  }

  ?>