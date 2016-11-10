<script>
function getname()
{
	document.getElementById('form2').submit();
}
</script>

<div class="boxHead" style="padding-top:1.5%; height:auto;">STUDENT VERIFICATION
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link href="css/list.css" rel="stylesheet" />
<!--<link href="css/styles.css" rel="stylesheet" /> -->

<?php
$tp="";
?>
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
<form id="form2" name="form2" method="post" action="" enctype="multipart/form-data" class="sear_frm" >

  <div align="center">
	<h4>Personal Details</h4>
    <table border="0">
      <tr>
        <td><label for="tmp_no">Temp No:</label></td>
        <td><input type="text" name="tmp_no" id="tmp_no" value=""  onchange="getname()"/>
          <?php
		 if(isset($_POST['tmp_no']))
		 {
		 	$tp=$_POST['tmp_no'];
		 
		 }
		 else
		 {
		 }
	  ?>
        </td>
      </tr></table>
      </form>
<?php

	include "dboperation.php";
	$obj5=new dboperation();
	$query5="SELECT * FROM temp WHERE temp_no = '$tp' ";	
	$result5=$obj5->selectdata($query5);
	while($row=$obj5->fetch($result5))
	{
	 
	    $co=("$row[1]");
		$sp=("$row[2]");
		$bc=("$row[3]");
		$dt=("$row[4]");
		$na=("$row[5]");
		$db=("$row[6]");
		$sx=("$row[7]");
		$rlgn=("$row[8]");
		$cst=("$row[9]");
		$mob=("$row[10]");
		$mail=("$row[11]");
		$nagd=("$row[12]");
		$rel=("$row[13]");
		$occpn=("$row[14]");
		$inc=("$row[15]");
		$adrs=("$row[16]");
		$phno=("$row[17]");
		$csem=("$row[34]");
		$rlno=("$row[19]");
		$file1=("$row[18]");
		$rnk=("$row[20]");
		$qta=("$row[21]");
		$scl1=("$row[22]");
		$rgno1=("$row[23]");
		$brd1=("$row[24]");
		$scl2=("$row[25]");
		$rgno2=("$row[26]");
		$brd2=("$row[27]");
		$chnc=("$row[28]");
		$nalast=("$row[29]");
		$tot=("$row[30]");
		$phy=("$row[31]");
		$chem=("$row[32]");
		$math=("$row[33]");
		$admtype=("$row[35]");
		$blood=("$row[36]");
		$score=("$row[37]");
		
	}
	$obj4=new dboperation();
	$query4="SELECT * FROM courses WHERE course = '$co' ";	
	$result4=$obj4->selectdata($query4);
	while($row=$obj4->fetch($result4))
	{
	 
	  $cat=("$row[2]");
	}
	
	
$year=date('Y', strtotime($dt));
$yr=substr("$year",2);

$obj6=new dboperation();
	$query6="SELECT * FROM stud ORDER BY stud_id DESC LIMIT 1";
	$result6=$obj6->selectdata($query6);
	$row=$obj6->fetch($result6);
	$st_id=$row[18];
$next_st_id=$st_id+1;
if(($co == 'Btech')&&($sp == 'Civil Engineering'))
{
	$code="BC";
}
if(($co == 'Btech')&&($sp == 'Mechanical Engineering'))
{
	$code="BM";
}
if(($co == 'Btech')&&($sp == 'Electrical & Electronics Engineering'))
{
	$code="BE";
}
if(($co == 'Btech')&&($sp == 'Electronics & Communication Engineering'))
{
	$code="BL";
}
if(($co == 'Btech')&&($sp == 'Computer Science & Engineering'))
{
	$code="BR";
}
if(($co == 'Mtech')&&($sp == 'Industrial Engineering & Management'))
{
	$code="MM";
}
if(($co == 'Mtech')&&($sp == 'Industrial Drives & Control'))
{
	$code="ME";
}
if(($co == 'Mtech')&&($sp == 'Transportation Engineering'))
{
	$code="MC";
}
if(($co == 'Mtech')&&($sp == 'Advanced Communication & Information System'))
{
	$code="ML";
}
if(($co == 'Mtech')&&($sp == 'Advanced Electronics & Communication'))
{
	$code="ML";
}
if(($co == 'Mtech')&&($sp == 'Computer Science & Engineering'))
{
	$code="MR";
}
if(($co == 'Barch')&&($sp == 'Architecture'))
{
	$code="BA";
}
if(($co == 'MCA')&&($sp == 'Computer Application'))
{
	$code="MP";
}
$admission_no=$yr.$code.$next_st_id;
	

