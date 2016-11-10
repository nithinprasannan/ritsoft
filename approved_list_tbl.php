<?php
ob_start();
session_start();
error_reporting(0);
?>
<style>
form input[type=text],form input[type=date],textarea,form  input[type=password],form select{     width: 210px;   height: 35px;    text-align: center; vertical-align:middle;} 
</style>

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

<div class="boxHead" style="padding-top:1.5%; height:auto;">APPROVED LIST</div>

<link href="bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet">
<!--<link href="css/style1.css" rel="stylesheet"> -->

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
  <form id="form1" name="frmUser" method="post"  enctype="multipart/form-data" class="sear_frm" target="_blank">
   <?php
	  include("try1.php");
		  ?>
<br>
<br>
<table width="300">
<tr>
        <td colspan="10"><p>
          <td><input type="button" name="print" value="PRINT" onClick="setPrintAction();" /></td></tr></table>

 <table id="myTable" bordercolorlight="#C136F5" bgcolor="#B8D8E4" width="15px">
<thead>
								
								
<td>Ad. No:</td>
<td>NAME</td>
<td>COURSE</td>
<TD>BRANCH</TD>
<td>BATCH</td>
<TD>APPLICATION STATUS</TD>
<TD>APPLIED DATE</TD>
<TD>APPROVE STATUS</TD>
<TD>APPROVED DATE</TD>
<td>PREVIOUS SEM</td>
<TD>NEW SEM</TD>
                                    
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
	}
	?>

                                    
                                  
                   <tr>
                   <td><?php echo $row["adm_no"]; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $course; ?></td>
<td><?php echo $branch; ?></td>
<td><?php echo $batch; ?></td>
<td><?php echo $row["apl_status"]; ?></td>
<td><?php echo $row["apl_date"]; ?></td>
<td><?php echo $row["apv_status"]; ?></td>
<td><?php  $yr=$row["apv_date"];
if($yr!='0000-00-00')
{
$yr=date("d-m-Y",strtotime($yr));
echo $yr;
}
 ?></td>
<td><?php echo $row["previous_sem"]; ?></td>
<td><?php echo $row["new_sem"]; ?></td>
</tr>
                   </tr>
                   
	<?php } ?>			
    
         
                                  
								                                     </table>
                                                                     </form>
                                                                     
                                                                    
</body>

</html>
<script type="text/javascript">
function setPrintAction()
{
		document.frmUser.action="student_list_print.php";
		
	document.frmUser.submit();
}
</script>