<?php
ob_start();
session_start();
error_reporting(0);
$tp_no = $_SESSION['acc'];
?>
<style>
form input[type=text],form input[type=date],textarea,form  input[type=password],form select{     width: 210px;   height: 35px;    text-align: center; vertical-align:middle;} 
</style>
<div class="boxHead" style="padding-top:1.5%; height:auto;">ADMISSION
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link href="css/list.css" rel="stylesheet" />
<!--<link href="css/styles.css" rel="stylesheet" /> -->

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
<form id="form1" name="form1" method="post" action="#" enctype="multipart/form-data" class="sear_frm">

<?php
include "dboperation.php";
if (isset($_REQUEST['button']))
{
		$csem=$_POST['cur_sem'];
		$rlno=$_POST['roll_num'];
		$rnk=$_POST['rank_no'];
		$qta=$_POST['quota'];
		$scl1=$_POST['school_1'];
		$rgno1=$_POST['reg_no_yr_1'];
		$brd1=$_POST['board_1'];
		$scl2=$_POST['school_2'];
		$rgno2=$_POST['reg_no_yr_2'];
		$brd2=$_POST['board_2'];
		$chnc=$_POST['no_chance'];
		$nalast=$_POST['name_last'];
		$tot=$_POST['total'];
		$phy=$_POST['physics'];
		$chem=$_POST['chemistry'];
		$math=$_POST['maths'];
		
   $obj=new dboperation();

 $q="UPDATE temp SET cur_sem = '$csem', roll_no = '$rlno', rank = '$rnk', quota = '$qta', school_1 = '$scl1', reg_no_yr_1 = '$rgno1', board_1 = '$brd1', school_2 = '$scl2', reg_no_yr_2 = '$rgno2', board_2 = '$brd2', no_chance = '$chnc', name_last = '$nalast', total = '$tot', physics = '$phy', chemistry = '$chem', maths = '$math' WHERE temp_no = '$tp_no' ";
  
    $obj->Ex_query($q);
 
  		$_SESSION['acc']=$tp_no;
 		 echo "<script>location.href='pdf_ad.php'</script>";
}

?>

  <div align="center">
	<h4>Academic Details</h4>
   <table border="0" width="800" bordercolorlight="#C136F5" bgcolor="#B8D8E4">
    <tr>
        <td><label for="cur_sem">Current Sem</label></td>
        <td> <select name="cur_sem" id="cur_sem">
          <option>--Choose Semester--</option>
         
<?php 

	/* $obj3=new dboperation();
	$query3="SELECT * FROM temp WHERE temp_no = '$tp_no' ";	
	$result3=$obj3->selectdata($query3);
	$row=$obj3->fetch($result3);
	$co=$row[1]; */

	$obj4=new dboperation();
	// $query4="SELECT * FROM sem WHERE sem_id <=(SELECT no_of_semesters FROM courses WHERE course= '$co') ";
	$query4="SELECT * FROM sem1 ";		
	$result4=$obj4->selectdata($query4);
	while($row=$obj4->fetch($result4))
	{
	?>
                        <option><?php echo "$row[1]"; ?></option>
                        <?php
							}
							?>


          </select></td>

        <td><label for="roll_no">Entrance roll No:</label></td>
        <td><input type="text" name="roll_num" id="roll_num"  value="" /></td></tr>
        <tr>
        <td><label for="rank_no">Entrance Rank</label></td>
        <td><input type="text" name="rank_no" id="rank_no"  value="" /></td>
        <td><label for="quota">Quota</label></td>
        <td><input type="text" name="quota" id="quota"  value="" /></td>
      </tr>
      <tr>
        <td><label for="school_1">Name of Institution studied at </br> SSLC or equivalent</label></td>
        <td><input type="text" name="school_1" id="school_1"  value="" /></td>
        <td><label for="reg_no_yr_1"> Register No & year of passing</label></td>
        <td><input type="text" name="reg_no_yr_1" id="reg_no_yr_1"  value=""  /></td></tr>
           <tr>
         <td> <label for="board_1">Name of Board/University</label></td>
        <td><input type="text" name="board_1" id="board_1"  value="" /></td>  <td></td><td></td>
      </tr>
      <tr>
        <td><label for="school_2">Name of Instition from </br> qualifying exam passed</label></td>
        <td> <input type="text" name="school_2" id="school_2"  value="" /></td>
     
        <td> <label for="reg_no_yr_2">Register No & year of passing</label></td>
        <td><input type="text" name="reg_no_yr_2" id="reg_no_yr_2"  value=""  /></td></tr>
          <tr> <td> <label for="board_2">Name of Board/University</label></td>
        <td> <input type="text" name="board_2" id="board_2"  value="" /></td> <td></td><td></td>
      </tr>
      <tr>
      <td><label for="name_last">Name of Institution last studied</label></td>
        <td><input type="text" name="name_last" id="name_last"  value="" /></td>
      <td><label for="no_chance">No of chances taken </br>for qualifying exam passed</label></td>
        <td> <input type="text" name="no_chance" id="no_chance"  value="" /></td></tr>
       <tr>    
      <td><label for="total">Total marks obtained in qualifying exam </label></td>
        <td>
         <input type="text" name="total" id="total"  value="" /></td><td></td><td></td>
      </tr>
      <tr>
      <td><label for="physics"><strong>Marks obtained : </strong> Physics</label></td>
        <td> <input type="text" name="physics" id="physics"  value="" /></td>
      
        <td><label for="chemistry">Chemistry</label></td>
        <td><input type="text" name="chemistry" id="chemistry"  value="" /></td></tr>
        <tr>
      
        <td><label for="maths">Maths</label></td>
        <td>
          <input type="text" name="maths" id="maths"  value="" /></td><td></td><td></td>
      </tr>
    </table>
   
    <table>
      <tr>
      </tr>
      <tr>
      </tr>
      <tr>
      <td colspan="2"><div align="center">
            <input type="submit" name="button" id="button" value="Save" class="logbtn" />
			<input type="reset" name="" id="" value="Cancel" class="logbtn" onclick="location.href='dashboard_student.php?menu=new_ad';" />
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