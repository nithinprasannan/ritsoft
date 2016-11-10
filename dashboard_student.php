<?php
ob_start();
session_start();
error_reporting(0);

include('header.php');
if(!(isset($_SESSION['log_user'])))
	header('Location:index.php');
?>
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
  <?php include('sidemenu_student.php')?>
  <b><b>
  <div class="box" style="width:77%;" name="common">
    
    <?php
  //menu 
  switch($_REQUEST['menu']){
	 case 'home' : include('home.php');break;
	  case 'new_ad' : include('admission_form_student.php');break;
	  case 'ug' : include('admission_ug_student.php');break;
	  case 'pg' : include('admission_pg_student.php');break;
	  case 'change_pwd' : include('changepwd.php');break;
	  case 'sem' : include('sem_reg.php');break;
	  case 'sem_veri' : include('stud_sem_verification2.php');break;
	  case 'semdetail' : include('student_details2.php');break;
	  default:  include('home.php');
  }
  //end menu
  ?>
  </div>
  </b></b></div>
<b><b>
<?php include('footer.php')?>