

<?php include('header.php')?>

 <div>
  
  <div id="page" style="height:50%;">
  
  <div class="box" style="width:100%;height:100%;" name="common">
  

<form id="form1" name="form1" method="post" action="login.php" id="logform">
<!-- <form action="login_action.php" method="post"> -->
  <table width="" border="0" align="center" cellspacing="15">
    <div class="boxHead" style="padding-top:1.5%;">Login Here</div>
    <tr>
    <td colspan="2" align="center"><br /><br /></td>
    </tr>
    <tr>
     <td><strong><label for="textfield">Username</label></strong></td>
      <td>
      <input type="text" class="form_control logtxt" placeholder="Username" name="username" id="username" required="required" /></td>
    </tr>
    <tr>
      <td><strong><label for="textfield2">Password</label></strong></td>
      <td>
      <input type="password" class="form_control logtxt" placeholder="Password" name="password" id="password" required="required" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="button" class="button logbtn" id="button" value="Login" />
      
      <br />
    
      </td>
    </tr>
  </table>
</form>
</div>
</div>
  
  </b></b></div>
<b><b>
 <br><br>
  <?php include('footer.php')?>