?>
      
      <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" class="sear_frm" >
      <?php 

if (isset($_REQUEST['button']))
{

		$co=$_POST['course1'];
		$sp=$_POST['spec'];
		$bc=$_POST['bch'];
		$admno=$_POST['adm_no'];
		$todays_date=$_POST['dte'];
		$na=$_POST['name'];
		$db=$_POST['dob'];
		$sx=$_POST['gender'];
		$rlgn=$_POST['religion'];
		$cst=$_POST['caste'];
		$mob=$_POST['mobile'];
		$mail=$_POST['email'];
		$nagd=$_POST['name_guard'];
		$rel=$_POST['relation'];
		$occpn=$_POST['occupation'];
		$inc=$_POST['income'];
		$adrs=$_POST['address'];
		$phno=$_POST['phone'];
		$csem=$_POST['cur_sem'];
		$rlno=$_POST['roll_num'];
		$rnk=$_POST['rank_no'];
		$qta=$_POST['quota'];
		$scl1=$_POST['school_1'];
		$rgno1=$_POST['reg_no_yr_1'];
		$brd1=$_POST['board_1'];
		$scl2=$_POST['school_2'];
		$rgno2=$_POST['reg_no_yr_2'];
		$brd2=$_POST['board_2'];
		$chnc=$_POST['no_chance'];
		$nalast=$_POST['name_last'];
		$tot=$_POST['total'];
		$phy=$_POST['physics'];
		$chem=$_POST['chemistry'];
		$math=$_POST['maths'];
		$admtype=$_POST['admtype'];
		$blood=$_POST['blood'];
		$score=$_POST['score'];
		$hid=$_POST['c'];
		$file=$_FILES['file']['name'];
	
 
    $obj=new dboperation();
  $q="INSERT INTO `stud` (`adm_no`, `yr_adm`, `name`, `dob`, `sex`, `religion`, `caste`, `mobile`, `email`, `name_guard`, `relation`, `occupation`, `income`, `address`, `phone`, `image`, `admission_type`, `blood_group`, `stud_id`) VALUES ('$admno', '$todays_date', '$na', '$db', '$sx', '$rlgn','$cst', '$mob', '$mail', '$nagd', '$rel', '$occpn', '$inc', '$adrs', '$phno', '$file', '$admtype', '$blood', '$next_st_id')";
    $obj->Ex_query($q);
	move_uploaded_file($_FILES["file"]["tmp_name"],"upload/photo/" . $_FILES["file"]["name"]);
	if($file == "")
	{
		$obji=new dboperation();
$queryi = "UPDATE stud SET image = '$hid' WHERE adm_no = '$admno' ";
		  $obji->Ex_query($queryi);
	}
	else
	{
		
	}
	$obj4=new dboperation();
	$query4="SELECT * FROM courses WHERE course = '$co' ";	
	$result4=$obj4->selectdata($query4);
	while($row=$obj4->fetch($result4))
	{
	  $cid=("$row[0]");
	//  $cat=("$row[2]");
	}
	$obj15=new dboperation();
	$query15="SELECT * FROM specialization WHERE specialisation = '$sp' ";	
	$result15=$obj15->selectdata($query15);
	while($row=$obj15->fetch($result15))
	{
	  $sp_id=("$row[0]");
	}
	$obj16=new dboperation();
	$query16="SELECT * FROM course_specialization WHERE course_id = '$cid' and spec_id = '$sp_id' ";	
	$result16=$obj16->selectdata($query16);
	while($row=$obj16->fetch($result16))
	{
	  $cs_id=("$row[0]");
	}
    $obj6=new dboperation();
	$query6="SELECT batch_id FROM batch WHERE course_spec_id = '$cs_id' and year_batch = '$bc' ";	
	$result6=$obj6->selectdata($query6);
	while($row=$obj6->fetch($result6))
	{
	  $bid=("$row[0]");
	}
    $obj1=new dboperation();
    $q1="INSERT INTO stud_batch_rel (`adm_no`, `batch_id`, `stud_batch_rel_id`) VALUES ('$admno', '$bid', '$next_st_id')";
    $obj1->Ex_query($q1);
	
    if($co == 'Btech')
      {
   $obj2=new dboperation();
 $q2="INSERT INTO `ug` (`ug_id`, `admno`, `cur_sem`, `roll_no`, `rank`, `quota`, `school_1`, `reg_no_yr_1`, `board_1`, `school_2`, `reg_no_yr_2`, `board_2`, `no_chance`, `name_last`, `total`, `physics`, `chemistry`, `maths`) VALUES ('$next_st_id', '$admno', '$csem' , '$rlno', '$rnk', '$qta', '$scl1', '$rgno1','$brd1', '$scl2', '$rgno2', '$brd2', '$chnc', '$nalast','$tot','$phy','$chem','$math')";
    $obj2->Ex_query($q2);
      }
    elseif($co == 'Barch')
     {
	$objb=new dboperation();
 $qb="INSERT INTO `ug` (`ug_id`, `admno`, `cur_sem`, `roll_no`, `rank`, `quota`, `school_1`, `reg_no_yr_1`, `board_1`, `school_2`, `reg_no_yr_2`, `board_2`, `no_chance`, `name_last`, `total`, `physics`, `chemistry`, `maths`) VALUES ('$next_st_id', '$admno', '$csem' , '$rlno', '$rnk', '$qta', '$scl1', '$rgno1','$brd1', '$scl2', '$rgno2', '$brd2', '$chnc', '$nalast','$tot','$phy','$chem','$math')";
    $objb->Ex_query($qb);
	 }
	elseif($co == 'MCA')	 	 
	{	 
	$obj7=new dboperation();
 $q7="INSERT INTO `pg` (`pg_id`, `admno`, `cur_sem`, `roll_no`, `rank`, `quota`, `school_1`, `reg_no_yr_1`, `board_1`, `school_2`, `reg_no_yr_2`, `board_2`, `no_chance`, `name_last`, `total`) VALUES ('$next_st_id', '$admno', '$csem' , '$rlno', '$rnk', '$qta', '$scl1', '$rgno1','$brd1', '$scl2', '$rgno2', '$brd2', '$chnc', '$nalast','$tot')";
    $obj7->Ex_query($q7);  
     } 
	 else
	 {
	$objc=new dboperation();
 $qc="INSERT INTO `pg` (`pg_id`, `admno`, `cur_sem`, `roll_no`, `rank`, `quota`, `school_1`, `reg_no_yr_1`, `board_1`, `school_2`, `reg_no_yr_2`, `board_2`, `no_chance`, `name_last`, `total`, `gate_score`) VALUES ('$next_st_id', '$admno', '$csem' , '$rlno', '$rnk', '$qta', '$scl1', '$rgno1','$brd1', '$scl2', '$rgno2', '$brd2', '$chnc', '$nalast','$tot', '$score')";
    $objc->Ex_query($qc);    
	 }
echo "<script>alert('Details are entered successfully')</script>";
} 
?>

 <table border="0" width="800" bordercolorlight="#C136F5" bgcolor="#B8D8E4">
  <tr>
      <td><label for="adm_no">Admission No:</label></td>
        <td><input type="text" name="adm_no" id="adm_no" value="<?=$admission_no?>" required="required" readonly /></td>
        
        
 <?php  //photo editing code..
		 echo "<td colspan='2' rowspan='4' align='center'><img src='upload/photo/".$file1."' width='100' height='100'><input type='file' name='file' id='file' value=''/></td>";
		?>
        
    
        </tr>
        <tr>
