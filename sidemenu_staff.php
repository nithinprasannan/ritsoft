<?php
ob_start();
session_start();
error_reporting(0);
?> 
<div class="box" style="float:left;height:auto;">
<div class="boxHead" style="height:auto;">DASH BOARD</div>
<div class="boxBody" style="margin-top:-8.6%;padding:5%;">
    <div style="width:100%;height:100%;">
      <div id="navigation" style="width:%;height:100%;background:transparent;">
      <br>
      <br>
      </br>
       <br>
      </br>
      </br>
        <ul style="width:100%;margin-left:0px !important;padding:0px !important;background:transparent !important;border:none !important;">
        
          <li class="subMenu" id="h1"><a href="dashboard_staff.php?home" <?php echo ($_REQUEST['menu'] =='home')?' style="font-weight:bold;"' : ''?>>Home</a></li>
         <li class="subMenu" id="h5"><a href="dashboard_staff.php?menu=stud_veri" <?php echo ($_REQUEST['menu'] =='stud_veri')?' style="font-weight:bold;"' : ''?>>Student Verification</a></li>
		 
          <li class="subMenu" id="h5"><a href="dashboard_staff.php?menu=tc_gen" <?php echo ($_REQUEST['menu'] =='tc_gen')?' style="font-weight:bold;"' : ''?>>Transfer Certificate</a></li>
		  
          <li class="subMenu" id="h5"><a href="dashboard_staff.php?menu=cc_gen" <?php echo ($_REQUEST['menu'] =='cc_gen')?' style="font-weight:bold;"' : ''?>>Conduct Certificate</a></li>
		  		  
		  <li class="subMenu" id="h5"><a href="dashboard_staff.php?menu=search" <?php echo ($_REQUEST['menu'] =='search')?' style="font-weight:bold;"' : ''?>>Search Student</a></li>
		  
          <li class="subMenu" id="h5"><a href="dashboard_staff.php?menu=pglist" <?php echo ($_REQUEST['menu'] =='pglist')?' style="font-weight:bold;"' : ''?>>PG Student List</a></li>
		  <li class="subMenu" id="h5"><a href="dashboard_staff.php?menu=uglist" <?php echo ($_REQUEST['menu'] =='uglist')?' style="font-weight:bold;"' : ''?>>UG Student List</a></li>
		  
		  <li class="subMenu" id="h5"><a href="dashboard_staff.php?menu=change_pwd" <?php echo ($_REQUEST['menu'] =='change_pwd')?' style="font-weight:bold;"' : ''?>>Change Password</a></li>

          <li class="subMenu" id="h15"><a href="logout.php">Log Out</a></li>
          
          <div style="margin-left:0%;font-weight:bold;color:rgb(10,10,10);">
       
</div>
          <br>
           <br>
      <br>
      </br>
      </br>
        </ul>
      </div>
    </div>
  </div>
</div>