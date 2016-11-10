<div class="boxHead" style="padding-top:1.5%; height:auto;">Select Required Fields</div>
<?php
include "connect1.php";
$course=$_GET['para1'];
$batch=$_GET['para2'];
$spec=$_GET['para4'];
$dept=$_GET['para3'];
$sq="SELECT adm_no,yr_adm,name,dob,sex,religion,caste,mobile,email,name_guard,relation,occupation,income,address,phone from stud";
$q=mysqli_query($conn,$sq);
$i=0;
$field = mysqli_num_rows($q);
 $acsq="SELECT rank,quota,school_1,reg_no_yr_1,board_1,school_2,reg_no_yr_2,board_2,no_chance,total,cur_sem FROM pg";
 $s=mysqli_query($conn,$acsq);
 $j=0;
 $acfield=mysqli_num_rows($s);
   ?>
<form name="f1" method="post" action="ndataexcel.php"class="sear_form">
<br><br>
<center>
<input hidden="enabled" style="border-style:hidden" type="text" name="course" value="<?php echo $course ?>">
<input hidden="enabled" style="border-style:hidden" type="text" name="batch" value="<?php echo $batch ?>">
<input hidden="enabled" style="border-style:hidden" type="text" name="spec" value="<?php echo $spec ?>">
<input hidden="enabled" style="border-style:hidden" type="text" name="dept" value="<?php echo $dept ?>">

</center>
<br><br>
<br>
 <table  style="border:solid thin" align="center">
 
 <?php
 $o=0;
 //echo $field.'frfr';

	for($i=0;$i<$field;$i++)
	{
		if(!in_array(mysqli_fetch_field_direct($q,$i)->name,array('image'))){
			
		if($o==0)
		{
			echo"<tr>";
		}
	?>
    <td style="border-bottom:solid thin; height:30px; width:150px ;padding:10px;"><label for="<?php echo $i?>">
	<?php 
	$field_arr = array('adm_no' => 'Admission Number','name' => 'Name','name_last' => 'Last name','dob' => 'DOB','sex' => 'Sex','religion' => 'Religion','caste' => 'Caste','yr_adm' => 'Year of admission','email' => 'Email id','mobile' => 'Mobile no','phone' => 'Tel.phn no','address' => 'Address','name_guard' => 'Name of guardian','relation' => 'Relation of the guardian','occupation' => 'Occupation of the guardian','income' => 'Annual income','school_1'=>'10th Level :School Name & Address','reg_no_yr_1' => 'SSLC Register no.','board_1' => 'Board of SSLC exam','school_2' => 'HSE : School Name & Address','reg_no_yr_2' => 'HSE Register no.','board_2' => 'Board of HSE exam','no_chance' => 'No of chances','total' => 'Total marks obtained in HSE','physics' => 'Marks obtained in physics','chemistry' => 'Marks obtained in chemistry','maths' => 'Marks obtained in Maths','chemistry' => 'Marks obtained in chemistry','course' => 'Course',						'branch' => 'Branch name','branch_code' => 'Branch code','roll_no' => 'Roll No','rank' => 'Rank','quota' => 'Quota','spec' => 'Specification','status' => 'Status','cur_sem' => 'Current Semester');
	echo $field_arr[mysqli_fetch_field_direct($q,$i)->name] ?></label></td><td style="border:solid thin; height:30px;"><input type="checkbox" name="c1[]" value="<?php  echo mysqli_fetch_field_direct($q,$i)->name ?>" id="<?php echo $i?>" checked="checked" />
    </td>
	<?php
	$o++;
		if($o==3)
		{
		echo"</tr>";
		$o=0;
		}
	//$i++;
	
		}
	}
		
?>
<tr>
<td colspan="6" align="right">
<input type="submit" value="submit" style="width:200px;height:30px;text-align:center;background:#9CF;border-radius:20px;" /></td>
</tr>
</table>
<br />



</form>