<td><label for="course">Course</label> </td>
<td><?php

echo '<select name="course1" id="course1">';
echo "<option>$co</option>"; ?></td>
</tr>
<tr>
<td><label for="spec">Branch</label> </td>
<td><?php
echo '<select name="spec" id="spec">';
echo "<option>$sp</option>"; ?>
<?php
$obj12=new dboperation();
	$query12="SELECT * FROM courses WHERE course = '$co' ";
	$result12=$obj12->selectdata($query12);
	$row=$obj12->fetch($result12);
	$id=$row[0];

 $obj13=new dboperation();
	$query13="SELECT * FROM course_specialization WHERE course_id= '$id' ";
	$result13=$obj13->selectdata($query13);
	while($row=$obj13->fetch($result13))
{
$obj2=new dboperation();  	
$order2 = "SELECT specialisation FROM specialization WHERE spec_id = '$row[2]' and specialisation <> '$sp' ";	
$result2=$obj2->selectdata($order2);					
while($f2=$obj2->fetch($result2))
{
		if(isset($_POST['spec']))
		 {
			 echo '<option ';
			 if($_REQUEST['spec']==$f2['specialisation'])
			 echo 'selected = "selected" ';
			 echo " value='$f2[0]' >".$f2[0]."</option>";
			 
					
		 }
		else
		{
					echo "<option id='' value=".$f2[0].">".$f2[0]."</option>";
		}			 
}
	}
      echo '</select>';
	  ?></td>                   
