<script>
function getname()
{
	document.getElementById('form2').submit();
}
</script>
<?php 
$ad_no="AA";
?>
<div class="boxHead" style="padding-top:1.5%; height:auto;">CONDUCT CERTIFICATE
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link href="css/list.css" rel="stylesheet" />
<!--<link href="css/styles.css" rel="stylesheet" /> -->
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
	<h4>Conduct Details</h4>
    <table border="0">
      <tr>
        <td><label for="a_no">Admission No:</label></td>
        <td><input type="text" name="a_no" id="a_no" value="" pattern="[A-Z]" onchange="getname()"/>
          <?php
		 if(isset($_POST['a_no']))
		 {
		 	$ad_no=$_POST['a_no'];
			
		 }
		 else
		 {
		 }
	  ?>
        </td>
      </tr></table></form>
      
<?php
include "dboperation.php";
	if(!preg_match ('/^([0-9A-Z]+)$/', $ad_no)){
		echo "<script>alert('Please input admission number in Capital letter!!')</script>";
			}
			else
			{
	$obj12=new dboperation();
	$query12="SELECT * FROM cc where adm_no='$ad_no' ";		
	$result12=$obj12->selectdata($query12);
	$row=$obj12->fetch($result12);
	$id=$row[1];
	if($id == $ad_no)
		echo "<script>alert('CC all ready Issued!!')</script>";
	else	
	$obj8=new dboperation();
	$query8="SELECT * FROM cc ORDER BY cc_no DESC LIMIT 1";
	$result8=$obj8->selectdata($query8);
	$row=$obj8->fetch($result8);
	$cc_id=$row[0];
	$next_cc_id=$cc_id+1;

	$obj5=new dboperation();
	$query5="SELECT * FROM stud WHERE adm_no = '$ad_no' ";	
	// $query5="SELECT * FROM stud WHERE adm_no = '$ad_no' or stud_id = '$ad_no' ";	
	$result5=$obj5->selectdata($query5);
	while($row=$obj5->fetch($result5))
	{
	 	$adno=("$row[0]");
	    $yrad=("$row[1]");
		$na=("$row[2]");
	}
	$obj6=new dboperation();
	$query6="SELECT * FROM stud_batch_rel WHERE adm_no = '$ad_no' ";	
	// $query6="SELECT * FROM stud_batch_rel WHERE adm_no = '$ad_no' or stud_batch_rel_id = '$ad_no' ";	
	$result6=$obj6->selectdata($query6);
	while($row=$obj6->fetch($result6))
	{
	 	$bchid=("$row[1]");
	}
	$obj3=new dboperation();
	$query3="SELECT * FROM batch WHERE batch_id = '$bchid' ";
	$result3=$obj3->selectdata($query3);
	while($row=$obj3->fetch($result3))
	{
	$cs_id=$row[2];
	}
	$obj2=new dboperation();
	$query2="SELECT * FROM course_specialization WHERE course_spec_id = '$cs_id' ";	
	$result2=$obj2->selectdata($query2);
	while($row=$obj2->fetch($result2))
	{
	 	$cid=("$row[1]");
	    $sid=("$row[2]");
	}
	$obj4=new dboperation();
	$query4="SELECT * FROM courses WHERE id = '$cid' ";
	$result4=$obj4->selectdata($query4);
	$row=$obj4->fetch($result4);
	$course=$row[1];
	//$course="aaa";
	$obj6=new dboperation();
	$query6="SELECT * FROM specialization WHERE spec_id = '$sid' ";
	$result6=$obj6->selectdata($query6);
	$row=$obj6->fetch($result6);
	$specialisation=$row[1];
			}
// $issue_date=date('Y-m-d');	
// $caste=$rlgn."-".$cst; 
	?>
      <form id="form1" name="form1" method="post" action="cc1_pdf.php" enctype="multipart/form-data" class="sear_frm" target="_blank" >
<table border="0" width="800" bordercolorlight="#C136F5" bgcolor="#B8D8E4">
      <tr>
      <td><label for="cc_no">CC No:</label></td>
        <td><input type="text" name="cc_no" id="cc_no" value="<?=$next_cc_id?>" readonly/></td>
       <td><label for="adno">Admission No:</label></td>
        <td><input type="text" name="adno" id="adno" value="<?=$adno?>" readonly/></td>
        </tr>
        <tr>
        <td><label for="name">Name Of Student</label></td>
        <td><input type="text" name="name" id="name"  value="<?=$na?>" readonly/></td>
        <td><label for="yr_adm">Date Of Admission</label></td>
        <td><input type="date" name="dte" id="dte"  value="<?=$yrad?>" readonly/></td>
      </tr>
        <tr>
        <td><label for="completion">Date of Completion</label></td>
        <td><input type="date" name="completion" id="completion"  value="" required/></td>
     
       <td><label for="course">Course</label></td>
        <td><input type="text" name="course" id="course"  value="<?=$course?>" readonly /></td>
       </tr>
       
      <tr>
        <td><label for="specialization">Specialization</label></td>
        <td><input type="text" name="specialization" id="specialization"  value="<?=$specialisation?>" readonly /></td>
     
        <td><label for="university">University</label></td>
         <td><select name="university" id="university" required>
            <option value="">~~Choose University~~</option>
				<option value="Mahatma Ganghi University" >MG</option>
                <option value="Kerala Technical University" >KTU</option></select></td>
          </tr>
      <tr>
        <td><label for="month">Exam month</label></td>
       <td><select name="month" id="month" required>
            <option value="">~~Choose Month~~</option>
				<option value="January" >January</option>
                <option value="February" >February</option>
                <option value="March" >March</option>
                <option value="April" >April</option>
                <option value="May" >May</option>
                <option value="June" >June</option>
                <option value="July" >July</option>
                <option value="August" >August</option>
                <option value="September" >September</option>
                <option value="October" >October</option>
                <option value="November" >November</option>
                <option value="December" >December</option></select></td>
       
        <td><label for="character">Character and Conduct</label></td>
        <td><textarea name="character" id="character" cols="30" rows="7" required /></textarea></td>
      </tr>
    </table>
    <table>
      <tr>
      </tr>
      <tr>
      </tr>
      <tr>
      <td colspan="2"><div align="center">
            <input type="submit" name="submit" id="submit" value="PRINT CC" class="logbtn" />
			<input type="reset" name="submit2" id="submit2" value="CLEAR" class="logbtn" onclick="location.href='dashboard_staff.php?menu=cc_gen';"/>
          </div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
   
  </div>
</form>
</div>
</html>


