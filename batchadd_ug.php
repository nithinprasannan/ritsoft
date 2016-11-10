<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Adding new batch</title>
  <!--Documented by resmi.S--> 

 <script>
function getcourse()
{
	document.getElementById('form1').submit();
}
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>

<body>

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data"  >
<div class="boxHead" style="height:5%;">Adding new  batch</div>
<div class="newbtn"><a href="dashboard_ugdean.php?menu=view_batch">VIEW ALL BATCHES</a></div>
<?php
include('connect1.php');
ob_start();
session_start();
	//selecting batchid from batch
$sql="SELECT AUTO_INCREMENT
FROM information_schema.tables
WHERE table_schema='ritsoft' and table_name = 'batch'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$id=$row["AUTO_INCREMENT"];
	}
		?>
<table width="414" ><tr>
  <td height="70">&nbsp;</td>
  <td>&nbsp;</td></tr><tr>
    <td width="189" height="52"> Batch id :</td><td height="52"><input type="text" name="id" value="<?php echo $id ?>"/></td></tr>
    <tr>
  <td height="52">Course :</td><td><?php
//dynamically select course
echo '<select name="course" id="course" onchange="getcourse()">';
echo "<option value='-1'>---Select---</option>";
if($_SESSION['log_user']=='ugdean')
{

          
    /*      echo '  <option>--Choose Course--</option>
				<option value="Btech" >Btech</option>
                <option value="Barch" >Barch</option>';  */
				 
$order = "SELECT distinct course FROM courses where category='ug'";	
$result=mysqli_query($conn,$order);					
while($f=mysqli_fetch_array($result))
{
		if(isset($_POST['course']))
		 {
			 echo '<option ';
			 if($_REQUEST['course']==$f['course'])
			 echo 'selected = "selected" ';
			 echo " value='$f[0]' >".$f[0]."</option>";
			 
					
		 }
		else
		{
					echo "<option id='' value=".$f[0].">".$f[0]."</option>";
		}
		
		 
}
		 
      echo '</select>';
	  
	   if(isset($_POST['course']))
		 {
		 	$co=$_POST['course'];
		 
		 }
		 else
		 {
		 }
}
else
{
	          
    /*      echo '  <option>--Choose Course--</option>
				<option value="Btech" >Btech</option>
                <option value="Barch" >Barch</option>';  */
				 
//$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysqli_error());			
$order = "SELECT distinct course FROM courses where category='pg' ";	
$result=mysqli_query($conn,$order);					
while($f=mysqli_fetch_array($result))
{
		if(isset($_POST['course']))
		 {
			 echo '<option ';
			 if($_REQUEST['course']==$f['course'])
			 echo 'selected = "selected" ';
			 echo " value='$f[0]' >".$f[0]."</option>";
			 
					
		 }
		else
		{
					echo "<option id='' value=".$f[0].">".$f[0]."</option>";
		}
		
		 
}
		 
      echo '</select>';
	  
	   if(isset($_POST['course']))
		 {
		 	$co=$_POST['course'];
		 
		 }
		 else
		 {
		 }

}
	  ?>&nbsp;</td></tr>
    <tr><td height="52">Specialization :</td><td><select name="spec">
    <option value="">---select---</option>
                <!--selecting specialization from course table-->
                  <?php
				  //$co=$_GET['course'];
 $sql = "SELECT id FROM courses where course='$co'";
$result = mysqli_query($conn ,$sql);
 while ($row = mysqli_fetch_array($result))
 {
$cid=$row['id'];
echo $cid;
{
	$a="select distinct spec_id from course_specialization where course_id=$cid ";
	$ra=mysqli_query($conn,$a);
	while($row=mysqli_fetch_array($ra))
	{
		$sid=$row['spec_id'];
			$sql1="select specialisation from specialization where spec_id=$sid";
			$result1=mysqli_query($conn,$sql1);
			while($f=mysqli_fetch_array($result1))
			{
		if(isset($_POST['spec']))
		 {
			 echo '<option ';
			 if($_REQUEST['spec']==$f['specialisation'])
			 echo 'selected = "selected" ';
			 echo " value='$f[0]' >".$f[0]."</option>";
			 
					
		 }
		else
		{
					echo "<option id='' value=".$f[0].">".$f[0]."</option>";
		}
	}
}
}
}




?></select>
</td></tr>
    <tr>
      <td>Year of batch :</td><td><select name='batch'>
      <option>---select ---</option>
      <option value='2010'>2010</option>
      <option value='2011'>2011</option>
      <option value='2012'>2012</option>
      <option value='2013'>2013</option>
      <option value='2014'>2014</option>
      <option value='2015'>2015</option>
      <option value='2016'>2016</option>
      <option value='2017'>2017</option>
      <option value='2018'>2018</option>
      <option value='2019'>2019</option>
      <option value='2020'>2020</option>
      <option value='2021'>2021</option>
      <option value='2022'>2022</option>
      <option value='2023'>2023</option>
      <option value='2024'>2024</option>
      <option value='2025'>2025</option>
      <option value='2026'>2026</option>
      <option value='2027'>2027</option>
      <option value='2028'>2028</option>
      <option value='2029'>2029</option>
      <option value='2030'>2030</option>
      <option value='2031'>2031</option>
      
      </tr>
    </table>
    <center><input type="submit" value="save"><input type="reset" name="" id="" value="Cancel"/></center></form>

<?php
//receiving values from form controls
include('connect1.php');
$bid=$_POST["id"];
$course=$_POST["course"];
$spec=$_POST["spec"];
$yr_ad=$_POST["batch"];
$count=0;
	$sql1="select id from courses where course='$course' ";
	$result = mysqli_query($conn ,$sql1);
	 while($row =mysqli_fetch_array($result))
	 {
	$cid=$row["id"];
	 }
	 $sql2="select spec_id from specialization where specialisation='$spec'";
	$result = mysqli_query($conn ,$sql2);
	 while($row =mysqli_fetch_array($result))
	 {
	$sid=$row["spec_id"];
	 }
	 $sql3="select course_spec_id from course_specialization where course_id=$cid and spec_id=$sid";
	$result = mysqli_query($conn ,$sql3);
	 while($row =mysqli_fetch_array($result))
	 {
	$csid=$row["course_spec_id"];
	 }
	 
	 //checking whether same batch exist or not
	$chk="select year_batch,course_spec_id from batch";
	$result= mysqli_query($conn,$chk);
	   while($row =mysqli_fetch_array($result))
	 {
        $one=$row["year_batch"];	
		$two=$row["course_spec_id"];	
	   if($one==$yr_ad& $two==$csid)
	   {
		   $count=$count+1;
		}
	 }
	if($count==0)
	{
	$sql = "INSERT INTO batch".
      "(batch_id,year_batch,course_spec_id) ".  
	  "VALUES($bid,$yr_ad,$csid)";   
   //mysql_select_db('talukdb');
   $retval = mysqli_query($conn ,$sql);
	}
	if($retval)
	{
   echo "<center><br><br>*********BATCH ADDED SUCCESSFULLY************<br><br><br></center>";
        //header('Location:dashboard.php?menu=view_batch');
   }
	mysqli_close($conn);
?>
</body>
</html>
 