</tr>
<tr>
<td><label for="bch">Batch</label> </td>
<td><select name="bch" id="bch">
          <option><?=$bc?></option>
          <?php
		  $obj15=new dboperation();
	$query15="SELECT * FROM specialization WHERE specialisation = '$sp' ";	
	$result15=$obj15->selectdata($query15);
	while($row=$obj15->fetch($result15))
	{
	  $sp_id=("$row[0]");
	}	  
 	$obj8=new dboperation();
	$query8="SELECT * FROM course_specialization WHERE course_id = '$id' and spec_id = '$sp_id' ";	
	$result8=$obj8->selectdata($query8);
	while($row=$obj8->fetch($result8))
	{
		$obj14=new dboperation();
		$query14="SELECT * FROM batch WHERE course_spec_id = '$row[0]' and year_batch <> '$bc' ";	
		$result14=$obj14->selectdata($query14);
		while($row=$obj14->fetch($result14))
	{
		
	?>
                        <option><?php echo "$row[1]"; ?></option>
                        <?php
							}
	}
							?></select>
                            </td>
         
</tr>
<tr>
<td><label for="admtype">Admission type</label></td>
<?php
  if($admtype == 'Normal')
  {
 echo "<td> <input type='radio' name='admtype' value='Normal' checked> Normal";
 echo "<input type='radio' name='admtype' value='Lateral'> Lateral";
 echo "<input type='radio' name='admtype' value='Transfer'> Transfer";
  }
  elseif($admtype == 'Lateral')
  {
 echo "<td> <input type='radio' name='admtype' value='Normal'> Normal";
 echo "<input type='radio' name='admtype' value='Lateral' checked> Lateral";
 echo "<input type='radio' name='admtype' value='Transfer'> Transfer";
  }
  elseif($admtype == 'Transfer')
  {
 echo "<td> <input type='radio' name='admtype' value='Normal'> Normal";
 echo "<input type='radio' name='admtype' value='Lateral'> Lateral";
 echo "<input type='radio' name='admtype' value='Transfer' checked> Transfer";
  }
  else
  {
 echo "<td> <input type='radio' name='admtype' value='Normal'> Normal";
 echo "<input type='radio' name='admtype' value='Lateral'> Lateral";
 echo "<input type='radio' name='admtype' value='Transfer'> Transfer";
  }
 ?></td>
