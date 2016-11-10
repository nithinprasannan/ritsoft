<?php
ob_start();
session_start();
error_reporting(0);

?>
<script>
function getcourse()
{
	document.getElementById('form1').submit();
}
function getspec()
{
	document.getElementById('form1').submit();
}
function validate()
{
	var course1=document.getElementById("course1").value;
    if(course1=="")
        {
            alert("Choose your course");
            document.getElementById("course1").focus();
            return false;
        }
	var spec=document.getElementById("spec").value;
    if(spec=="")
        {
            alert("Choose your branch");
            document.getElementById("spec").focus();
            return false;
        }
	var bch=document.getElementById("bch").value;
    if(bch=="")
        {
            alert("Choose your batch");
            document.getElementById("bch").focus();
            return false;
        }
	cho = ""
	le = document.form1.admtype.length
	for (i = 0; i <le; i++) 
	{
		if (document.form1.admtype[i].checked)
		{
			cho = document.form1.admtype[i].value
		}
	}
	if (cho == "") 
	{
		alert("Enter admission type");
		return false;
	}
    var name=document.getElementById("name").value;
    if(name=="")
        {
            alert("Enter your Name");
            document.getElementById("name").focus();
            return false;
        }
	 if (!name.match(/^[a-zA-Z. ]+$/)) 
    	{
        alert('Only alphabets and dot allowed');
        return false;
   		 }
	var dob=document.getElementById("dob").value;
    if(dob=="")
        {
            alert("Enter date of birth");
            document.getElementById("dob").focus();
            return false;
        } 
	chosen = ""
	len = document.form1.gender.length
	for (i = 0; i <len; i++) 
	{
		if (document.form1.gender[i].checked)
		{
			chosen = document.form1.gender[i].value
		}
	}
	if (chosen == "") 
	{
		alert("Enter your sex");
		return false;
	}
	var blood=document.getElementById("blood").value;
    if(blood=="")
        {
            alert("Enter your blood group");
            document.getElementById("blood").focus();
            return false;
        }
	var religion=document.getElementById("religion").value;
    if(religion=="")
        {
            alert("Enter your religion");
            document.getElementById("religion").focus();
            return false;
        }
	var caste=document.getElementById("caste").value;
    if(caste=="")
        {
            alert("Enter Your Caste");
            document.getElementById("caste").focus();
            return false;
        }
	var mobile=document.getElementById("mobile").value;
    if(mobile=="")
        {
            alert("Enter Your Mobile number");
            document.getElementById("mobile").focus();
            return false;
        }
        var l=mobile.length;
        if(l<10 || l>10)
        {
            alert("Enter your 10 digit Mobile Number ");
            document.getElementById("mobile").focus();
            return false;
        }
	 var email=document.getElementById("email").value;
    if(email=="")
        {
            alert("Enter E-mail ID");
            document.getElementById("email").focus();
            return false;
        }
        
        var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) 
    {
    alert('Please provide a valid email address');
    email.focus;
    return false;
	}
	var name_guard=document.getElementById("name_guard").value;
    if(name_guard=="")
        {
            alert("Enter name of Guardian");
            document.getElementById("name_guard").focus();
            return false;
        }
		if (!name_guard.match(/^[a-zA-Z. ]+$/)) 
    	{
        alert('Only alphabets and dot allowed');
        return false;
   		 }
	var relation=document.getElementById("relation").value;
    if(relation=="")
        {
            alert("Enter relation");
            document.getElementById("relation").focus();
            return false;
        }
	var occupation=document.getElementById("occupation").value;
    if(occupation=="")
        {
            alert("Enter occupation");
            document.getElementById("occupation").focus();
            return false;
        }
	var income=document.getElementById("income").value;
    if(income=="")
        {
            alert("Enter income");
            document.getElementById("income").focus();
            return false;
        }  
		 if (!income.match(/^[1-90]+$/)) 
    	{
        alert('Only numbers are allowed');
        return false;
   		 }
		
    var address=document.getElementById("address").value;
    if(address=="")
        {
            alert("Enter Your Address");
            document.getElementById("address").focus();
            return false;
        }
    var phone=document.getElementById("phone").value;
    if(phone=="")
        {
            alert("Enter Your Phone number");
            document.getElementById("phone").focus();
            return false;
        }
 return true;
}
</script>
 <meta charset="utf-8">
<div class="boxHead" style="padding-top:1.5%; height:auto;">ADMISSION
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link href="css/list.css" rel="stylesheet" />
<!--<link href="css/styles.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#religion" ).autocomplete({
      source: 'religion.php'
    });
  });
   $(function() {
    $( "#caste" ).autocomplete({
      source: 'caste.php'
    });
  });
  </script>

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
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" class="sear_frm" >

<?php
include "dboperation.php";
$cid="";
$cat="";
$tp_no="";
$acc="";
$todays_date=date('d-m-y');
$obj6=new dboperation();
	// $query6="SELECT MAX(temp_no) FROM temp where dob = '$db' ";	
	$query6="SELECT * FROM temp ORDER BY temp_no DESC LIMIT 1";
	$result6=$obj6->selectdata($query6);
	$row=$obj6->fetch($result6);
	$t_no=$row[0];	 
	$tp_no=$t_no+1;
	
