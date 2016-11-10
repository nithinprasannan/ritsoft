<div class="boxHead" style="padding-top:1.5%; height:auto;">Staff Advisors</div>

<link href="bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet">
<!--<link href="css/style1.css" rel="stylesheet"> -->
<script>

function areyousure()
{
	var ret = confirm('Are you sure you want to delete this data ?');
	return ret;
}
</script>
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
  <body>
  
   <?php
	  include('connect1.php');
ob_start();
session_start();
$chk=$_SESSION['log_user'];
		//  $obj = new dboperation();
		//  $objz = new dboperation();
		  ?>
<br>
<br>
<table id="myTable" bordercolorlight="#C136F5" bgcolor="#B8D8E4">
<thead>
								<th>Staff Name</th>
						  		<th>Course</th>
                                <th>Specialization</th>
                                <th>Batch</th>
								   <th>Action</th>
                               
									
                                    
								   </thead>
                                    
                                   <?php

	


	$sql="select staff_id,batch_id from staffadvisor where staff_id in(select staff_id from staff_dep where dept_id in(select id from department where hod='$chk'))";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$sid=$row['staff_id'];
		$bid=$row['batch_id'];
			$sql2="select name from staff_detail where staff_id='$sid'";
			$result2=mysqli_query($conn,$sql2);
			while($row2=mysqli_fetch_array($result2))
			{
				$name=$row2['name'];
			}
			$sql3="select course_spec_id,year_batch from batch where batch_id=$bid";
			$result3=mysqli_query($conn,$sql3);
			while($row3=mysqli_fetch_array($result3))
			{
				$adn=$row3['year_batch'];
				$cid=$row3['course_spec_id'];
				$sql4="select course_id,spec_id from course_specialization where course_spec_id='$cid'";
			$result4=mysqli_query($conn,$sql4);
					while($row4=mysqli_fetch_array($result4))
					{
					$cid=$row4['course_id'];
					$sp=$row4['spec_id'];
					$sql5="select course from courses where id='$cid'";
			$result4=mysqli_query($conn,$sql5);
					while($row4=mysqli_fetch_array($result4))
					{
					$cname=$row4['course'];
					
					}
					$sql6="select specialisation from specialization  where spec_id='$sp'";
			$result6=mysqli_query($conn,$sql6);
					while($row4=mysqli_fetch_array($result6))
					{
					$spec=$row4['specialisation'];
										}
					}
			
			}
			?>
            <tr height="45">
                    <td><center><?php echo $name;?></center></td>
                    <td><center><?php echo $cname;?></center></td>
                    <td><center><?php echo $spec;?></center></td>
                    <td><center><?php echo $adn;?></center></td>
                    <td><a href="deletest.php?id=<?php echo $sid;?>&batch=<?php echo $bid ?>"onclick="return areyousure()" >Delete</a> </td>
                    </tr>
	<?php }
    
?>
								                                     </table>
</body>
</html>
