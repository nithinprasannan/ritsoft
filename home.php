<?php
ob_start();
session_start();
error_reporting(0);
if(!(isset($_SESSION['log_user'])))
	header('Location:index.php');
?>
<div class="boxHead" style="padding-top:1.5%; height:auto;">HOME</div>

<style>
form [type=input]{ width: 160px;height: 28px;}
form select{ width: 172px;height: 28px;}
</style>
<form id="form1" name="form1" method="post" action="" class="sear_form">
 <div align="center" style="background-color:#B8D8E4">
    <table width="319" border="0" align="center" height="402">
      <tr>
        <td></td>
      </tr>
      <tr>
       <td align="center" height="100px"><?php echo"<b><font face='Algerian'>Welcome ".$_SESSION['log_user'];?></td>
      </tr>
      <tr>
        <td></td>
       
      </tr>
       <tr>
        <td></td>
       
      </tr>
       
    </table>
  </div>
</form>
