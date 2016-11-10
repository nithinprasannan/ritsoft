<div class="boxHead" style="padding-top:1.5%; height:auto;">SEM REGISTRATION
</div>
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

<html>
<head>
<body>

<form name="form1" method="post" enctype="multipart/form-data" class="sear_frm">
 <p>&nbsp;</p>
  <p>&nbsp;</p>
  
  <div align="center">
    <table width="499" height="178" border="0" bordercolorlight="#C136F5" bgcolor="#B8D8E4">
    <tr >
      <th height="66" scope="row"><table width="499" height="178" border="0">
        <tr >
          <th height="66" scope="row"><table width="499" height="178" border="0">
            <tr>
              <td><label> </label>
                <div align="left"><label>Admission Number </label></div></td>
              <td><input name="adm" type="text" required id="name"></td>
            </tr>
            <tr>
              <td><div align="left"><label>Date Of Birth</label></div></td>
              <td><input type="text" name="date" id="date" placeholder="dd-mm-yyyy"></td>
            </tr>
            <tr>
              <td colspan="2"><div align="left"></div>
                <div align="center">
                  <input type="submit" name="submit" id="submit" value="Submit" onClick=" return check(form1);" class="logbtn">
                </div></td>
            </tr>
            
          </table></th>
        </tr>
      </table></th>
    </tr>
    </table>
  </div>
 
   <p>&nbsp;</p>
  
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <?php
 
  include('try1.php');
  if(isset($_POST['submit'])){
	  $adm=$_POST['adm'];
	  $db=$_POST['date'];
	   $db= date("Y-m-d", strtotime($db) );
	//  $db=date("d-m-Y",strtotime($db));
  $query="select * from stud where adm_no='$adm' and dob='$db'";
 $result=mysql_query($query);
 $num=mysql_num_rows($result);
 echo $db;
 echo $adm;
 if(0<$num)
 {
	  session_start();
	  $_SESSION['adm']=$adm;
	 echo "<script>location.href='dashboard_student.php?menu=sem_veri'</script>";
 }
 else
 {
	// echo $num;
	 
	 echo "<script language='JavaScript' type='text/JavaScript'>
alert('Please Enter Valid Details');
</script>
";
	 
 }
  }
  ?>

</form>