if (isset($_REQUEST['button']))
{
		$co=$_POST['course1'];
		$sp=$_POST['spec'];
		$bc=$_POST['bch'];
		$admtype=$_POST['admtype'];
		$todays_date=date('Y-m-d');
		$na=$_POST['name'];
		$db=$_POST['dob'];
		$sx=$_POST['gender'];
		$blood=$_POST['blood'];
		$rlgn=$_POST['religion'];
		$cst=$_POST['caste'];
		$mob=$_POST['mobile'];
		$mail=$_POST['email'];
		$nagd=$_POST['name_guard'];
		$rel=$_POST['relation'];
		$occpn=$_POST['occupation'];
		$inc=$_POST['income'];
		$adrs=$_POST['textarea'];
		$phno=$_POST['phone'];
		
	$file=$_FILES['file']['name'];
	$tempname=$_FILES['file']['tmp_name'];
	echo $type=$_FILES['file']['type'];
	if(($type=='image/gif')||($type=='image/jpeg')||($type=='image/bmp'))
	{
		$ran=rand();
		$file=$ran.$file;
		$tmp="upload/photo/".$file;
		move_uploaded_file($tempname,$tmp);
	}
	 $ran=rand();
	 $obj=new dboperation();
     $q="INSERT INTO `temp` (`temp_no`, `course`, `specialisation`, `batch`, `yr_adm`, `name`, `dob`, `sex`, `religion`, `caste`, `mobile`, `email`, `name_guard`, `relation`, `occupation`, `income`, `address`, `phone`, `image`, `admission_type`, `blood_group`) VALUES ('$tp_no', '$co', '$sp', '$bc', '$todays_date', '$na', '$db', '$sx', '$rlgn','$cst', '$mob', '$mail', '$nagd', '$rel', '$occpn', '$inc', '$adrs', '$phno', '$file', '$admtype', '$blood')";
     $obj->Ex_query($q);
	 
/*	$obj5=new dboperation();
	$query5="SELECT * FROM courses WHERE course = '$co' ";
	$result5=$obj5->selectdata($query5);
	$row=$obj5->fetch($result5);
	$cat=$row[2]; */
	
/*	$obj6=new dboperation();
	$query6="SELECT MAX(temp_no) FROM temp";	
	$result6=$obj6->selectdata($query6);
	$row=$obj6->fetch($result6);
	$tp_no=$row[0]; */
	
	if($co == 'Btech') 
	{
		$_SESSION['acc']=$tp_no;
		echo "<script>location.href='dashboard_student.php?menu=ug'</script>";
 	//	 echo "<script>location.href='admission_ug_student.php'</script>";
	}
	if($co == 'Barch') 
	{
		$_SESSION['acc']=$tp_no;
		echo "<script>location.href='dashboard_student.php?menu=ug'</script>";
 	//	 echo "<script>location.href='admission_ug_student.php'</script>";
	}
	if($co == 'Mtech') 
	{
		$_SESSION['acc']=$tp_no;
		echo "<script>location.href='dashboard_student.php?menu=pg'</script>";
 	//	 echo "<script>location.href='admission_pg_student.php'</script>";
	}
	else
	{
		
		$_SESSION['acc']=$tp_no;
		echo "<script>location.href='dashboard_student.php?menu=pg'</script>";
	//	echo "<script>location.href='admission_pg_student.php'</script>";
	}
}
?>


  <div align="center">
	<h4>Personal Details</h4>
    <table border="0">
      <tr>
      
       <td><label for="course">Course</label> </td>
<td>       
<?php
$obj1=new dboperation();
echo '<select name="course1" id="course1" onchange="getcourse()">';
echo "<option value=''>---Select Course---</option>";
   	
$order = "SELECT distinct course FROM courses ";	
$result=$obj1->selectdata($order);					
while($f=$obj1->fetch($result))
{
		if(isset($_POST['course1']))
		 {
			 echo '<option ';
			 if($_REQUEST['course1']==$f['course'])
			 echo 'selected = "selected" ';
			 echo " value='$f[0]' >".$f[0]."</option>";
			 
					
		 }
		else
		{
					echo "<option id='' value=".$f[0].">".$f[0]."</option>";
		}
		
		 
}
		 
      echo '</select>';
	  
	   if(isset($_POST['course1']))
		 {
		 	$co=$_POST['course1'];
		 
		 }
		 else
		 {
		 }
	  ?>
      
        </td>
         <td><label for="spec">Branch</label> </td>
      
      <td>
<?php
$obj8=new dboperation();
	$query8="SELECT * FROM courses WHERE course = '$co' ";
	$result8=$obj8->selectdata($query8);
	$row=$obj8->fetch($result8);
	$id=$row[0];
     