<td><label for="yr_adm">Date Of Admission</label></td>
<td><input type="date" name="dte" id="dte"  value="<?=$dt?>" required="required" /></td>
</tr>
      <tr>
        <td><label for="name">Name Of Candidate</label> <span class="mand">*</span></td>
        <td><input type="text" name="name" id="name"  value="<?=$na?>"/></td>
        <td><label for="dob">Data Of Birth</label></td>
        <td><input type="date" name="dob" id="dob"  value="<?=$db?>" required="required" /></td>
      </tr>
      <tr>
        <td><label for="sex">Sex</label></td>
  <?php
  if($sx == 'M')
  {
echo "<td> <input type='radio' name='gender' value='M' checked> Male";
 echo "<input type='radio' name='gender' value='F'> Female";
 echo "<input type='radio' name='gender' value='O'> Other";
  }
  elseif($sx == 'F')
  {
	echo "<td> <input type='radio' name='gender' value='M'> Male";
 echo "<input type='radio' name='gender' value='F' checked> Female";
 echo "<input type='radio' name='gender' value='O'> Other";  
  }
  elseif($sx == 'O')
  {
	 echo "<td> <input type='radio' name='gender' value='M'> Male";
 echo "<input type='radio' name='gender' value='F'> Female";
 echo "<input type='radio' name='gender' value='O' checked> Other"; 
  }
   else
  {
 echo "<td> <input type='radio' name='gender' value='M'> Male";
 echo "<input type='radio' name='gender' value='F'> Female";
 echo "<input type='radio' name='gender' value='O'> Other";   
   }
 ?>
        </td>
        <td><label for="blood">Blood Group</label></td>
        <td><select name="blood" id="blood">
            <option><?=$blood?></option>
              <?php
    $o=new dboperation();
	$q="SELECT * FROM  blood_group WHERE bgroup <> '$blood' ";	
	$r=$o->selectdata($q);
	while($row=$o->fetch($r))
	{
	?>
                        <option><?php echo "$row[1]"; ?></option>
                        <?php
							}
							?>
        </select></td>
      </tr>
      <tr>
        <td><label for="religion">Religion</label></td>
        <td><input type="text" name="religion" id="religion" value="<?=$rlgn?>"></td>
        <td><label for="caste">Caste</label></td>
        <td><input type="text" name="caste" id="caste"  value="<?=$cst?>" /></td>
      </tr>
      <tr>
        <td><label for="mobile">Mobile No:</label></td>
        <td><input type="text" name="mobile" id="mobile" value="<?=$mob?>"/></td>
        <td><label for="email">Email</label></td>
        <td><input type="text" name="email" id="email"  value="<?=$mail?>" /></td>
      </tr>
      <tr>
        <td height="29"><label for="name_guard">Name Of Guardian</label></td>
        <td>
          <input type="text" name="name_guard" id="name_guard" value="<?=$nagd?>"/></td>
        <td height="29"><label for="relation">Relation With Guardian</label></td>
        <td>
          <input type="text" name="relation" id="relation" required="required"  value="<?=$rel?>"/></td>
      </tr>
      <tr>
        <td height="29"><label for="occupation">Occupation Of Guardian</label></td>
        <td>
          <input type="text" name="occupation" id="occupation"  value="<?=$occpn?>"/></td>
        <td height="29"><label for="income">Annual Income</label></td>
        <td>
          <input type="text" name="income" id="income"  value="<?=$inc?>" /></td>
      </tr>
      <tr>
        <td height="29"><label for="address">Address</label></td>
        <td>
         <input type="text" name="address" id="address" cols="30" rows="7" value="<?=$adrs?>" /></td>

        <td height="29"><label for="phone">Telephone No:</label></td>
        <td>
          <input type="text" name="phone" id="phone"  value="<?=$phno?>"/></td>
      </tr>
      <tr>
      <td colspan="4" rowspan="1" align="center"> <h4>Academic Details</h4> </td>
      </tr>
      <tr>
        <td><label for="cur_sem">Current Semester</label></td>
        <td> <select name="cur_sem" id="cur_sem">
          <option><?=$csem?></option>
          <?php
          $obj10=new dboperation();
	$query10="SELECT * FROM sem1 WHERE semester <> '$csem' ";	
	$result10=$obj10->selectdata($query10);
	while($row=$obj10->fetch($result10))
	{
	?>
                        <option><?php echo "$row[1]"; ?></option>
                        <?php
							}
							?>
          
          </select></td>
   <?php
  if($co == 'Btech')
  {
		echo "<td><label for='score'>Gate Score</label></td>";
        echo "<td><input type='text' name='score' id='score'  value='' disabled/></td></tr>";
  }
  elseif($co == 'Barch')
  {
		echo "<td><label for='score'>Gate Score</label></td>";
        echo "<td><input type='text' name='score' id='score'  value='' disabled/></td></tr>";
  }
  elseif($co == 'MCA')
  {
		echo "<td><label for='score'>Gate Score</label></td>";
        echo "<td><input type='text' name='score' id='score'  value='' disabled/></td></tr>";
  }
  else
  {
	    echo "<td><label for='score'>Gate Score</label></td>";
        echo "<td><input type='text' name='score' id='score'  value='$score' /></td></tr>";
  }
   
   ?>
          
        <tr>
        <td><label for="roll_no">Entrance roll No:</label></td>
        <td><input type="text" name="roll_num" id="roll_num"  value="<?=$rlno?>"/></td>
        <td><label for="rank_no">Entrance rank No:</label></td>
        <td><input type="text" name="rank_no" id="rank_no"  value="<?=$rnk?>" /></td>
        </tr>
        <tr>
        <td><label for="quota">Quota</label></td>
        <td><input type="text" name="quota" id="quota"  value="<?=$qta?>"/></td>
         <td><input type="hidden" name="c" value="<?=$file1?>"></td>
      </tr>
   
      <tr>
        <td><label for="school_1">Name of Institution studied at </br> SSLC or equivalent</label></td>
        <td> <input type="text" name="school_1" id="school_1"  value="<?=$scl1?>" /></td>
        <td><label for="reg_no_yr_1"> Register No & year of passing</label></td>
        <td><input type="text" name="reg_no_yr_1" id="reg_no_yr_1"  value="<?=$rgno1?>"  /></td>
        </tr>
           <tr>
         <td> <label for="board_1">Name of Board/University</label></td>
        <td><input type="text" name="board_1" id="board_1"  value="<?=$brd1?>"/></td>  <td></td><td></td>
      </tr>
      <tr>
        <td><label for="school_2">Name of Instition from </br> qualifying exam passed</label></td>
        <td> <input type="text" name="school_2" id="school_2"  value="<?=$scl2?>" /></td>
     
        <td> <label for="reg_no_yr_2">Register No & year of passing</label></td>
        <td><input type="text" name="reg_no_yr_2" id="reg_no_yr_2"  value="<?=$rgno2?>"  /></td></tr>
          <tr> <td> <label for="board_2">Name of Board/University</label></td>
        <td> <input type="text" name="board_2" id="board_2"  value="<?=$brd2?>" /></td> <td></td><td></td>
      </tr>
      <tr>
      <td><label for="name_last">Name of Institution last studied</label></td>
        <td><input type="text" name="name_last" id="name_last"  value="<?=$nalast?>" /></td>
      <td><label for="no_chance">No of chances taken </br>for qualifying exam passed</label></td>
        <td> <input type="text" name="no_chance" id="no_chance"  value="<?=$chnc?>" /></td></tr>
       <tr>    
      <td><label for="total">Total marks obtained in qualifying exam </label></td>
        <td>
         <input type="text" name="total" id="total"  value="<?=$tot?>"/></td><td></td><td></td>
      </tr>
      <?php
  if($cat == 'pg')
  {
 echo "<tr>
      <td>";
	  echo "<label for='physics'><strong>Marks Obtained : </strong> Physics</label></td>";
			  echo "<td>";
			  echo "<input type='text' name='physics' id='physics' value='' disabled/>";
      
      echo "</td><td><label for='chemistry'>Chemistry</label></td>";
       echo "<td><input type='text' name='chemistry' id='chemistry'  value='' disabled/></td></tr>";
	   echo "<tr><td><label for='maths'>Mathematics</label></td>";
	   echo "<td><input type='text' name='maths' id='maths'  value='' disabled/></td><td></td></tr>";
  }
  else
  {
	  echo "<tr>
      <td>";
	  echo "<label for='physics'><strong>Marks Obtained : </strong> Physics</label></td>";
			  echo "<td>";
			  echo "<input type='text' name='physics' id='physics' value='$phy'/>";
      
      echo "</td><td><label for='chemistry'>Chemistry</label></td>";
       echo "<td><input type='text' name='chemistry' id='chemistry'  value='$chem'/></td></tr>";
	   echo "<tr><td><label for='maths'>Mathematics</label></td>";
	   echo "<td><input type='text' name='maths' id='maths'  value='$math'/></td><td></td></tr>"; 
  }
?>
    </table>
    <table>
      <tr>
      </tr>
      <tr>
      </tr>
      <tr>
      <td colspan="2"><div align="center">
            <input type="submit" name="button" id="button" value="Save" class="logbtn" />
			<input type="reset" name="" id="" value="Cancel" class="logbtn" onclick="location.href='dashboard_staff.php?menu=stud_veri';" />
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
