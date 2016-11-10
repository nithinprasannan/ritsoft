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
  <?php include('sidemenu_principal.php')?>
  <b><b>
  <div class="box" style="width:77%;" name="common">
    
    <?php
  //menu 
  switch($_REQUEST['menu']){
	 case 'home' : include('home.php');break;
	 case 'search' : include('search_principal.php');break;
	 case 'viewstud' : include('viewstud.php');break;
	 case 'export' : include('nexport.php');break;
	 case 'nexportselect' : include('nexportselect.php');break;
	 case 'studcertificate' : include('stud_certificate_principal.php');break;
	 case 'studc' : include('studc.php');break;
	 case 'p3' : include('p3.php');break;
	 case 'change_pwd' : include('changepwd.php');break;
	 default:  include('home.php');
	  
  }
  //end menu
  ?>
  </div>
  </b></b></div>
<b><b>
<?php include('footer.php')?>