<?php
ob_start();
session_start();
error_reporting(0);
?>
<div class="boxHead" style="padding-top:1.5%; height:auto;">APPLICANT LIST</div>

<link href="bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet">

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="bower_components/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
      $('#myTable').DataTable();
      $(document).ready(function() {
        var table = $('#example').DataTable({
          "columnDefs": [
          { "visible": false, "targets": 2 }
          ],
          "order": [[ 2, 'asc' ]],
          "displayLength": 25,
          "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
              if ( last !== group ) {
                $(rows).eq( i ).before(
                  '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                  );

                last = group;
              }
            } );
          }
        } );

    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
      var currentOrder = table.order()[0];
      if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
        table.order( [ 2, 'desc' ] ).draw();
      }
      else {
        table.order( [ 2, 'asc' ] ).draw();
      }
    } );
  } );
    });
  </script>
  <script language="javascript">
function CheckAll(chk)
{
	for(i=0;i<chk.length;i++)
	chk[i].checked=true;
}
function UncheckAll(chk)
{
	for(i=0;i<chk.length;i++)
	chk[i].checked=false;
}

</script>
  <body>
  <form id="form1" name="frmUser" method="post" action="#" enctype="multipart/form-data" class="sear_frm">
   <?php
	  include("try1.php");
		  ?>
<br>
<br>
<table width="300">
<tr>
        <td colspan="5"><p>
          <input type="button" name="button" id="button" value="SELECT ALL"  onClick="CheckAll(document.frmUser.select)">
          <input type="button" name="button2" id="button2" value="UNCHECK ALL" onClick="UncheckAll(document.frmUser.select)">
          <input type="submit" name="submit" id="submit" value="APPROVE" ></p></td></tr></table>
		  
          <table id="myTable" bordercolorlight="#C136F5" bgcolor="#B8D8E4" width="20px">
<thead>
								
								<td></td>
        <td>NAME</td>
        <td>ADMISSION NUMBER</td>
        <td>COURSE</td>
        <TD>BRANCH</TD>
        <td>BATCH</td>
        <TD>APPLICATION STATUS</TD>
        <TD>APPLIED DATE</TD>
        <td>PREVIOUS SEMESTER</td>
        <TD>NEXT SEMESTER</TD>
                                    
								   </thead>
 <?php
 $sem=$_SESSION['sem'];
$course=$_SESSION['course'];

	$branch=$_SESSION['branch'];   
	$batch=$_SESSION['batch'];
$conn = mysql_connect("localhost","root","");
mysql_select_db("ritsoft",$conn);
$result = mysql_query("select  * from stud_sem_registration sr where sr.batch_id=(select batch_id from batch where course_spec_id=(select course_spec_id from course_specialization where spec_id=(select spec_id from specialization where specialisation='$branch') and course_id=(select id from courses where course='$course')) and year_batch=$batch) and sr.new_sem='$sem'");

while($row = mysql_fetch_array($result)) {
	
$sql2 ="select name from stud where adm_no='$row[adm_no]'";
	$result2=mysql_query($sql2);
	while($db_field=mysql_fetch_assoc($result2))
	{ 
	$name=$db_field['name'];
	//echo $name;
	
	?>


                                    
                                  
                  <tr>
                   <td><input type="checkbox" name="users[]" id="select" value="<?php echo $row["adm_no"]; ?>"></td>
        <td><center><?php echo $name; ?></center></td>
        <td><?php echo $row["adm_no"]; ?></td>
        <td><center><?php echo $course; ?></center></td>
        <td><center><?php echo $branch; ?></center></td>
        <td><center><?php echo $batch; ?></center></td>
        <td><center><?php echo $row["apl_status"]; ?></center></td>
        <td><center><?php echo $row["apl_date"]; ?></center></td>
        <td><center><?php echo $row["previous_sem"]; ?></center></td>
        <td><center><?php echo $row["new_sem"]; $csem=$row["new_sem"];  ?></center></td>
                   </tr>
                   
	<?php }} ?>			
    
          <?php

if(isset($_POST['submit']))
{
	
	if(!empty($_POST['users']))
	{
	
	$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) {
	$val[$i]=$_POST['users'][$i];
	//echo $val[$i];
	
mysql_query("update stud_sem_registration set apv_status='Approved'  where adm_no='" . $_POST["users"][$i] . "'");
mysql_query("update stud_sem_registration set apv_date=NOW()  where adm_no='" . $_POST["users"][$i] . "'");
$check="select * from ug where admno='" . $_POST["users"][$i] . "'";
$re=mysql_query($check);
$num=mysql_num_rows($re);

if($num>0)
{
	

mysql_query("update ug set cur_sem='$csem'  where admno='" . $_POST["users"][$i] . "'");

}

$check="select * from pg where admno='" . $_POST["users"][$i] . "'";
$re=mysql_query($check);
$num=mysql_num_rows($re);

if($num>0)
{
	

mysql_query("update pg set cur_sem='$csem'  where admno='" . $_POST["users"][$i] . "'");

}

}
 echo "<script language='JavaScript' type='text/JavaScript'>alert('Approved Sucessfully');</script>";	
 
 
	}
}

?>
                                  
								                                     </table>
                                                                     </form>
                                                                     
                                                                    
</body>

</html>
