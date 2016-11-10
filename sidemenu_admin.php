<?php
ob_start();
session_start();
error_reporting(0);
/*include("dboperation.php");
$obj=new dboperation();
$query1="select * from login where username =  '".$_SESSION['log_user']."'"; 
$result1=$obj->selectdata($query1);
$row1=$obj->fetch($result1);
$_SESSION['role'] = $row1['role']; */
?> 
<div class="box" style="float:left;height:auto;">
<div class="boxHead" style="height:auto;">DASH BOARD</div>
<div class="boxBody" style="margin-top:-8.6%;padding:5%;">
    <div style="width:100%;height:100%;">
      <div id="navigation" style="width:%;height:100%;background:transparent;">
      <br>
      <br>
      </br>
      </br>
        <ul style="width:100%;margin-left:0px !important;padding:0px !important;background:transparent !important;border:none !important;">
          <li class="subMenu" id="h1"><a href="dashboard_admin.php?home" <?php echo ($_REQUEST['menu'] =='home')?' style="font-weight:bold;"' : ''?>>Home</a></li>
		  <li class="subMenu" id="h5"><a href="dashboard_admin.php?menu=adduser" <?php echo ($_REQUEST['menu'] =='adduser')?' style="font-weight:bold;"' : ''?>>Add User</a></li>

<li class="subMenu" id="h5"><a href="dashboard_admin.php?menu=change_pwd" <?php echo ($_REQUEST['menu'] =='change_pwd')?' style="font-weight:bold;"' : ''?>>Change Password</a></li>

          <li class="subMenu" id="h15"><a href="logout.php">Log Out</a></li>
         
          <div style="margin-left:0%;font-weight:bold;color:rgb(10,10,10);">
       
</div>
          <br>
           <br>
      <br>
      </br>
      </br>
	   <br>
      </br>
	   <br>
      </br>
	 
        </ul>
      </div>
    </div>
  </div>
</div>