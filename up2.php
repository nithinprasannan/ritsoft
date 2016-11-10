
<link rel="stylesheet" type="text/css" href="styles.css" />
<script language="javascript" src="users.js" type="text/javascript"></script>

<?php
ob_start();
session_start();
error_reporting(0);
$tp_no = $_SESSION['acc'];

include('header.php');
//if(!(isset($_SESSION['log_user'])))
//	header('Location:index.php');
?>

<script language="javascript">
function CheckAll(chk)
{
	for(i=0;i<chk.length;i++)
	chk[i].checked=true;
}
function UncheckAll(chk)
{
	for(i=0;i<chk.length;i++)
	chk[i].checked=false;
}
function setUpdateAction()
{
		document.frmUser.action="updating.php";
		alert("Approved successfully")
	document.frmUser.submit();
}

</script>

<style>
form input[type=text],form input[type=date],textarea,form  input[type=password],form select{     width: 210px;   height: 35px;    text-align: center; vertical-align:middle;} 
</style>
<div id="page"> <br />
  <div class="welmsg">
    <table align="center" cellpadding="3" class="session">
      <tr>
        <td><?php echo"<b><font face='Algerian' size='5px'>Welcome ".$_SESSION['log_user'];?></td>
      </tr>
    </table>
  </div>
  <?php include('sidemenu_staff.php');?>
  <b><b>
  <div class="box" style="width:77%;" name="common">
    

<div class="boxHead" style="padding-top:1.5%; height:auto;">SEM REGISTRATION APPROVAL</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link href="css/list.css" rel="stylesheet" />
<link href="css/styles.css" rel="stylesheet" />

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
<form id="form1" name="frmUser" method="post" action="#" enctype="multipart/form-data" class="sear_frm" target="_blank">
 
  
  <?php
// student list for sem registration
//session_start();
//if(!(isset($_SESSION['log_user'])))
	//header('Location:index.php');
 $sem=$_SESSION['sem'];
$course=$_SESSION['course'];

	$branch=$_SESSION['branch'];   
	$batch=$_SESSION['batch'];
$conn = mysql_connect("localhost","root","");
mysql_select_db("int",$conn);
$result = mysql_query("select  * from stud_sem_registration sr where sr.batch_id=(select batch_id from batch where course_spec_id=(select course_spec_id from course_specialization where spec_id=(select spec_id from specialization where specialisation='$branch') and course_id=(select id from courses where course='$course')) and year_batch=$batch) and sr.new_sem='$sem'");



?>
        
  
  <div align="center">
    <h4>&nbsp;</h4>
    <table border="0" cellpadding="10" cellspacing="1" width="1005" class="tblListForm">
      <tr class="listheader">
        <td></td>
        <td>ADMISSION NUMBER</td>
        <td>NAME</td>
        <td>COURSE</td>
        <TD>BRANCH</TD>
        <td>BATCH</td>
        <TD>APPLICATION STATUS</TD>
        <TD>APPLIED DATE</TD>
        <td>PREVIOUS SEMESTER</td>
        <TD>SEMESTER TO WHICH PROMOTION SAUGHT FOR</TD>
      </tr>
      <?php
	  //echo 'hii';
$i=0;
while($row = mysql_fetch_array($result)) {
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";

$sql2 ="select name from stud where adm_no='$row[adm_no]'";
	$result2=mysql_query($sql2);
	while($db_field=mysql_fetch_assoc($result2))
	{ 
	$name=$db_field['name'];
	//echo $name;
	}

?>
      <tr class="<?php if(isset($classname)) echo $classname;?>">
        <td><input type="checkbox" name="users[]" id="select" value="<?php echo $row["adm_no"]; ?>"></td>
        <td><?php echo $row["adm_no"]; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $course; ?></td>
        <td><?php echo $branch; ?></td>
        <td><?php echo $batch; ?></td>
        <td><?php echo $row["apl_status"]; ?></td>
        <td><?php echo $row["apl_date"]; ?></td>
        <td><?php echo $row["previous_sem"]; ?></td>
        <td><?php echo $row["new_sem"]; ?></td>
      </tr>
      <?php
$i++;
}
?>
      <tr class="listheader">
        <td colspan="4"><p>
          <input type="button" name="button" id="button" value="SELECT ALL"  onClick="CheckAll(document.frmUser.select)">
          <input type="button" name="button2" id="button2" value="UNCHECK ALL" onClick="UncheckAll(document.frmUser.select)">
        </p>
          <p>
            <input type="submit" name="submit" id="submit" value="APPROVE" >
            
            
            <?php

if(isset($_POST['submit']))
{
	
	
	
	$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) {
	$val[$i]=$_POST['users'][$i];
	//echo $val[$i];
	
mysql_query("update stud_sem_registration set apv_status='Approved'  where adm_no='" . $_POST["users"][$i] . "'");
mysql_query("update stud_sem_registration set apv_date=NOW()  where adm_no='" . $_POST["users"][$i] . "'");
}
	
 echo "<script language='JavaScript' type='text/JavaScript'>alert('Approved Sucessfully');</script>";	
}

?>
          </p></td>
      </tr>
    </table>
    <p>&nbsp;</p>
	<table>
	  <tr>
      </tr>
      <tr>
      </tr>
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
  </div>
  </div>
<b><b>
<?php include('footer.php')?>