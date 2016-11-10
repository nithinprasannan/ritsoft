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
	  include("connect1.php");
		//  $obj = new dboperation();
		//  $objz = new dboperation();
		  ?>
<br>
<br>
<table id="myTable" bordercolorlight="#C136F5" bgcolor="#B8D8E4">
<thead>
								<th>Adm No</th>
						  		<th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
								   <th>Course</th>
                               <th>Specialization</th>
								   <th>Batch</th>
									
                                    
								   </thead>
                                    
                                   <?php

	


	ob_start();
session_start();


	$us=$_SESSION['log_user'];
	
	$sql="select id from department where hod='$us'";
	$re=mysqli_query($conn,$sql);
	while($r=mysqli_fetch_array($re))
{
	$dep=$r['id'];
	//echo "ndmsndm".$dep;
	$s="select course_id,spec_id from dept_course where dept_id=$dep";
	$res=mysqli_query($conn,$s);
while($r=mysqli_fetch_array($res))
{
	$cid=$r['course_id'];
	$sid=$r['spec_id'];
	$cn="select course from courses where id=$cid";
	$ecn=mysqli_query($conn,$cn);
	while($r=mysqli_fetch_array($ecn))
	{
		$cnn=$r['course'];
	}
	$sn="select specialisation from specialization  where spec_id=$sid";
	$esn=mysqli_query($conn,$sn);
	while($r=mysqli_fetch_array($esn))
	{
		$snn=$r['specialisation'];
	}
	
	$csid="select course_spec_id from course_specialization where course_id=$cid and spec_id=$sid";
	$a=mysqli_query($conn,$csid);
	while($r=mysqli_fetch_array($a))
	{
		$b=$r['course_spec_id'];
		$c="select batch_id,year_batch from batch where course_spec_id=$b";
		$d=mysqli_query($conn,$c);
		while($r=mysqli_fetch_array($d))
		{
			$bid=$r['batch_id'];
			$yb=$r['year_batch'];
			//echo $yb;
			$e="select adm_no from stud_batch_rel where batch_id=$bid";
			//echo "bid".$bid;
			$ee=mysqli_query($conn,$e);
			while($r=mysqli_fetch_array($ee))
			{
				$adm=$r['adm_no'];
				//echo "dkjdkjk".$adm;
				$f="select name,mobile,email from stud where adm_no='$adm'";
				$ef=mysqli_query($conn,$f);
				while($r=mysqli_fetch_array($ef))
				{
					?>
                    <tr height="45">
                    <td><center><?php echo $adm;?></center></td>
                    <td><center><?php echo $r['name'];?></center></td>
                    <td><center><?php echo $r['mobile'];?></center></td>
                    <td><center><?php echo $r['email'];?></center></td>
                    <td><center><?php echo $cnn;?></center></td>
                    <td><center><?php echo $snn;?></center></td>
                    <td><center><?php echo $yb;?></center></td>
                    </tr>
                    <?php
					
				}
			}
		}
	}
	}
	
}
?>
								                                     </table>
</body>
</html>
