<div class="boxHead" style="padding-top:1.5%; height:auto;">Student List</div>

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
  <body>
  
   <?php
   $one=0;
	  include("connect1.php");
		//  $obj = new dboperation();
		//  $objz = new dboperation();
		  ?>
<br>
<br>
<table id="myTable" bordercolorlight="#C136F5" bgcolor="#B8D8E4">
<thead>
								<th>SL.NO</th>
						  		
								   <th>COURSE</th>
                               <th>SPECIALIZATION</th>
								   <th>YEAR</th>
									
                                    
								   </thead>
                                    
                                   <?php

	


	$a="select * from batch";
	$ra=mysqli_query($conn,$a);
	while($row=mysqli_fetch_array($ra))
	{
		//$one=$row['batch_id'];
		
		$two=$row['course_spec_id'];
		
		$three=$row['year_batch'];
		$b="select course_id,spec_id from course_specialization where course_spec_id=$two";
		$rb=mysqli_query($conn,$b);
	while($row=mysqli_fetch_array($rb))
	{
		$on=$row['course_id'];
		$tw=$row['spec_id'];
		$c="select course,category from courses where id=$on and category='ug'";
		$rc=mysqli_query($conn,$c);
		while($row=mysqli_fetch_array($rc))
		{
			$cc=$row['course'];
			$cat=$row['category'];
		if($cat=='ug')
		{
			$one=$one+1;
		$d="select specialisation from specialization where spec_id=$tw";
		$rd=mysqli_query($conn,$d);
		while($row=mysqli_fetch_array($rd))
		{
			$sc=$row['specialisation'];
			
		}
		}
		?>
        <tr>
                   <td><center><?php echo $one;?></center></td>
                   <td><center><?php echo $cc;?></center></td>
                   <td><center><?php echo $sc;?></center></td>
                   <td><center><?php echo $three;?></center></td>
                   
                   </tr>
		<?php
		}
	}
	}
?>
								                                     </table>
</body>
</html>
