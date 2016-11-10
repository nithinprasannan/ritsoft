<script>
function getname()
{
	document.getElementById('form2').submit();
}
</script>
<?php
$ad_no="AA";
?>
<div class="boxHead" style="padding-top:1.5%; height:auto;">TRANSFER CERTIFICATE
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
	<h4>Transfer Details</h4>
    <table border="0">
      <tr>
        <td><label for="a_no">Admission No:</label></td>
        <td><input type="text" name="a_no" id="a_no" value="" onchange="getname()"/>
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
      

      <form id="form1" name="form1" method="post" action="tc_pdf.php" enctype="multipart/form-data" class="sear_frm" target="_blank" >
	 
	 <?php
include "dboperation.php";
	if(!preg_match ('/^([0-9A-Z]+)$/', $ad_no)){
		echo "<script>alert('Please input admission number in Capital letter!!')</script>";
			}
			else
			{
    $obj12=new dboperation();
	$query12="SELECT * FROM tc where adm_no='$ad_no' ";		
	$result12=$obj12->selectdata($query12);
	$row=$obj12->fetch($result12);
	$id=$row[1];
		if($id == $ad_no)
		echo "<script>alert('TC all ready Issued!!')</script>";
	else			
	$obj5=new dboperation();
	$query5="SELECT * FROM stud WHERE adm_no = '$ad_no' ";	
	$result5=$obj5->selectdata($query5);
	while($row=$obj5->fetch($result5))
	{
	 	$adno=("$row[0]");
	    $dt=("$row[1]");
		$na=("$row[2]");
		$db=("$row[3]");
		$rlgn=("$row[5]");
		$cst=("$row[6]");
	}
$obj6=new dboperation();
	$query6="SELECT * FROM tc ORDER BY tc_no DESC LIMIT 1";
	$result6=$obj6->selectdata($query6);
	$row=$obj6->fetch($result6);
	$tc_id=$row[0];
$next_tc_id=$tc_id+1;
	
$issue_date=date('Y-m-d');	
$caste=$rlgn."-".$cst; 
			}
	?>
	
  <table border="0" width="800" bordercolorlight="#C136F5" bgcolor="#B8D8E4">
      <tr>
      	<td><label for="tc_no">TC No:</label></td>
        <td><input type="text" name="tc_no" id="tc_no" value="<?=$next_tc_id?>" readonly/></td>
        <td><label for="adno">Admission No:</label></td>
        <td><input type="text" name="adno" id="tc_no" value="<?=$adno?>" readonly/></td>
        </tr>
        <tr>
        <td><label for="name">Name Of Student</label></td>
        <td><input type="text" name="name" id="name"  value="<?=$na?>" readonly/></td>
        <td><label for="dob">Data Of Birth</label></td>
        <td><input type="date" name="dob" id="dob"  value="<?=$db?>" readonly/></td>
        </tr>
      <tr>
        <td><label for="caste">Caste & Religion</label></td>
        <td><input type="text" name="caste" id="caste"  value="<?=$caste?>" readonly /></td>
        <td><label for="yr_adm">Date Of Admission</label></td>
        <td><input type="date" name="dte" id="dte"  value="<?=$dt?>" readonly/></td>
      </tr>
      <tr>
        <td><label for="class">Classes to which Admitted</label></td>
        <td><input type="text" name="class" id="class"  value="" required /></td>		        
        <td><label for="leaving">Date of Leaving</label></td>
        <td><input type="date" name="leaving" id="leaving" value="" required /></td>
        </tr>
        <tr>
        <td><label for="relive">Classes from which Relived</label></td>
        <td><input type="text" name="relive" id="relive"  value="" required /></td>
        <td><label for="higher">Whether qualified for promotion to higher class</label></td>
          <td><select name="higher" id="higher" required>
            <option></option>
				<option value="Yes" >Yes</option>
                <option value="No" >No</option></select></td>
      </tr>
      
          <tr>
        <td><label for="fee">Whether all the fees and other due have been paid</label></td>
        <td><select name="fee" id="fee" required>
            <option></option>
				<option value="Yes" >Yes</option>
                <option value="No" >No</option></select></td>
                <td><label for="concession">Whether the student was receipt of the fee concession</label></td>
       <td><select name="concession" id="concession" required>
            <option></option>
				<option value="Yes" >Yes</option>
                <option value="No" >No</option></select></td>
      </tr>
     
        <tr>
       <td><label for="application">Date of application of TC</label></td>
        <td><input type="date" name="application" id="application"  value="" required /></td>
         <td><label for="issue">Date of Issue of TC</label></td>
        <td><input type="date" name="issue" id="issue"  value="<?=$issue_date?>" readonly/></td>
      </tr>
         <tr>
        <td><label for="reason">Reason for Leaving</label></td>
        <td><textarea name="reason" id="reason" cols="30" rows="7" required /></textarea></td>
         <td><label for="institution">Institution to which the student intends proceeding </label></td>
        <td><input type="text" name="institution" id="institution"  value="" required/></td>
      </tr>
     
    </table>
    <table>
      <tr>
      </tr>
      <tr>
      </tr>
      <tr>
      <td colspan="2"><div align="center">
            <input type="submit" name="submit" id="submit" value="PRINT TC" class="logbtn" />
			<input type="reset" name="submit2" id="submit2" value="CLEAR" class="logbtn" onclick="location.href='dashboard_staff.php?menu=tc_gen';" />
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


