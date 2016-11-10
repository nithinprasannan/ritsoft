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
  <?php include('sidemenu_hod.php')?>
  <b><b>
  <div class="box" style="width:77%;" name="common">
    
    <?php
  //menu 
  switch($_REQUEST['menu']){
	  case 'home' : include('home.php');break;
	  case 'export' : include('hodexport.php');break;
	  case 'search' : include('search_hod.php');break;
	  case 'viewstud' : include('viewstud.php');break;
	  case 'sms' : include('sms.php');break;
	  case 'class_sms' : include('class_sms.php');break;
	  case 'success' : include('success.php');break;
	  case 'notsuccess' : include('notsuccess.php');break;
	  case 'sadvsr' : include('sadvsr.php');break;
	  case 'nadvsr' : include('nadvsr.php');break;
	  case 'stud_sms' : include('stud_sms.php');break;
	  case 'add_advsr' : include('addadvsr.php');break;
	  case 'view_advsr' : include('viewadvsr.php');break;
	  case 'studlist' : include('studlist.php');break;
	  case 'hodexportall' : include('hodexportall.php');break;
	  case 'hodexportbatch' : include('hodexportbatch.php');break;
	  case 'hodexportselectbatch' : include('hodexportselectbatch.php');break;
	  case 'studcertificate' : include('stud_certificate_hod.php');break;
	  case 'studc' : include('studc.php');break;
	  case 'p3' : include('p3.php');break;
	  case 'change_pwd' : include('changepwd.php');break;
	  case 'viewsemreg' : include('view_reg_application2.php');break;
	  case 'semregaprove' : include('updating.php');break;
	  case 'aprovelist' : include('approved_list_tbl.php');break;
	   
	   
	  default:  include('home.php');
	  
  }
  //end menu
  ?>
  </div>
  </b></b></div>
<b><b>
<?php include('footer.php')?>