echo '<select name="spec" id="spec" onchange="getspec()">';
echo "<option value=''>---Select Specialization---</option>";
   
   $obj9=new dboperation();
	$query9="SELECT * FROM course_specialization WHERE course_id= '$id' ";
	$result9=$obj9->selectdata($query9);
	while($row=$obj9->fetch($result9))
	{
$obj2=new dboperation();  	
$order2 = "SELECT specialisation FROM specialization WHERE spec_id = '$row[2]' ";	
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
	  
	   if(isset($_POST['spec']))
		 {
		 	$sp=$_POST['spec'];
		 
		 }
		 else
		 {
		 } 
	  ?>
      
      </td>
      
           <td><label for="bch">Batch</label> </td>
<td>    
<?php   
	$obj3=new dboperation();
	$query3="SELECT course_spec_id FROM course_specialization WHERE course_id = '$id' and spec_id = (SELECT  spec_id FROM specialization WHERE specialisation = '$sp') ";
	$result3=$obj3->selectdata($query3);
	$row=$obj3->fetch($result3);
	$sp_id=$row[0];
	?>
          <select name="bch" id="bch">
          <option value="">--Select Batch--</option>
 <?php   
 $obj4=new dboperation();
	$query4="SELECT * FROM batch WHERE course_spec_id = '$sp_id' ";	
	$result4=$obj4->selectdata($query4);
	while($row=$obj4->fetch($result4))
	{
	?>
                        <option><?php echo "$row[1]"; ?></option>
                        <?php
							}
							?>
          </select>
        
        </td> 
          
      </tr>
        </table>
    <br/>
    <table border="0" bordercolorlight="#C136F5" bgcolor="#B8D8E4">
     <tr>
   <td><label for="admtype">Admission Type</label> </td>
 <td> <input type="radio" name="admtype" value="Normal"> Normal
  <input type="radio" name="admtype" value="Lateral"> Lateral
  <input type="radio" name="admtype" value="Transfer"> Transfer
        </td>
        <td><label for="yr_adm">Date Of Admission</label></td>
        <?php   echo "<td> <input type='text' readonly='readonly' value='".$todays_date."'/></td>" ?>
      </tr>
      <tr>
      <td><label for="name">Name of Candidate</label> <span class="mand">*</span></td>
        <td><input type="text" name="name" id="name"  value="" required="required"  /></td>
      <td><label for="dob">Data of Birth</label></td>
        <td><input type="date" name="dob" id="dob"  value=""  required="required" /></td>
      </tr>
      <tr>
         <td><label for="sex">Sex</label> </td>
 <td> <input type="radio" name="gender" value="M"> Male
  <input type="radio" name="gender" value="F"> Female
  <input type="radio" name="gender" value="O"> Other
        </td>
        <td><label for="blood">Blood Group</label>
        </td>
        <td><select name="blood" id="blood">
            <option value="">--Choose Group--</option>
				<?php   
 					$obj9=new dboperation();
					$query9="SELECT * FROM blood_group";	
					$result9=$obj9->selectdata($query9);
					while($row=$obj9->fetch($result9))
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
        <td><input type="text" id="religion" name="religion"></td>
        <td><label for="caste">Caste</label></td>
        <td><input type="text" name="caste" id="caste" /></td>
      </tr>
      <tr>
        <td><label for="mobile">Mobile No:</label></td>
        <td><input type="text" name="mobile" id="mobile" value=""/></td>
        <td><label for="email">Email</label></td>
        <td><input type="text" name="email" id="email"  value="" /></td>
      </tr>
      <tr>
        <td height="29"><label for="name_guard">Name of Guardian</label></td>
        <td>
          <input type="text" name="name_guard" id="name_guard" value=""/></td>
        <td height="29"><label for="relation">Relation with pupil</label></td>
         <td><select name="relation" id="relation">
            <option value="">--Choose Relation--</option>
            <option value="Father" >Father</option>
			<option value="Mother" >Mother</option>
			<option value="Grand Father" >Grand Father</option>
			<option value="Grand Mother" >Grand Mother</option>
        </select></td>
      </tr>
      <tr>
        <td height="29"><label for="occupation">Occupation Of Guardian</label></td>
        <td>
          <input type="text" name="occupation" id="occupation"  value=""/></td>
        <td height="29"><label for="income">Annual Income</label></td>
        <td>
          <input type="text" name="income" id="income"  value="" /></td>
      </tr>
      <tr>
        <td height="29"><label for="address">Address</label></td>
        <td>
          <textarea name="textarea" id="address" cols="30" rows="7" /></textarea></td>
        <td height="29"><label for="phone">Telephone No:</label></td>
        <td>
          <input type="text" name="phone" id="phone"  value="" /></td>
      </tr>
	  <tr>
	  <td><label for="image">Image</label></td>
	  <td><input type="file" name="file" id="file" value="" /><br />
      <small>[Allowed formats: .jpg, .jpeg, .png]</small></td>
	  </tr>
    </table>
   
    <table>
      <tr>
      </tr>
      <tr>
      </tr>
      <tr>
      <td colspan="2"><div align="center">
            <input type="submit" name="button" id="button" value="Submit" class="logbtn" onclick="return validate()" />
			<input type="reset" name="" id="" value="Cancel" class="logbtn" onclick="location.href='dashboard_student.php?menu=new_ad';"  />
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
