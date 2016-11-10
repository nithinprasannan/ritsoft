
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>student searching</title>

</head>

<body>
<div class="boxHead" style="padding-top:1.5%; height:auto;">SEARCH STUDENTS</div>

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data"  > 
<table width="881"><tr><td width="142" height="82">Department :</td><td width="144">
<?php
include('connect1.php');
echo '<select name="dept" id="dept">';
echo "<option value=''>---select---</option>";
$order = "SELECT dept FROM department;";	
$result=mysqli_query($conn,$order);					
while($f=mysqli_fetch_array($result))
{
	
		if(isset($_POST['dept']))
		 {
			 echo '<option ';
			 if($_REQUEST['dept']==$f['dept'])
			 echo 'selected = "selected" ';
			 echo " value='$f[0]' >".$f[0]."</option>";
			 
			
		 }
		else
		{
					echo "<option id='' value=".$f[0].">".$f[0]."</option>";
					
		}
		
		 
}
		 
      echo '</select>';
	  
	   if(isset($_POST['dept']))
		 {
		 	$ndept=$_POST['dept'];
		 
		 }
		 else
		 {
			 
		 }
?></td>
</td>
<td width="82">Course :</td><td width="165">
<?php
echo"<select name='course' id='course'>";
echo "<option value=''>--All--</option>";
	$sql="select distinct course from courses";
	$resultcc=mysqli_query($conn,$sql);
	while($f=mysqli_fetch_array($resultcc))
	{
		if(isset($_POST['course']))
		 {
			 echo '<option ';
			 if($_REQUEST['course']==$f['course'])
			 echo 'selected = "selected" ';
			 echo " value='$f[0]' >".$f[0]."</option>";
			 
					
		 }
		else
		 {
					echo "<option id='' value=".$f[0].">".$f[0]."</option>";
					//echo 'selected = "selected" ';
		 }
		
		 
	}
	 ?>
       </td>
   
       <td width="76">Specialization:</td>
    <td width="244">
    <select name="spec" id="spec" >
    <option value="">-- select--</option>
    <?php
	$spe="select spec_id,specialisation  from specialization";
						 		$sp=mysqli_query($conn,$spe);
								while($f=mysqli_fetch_array($sp))
									{
										if(isset($_POST['spec']))
											 {
			 									echo '<option ';
			 									if($_REQUEST['spec']==$f['spec_id'])
												{
												
												 echo 'selected = "selected" ';
												}
			 										echo " value='$f[0]' >".$f[1]."</option>";
			 
					
		 									}
										else
											{
													echo "<option id='' value=".$f[0].">".$f[1]."</option>";
											}
		
		 
									}
									
								
							
	echo '</select>';
	  
	   if(isset($_POST['spec']))
		 {
		 	$me=$_POST['spec'];
		 
		 }
		 else
		 {
		 }
        
	  	
	?>
    </td>
    </tr>
    <tr>
    <td height="106">Name :</td>
    <td>
    <select name="name">
    <option value="">---choose name--</option>
    <?php
	
					
								$name="select name from stud ";
						 		$rname=mysqli_query($conn,$name);
								while($f=mysqli_fetch_array($rname))
									{
										if(isset($_POST['name']))
											 {
			 									echo '<option ';
			 									if($_REQUEST['name']==$f['name'])
												 echo 'selected = "selected" ';
			 										echo " value='$f[0]' >".$f[0]."</option>";
			 
					
		 									}
										else
											{
													echo "<option id='' value=".$f[0].">".$f[0]."</option>";
											}
		
		 
									}
									
								
							
	echo '</select>';
	  
	   if(isset($_POST['name']))
		 {
		 	$nname=$_POST['name'];
		 
		 }
		 else
		 {
		 }
        
	  	
    ?>
    </td>
    <td width="82">Admission No:</td>
    <td>
    
    <select name="admno" >
    <option value="">---choose--</option>
    <?php
					$adm="select adm_no from stud_batch_rel";
						 $radm=mysqli_query($conn,$adm);
						 while($f=mysqli_fetch_array($radm))
									{
										if(isset($_POST['admno']))
											 {
			 									echo '<option ';
			 									if($_REQUEST['admno']==$f['adm_no'])
												 echo 'selected = "selected" ';
			 										echo " value='$f[0]' >".$f[0]."</option>";
			 
					
		 									}
										else
											{
													echo "<option id='' value=".$f[0].">".$f[0]."</option>";
											}
		
									}

	
	
	  echo '</select>';
	  
	   if(isset($_POST['name']))
		 {
		 	$nname=$_POST['name'];
		 
		 }
		 else
		 {
		 }
        	
    ?>
  
    
    
        <td width="82">Batch:</td>
    <td>
    
    <select name="batch">
    <option value="">---choose--</option>
    <?php
			
						$year="select distinct year_batch from batch";
						 $ryear=mysqli_query($conn,$year);
						 while($f=mysqli_fetch_array($ryear))
									{
										if(isset($_POST['batch']))
											 {
			 									echo '<option ';
			 									if($_REQUEST['batch']==$f['year_batch'])
												 echo 'selected = "selected" ';
			 										echo " value='$f[0]' >".$f[0]."</option>";
			 
					
		 									}
										else
											{
													echo "<option id='' value=".$f[0].">".$f[0]."</option>";
											}
		
		 
									}
									
					
	
	  echo '</select>';
	  
	   if(isset($_POST['name']))
		 {
		 	$nname=$_POST['name'];
		 
		 }
		 else
		 {
		 }
        	
    ?>
  
    </td>
    
</tr>  </table>        <center><input type="submit" name="button" id="button" value="search" style="cursor:pointer;" class="input"></center>
    
    </form>
    <?php
	
	$dept=$_POST['dept'];
	$course=$_POST['course'];
	$spec=$_POST['spec'];
	$name=$_POST['name'];
	$adm=$_POST['admno'];
	$batch=$_POST['batch'];
	
	//echo "<center>SEARCHING RESULT</center>";
	echo"<br>";
	if (isset($_REQUEST['button']))
	{
	if($dept!='')
	{ //deptyes
		if($course!='')
		{ //couseyes
			if($spec!='')
			{ //specyes
				if($name!='')
				{ //name yes
					if($adm!='')
					{ //admyes
						
						$sql="select sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						echo'<table>';
						while($row=mysqli_fetch_array($re))
						{
                        $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<tr><td><img src='".$img."' width='100' /></td></tr>";

						}?>
                        
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $name?> </td></tr>
<tr><td><a href='dashboard_staff_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
						
						
					}//admoyes
					else
					{ //adm no
						$cs="select id from courses where course='$course'";
						$rcs=mysqli_query($conn,$cs);
						while($row=mysqli_fetch_array($rcs))
						{
							$cid=$row['id'];
							
						}
						$csid="select course_spec_id from course_specialization where course_id=$cid and spec_id=$spec";
						$rcsid=mysqli_query($conn,$csid);
						while($row=mysqli_fetch_array($rcsid))
						{
							$ocsid=$row['course_spec_id'];
														
						}
						if($batch!='')
						{
						$cbid="select batch_id from batch where year_batch=$batch and course_spec_id=$ocsid";
						$rbid=mysqli_query($conn,$cbid);
						while($row=mysqli_fetch_array($rbid))
						{
							$obid=$row['batch_id'];
							
						}
						$cadm="select adm_no from stud_batch_rel where batch_id=$obid";
						$radm=mysqli_query($conn,$cadm);
						while($row=mysqli_fetch_array($radm))
						{
							$adm=$row['adm_no'];
						$sql="select name,sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_array($re))
						{
							echo'<table>';
							$na=$row['name'];
							if($na==$name)
							{
                       $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<tr><td><img src='".$img."' width='100' /></td></tr>";

						 ?>
                        </div>
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?><tr></td>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table>
<?php
							
}
						}
						}
						}//batch yes
						else
						{//batch no
							$cs="select id from courses where course='$course'";
						$rcs=mysqli_query($conn,$cs);
						while($row=mysqli_fetch_array($rcs))
						{
							$cid=$row['id'];
							
						}
						$csid="select course_spec_id from course_specialization where course_id=$cid and spec_id=$spec";
						$rcsid=mysqli_query($conn,$csid);
						while($row=mysqli_fetch_array($rcsid))
						{
							$ocsid=$row['course_spec_id'];
							
						}
						$cbid="select batch_id from batch where course_spec_id=$ocsid";
						$rbid=mysqli_query($conn,$cbid);
						while($row=mysqli_fetch_array($rbid))
						{
							$obid=$row['batch_id'];
							$admc="select adm_no from stud_batch_rel where batch_id=$obid";
							$radmc=mysqli_query($conn,$admc);
							while($row=mysqli_fetch_array($radmc))
							{
								$adm=$row['adm_no'];
								$nck="select name from stud where adm_no='$adm'";
								$rnck=mysqli_query($conn,$nck);
								while($row=mysqli_fetch_array($rnck))
									{
										$na=$row['name'];
										if($na==$name)
										{
										$sql="select sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_array($re))
						{
							echo'<table>';
                       $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<tr><td><img src='".$img."' width='100' /></td></tr>";

						} ?>
                        
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $name?> </td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table>
										<?php
                                        }
									}
							}
							
							
						}
						}//batch no
					}//adm no
				}//name yes
				else
				{//name no
				if($adm!='')
					{ //admyes
						?>
                        
                        <div  cellpadding="3" class="vwtbl vwres">
                       <?php
						$sql="select name,sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_array($re))
						{
							$na=$row['name'];
                       $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";

						}?>
                        </div>
  <div class="txt row1">Admission No : <?php echo "jdhfjd".$adm?></div>
   <div class="txt row2">Name : <?php echo $na?> </div>
<a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a><?php
						
						
					}//admoyes
					else
					{//admno
						$cs="select id from courses where course='$course'";
						$rcs=mysqli_query($conn,$cs);
						while($row=mysqli_fetch_array($rcs))
						{
							$cid=$row['id'];
							
						}
						$csid="select course_spec_id from course_specialization where course_id=$cid and spec_id=$spec";
						$rcsid=mysqli_query($conn,$csid);
						while($row=mysqli_fetch_array($rcsid))
						{
							$ocsid=$row['course_spec_id'];
							
						}
						if($batch!='')
						{
						$cbid="select batch_id from batch where year_batch=$batch and course_spec_id=$ocsid";
						$rbid=mysqli_query($conn,$cbid);
						while($row=mysqli_fetch_array($rbid))
						{
							$obid=$row['batch_id'];
							
						}
						$cadm="select adm_no from stud_batch_rel where batch_id=$obid ";
						$radm=mysqli_query($conn,$cadm);
						while($row=mysqli_fetch_array($radm))
						{
							$adm=$row['adm_no'];
						
						$sql="select sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_array($re))
						{
                       $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";

						} ?>
                        </div>
  <div class="txt row1">Admission No : <?php echo "vbnbvn".$adm?></div>
   <div class="txt row2">Name : <?php echo $name?> </div>
<a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a>
<?php
						}//admno
						
						}//batch yes
						else
						{//batch no
							$cs="select id from courses where course='$course'";
						$rcs=mysqli_query($conn,$cs);
						while($row=mysqli_fetch_array($rcs))
						{
							$cid=$row['id'];
							
						}
						$csid="select course_spec_id from course_specialization where course_id=$cid and spec_id=$spec";
						$rcsid=mysqli_query($conn,$csid);
						while($row=mysqli_fetch_array($rcsid))
						{
							$ocsid=$row['course_spec_id'];
							
						}
						$cbid="select batch_id from batch where course_spec_id=$ocsid";
						$rbid=mysqli_query($conn,$cbid);
						while($row=mysqli_fetch_array($rbid))
						{
							$obid=$row['batch_id'];
							$admc="select adm_no from stud_batch_rel where batch_id=$obid";
							$radmc=mysqli_query($conn,$admc);
							while($row=mysqli_fetch_array($radmc))
							{
								$adm=$row['adm_no'];
								$nck="select name from stud where adm_no='$adm'";
								$rnck=mysqli_query($conn,$nck);
								while($row=mysqli_fetch_array($rnck))
									{
										$na=$row['name'];
										$sql="select sex,image from stud where adm_no=$adm";
						$re=mysqli_query($conn,$sql);
						?>
                       
                        <?php
						while($row=mysqli_fetch_array($re))
						{
                       $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<table><tr><td><img src='".$img."' width='100' /></td></tr>";
echo "jdhfjhdhfj";
						} ?>
                        
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?> </td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table>
										<?php
                                        
									}
							}
							
							
						}
						}//batch no
					
					}//admno
				}//name no
				
			}//spec yes
			
			
			
			
			
			
			
			
			else
			{ //main spec no
				if($name!='')
				{//snamey
					if($adm!='')
					{
						$sql="select name,sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_array($re))
						{
							$na=$row['name'];
                       $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";

						}?>
                        </div>
  <div class="txt row1">Admission No : <?php echo $adm?></div>
   <div class="txt row2">Name : <?php echo $na?> </div>
<a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a><?php
						
						
					}//admoyes
					else
					{//admno
					if($batch!='')
					{
					$cs="select id from courses where course='$course'";
						$rcs=mysqli_query($conn,$cs);
						while($row=mysqli_fetch_array($rcs))
						{
							$cid=$row['id'];
							
						}
						$did="select id from department where dept='$dept'";
						$rdid=mysqli_query($conn,$did);
						while($row=mysqli_fetch_array($rdid))
						{
						$odid=$row['id'];
						//echo $odid;
						}
						$spid="select spec_id from dept_course where dept_id=$odid and course_id=$cid";
						$rspid=mysqli_query($conn,$spid);
						while($row=mysqli_fetch_array($rspid))
						{
						$specid=$row['spec_id'];
						//echo $specid;
						$a="select course_spec_id from course_specialization where course_id=$cid and spec_id=$specid";
						$ra=mysqli_query($conn,$a);
						while($row=mysqli_fetch_array($ra))
						{
							$csid=$row['course_spec_id'];
							$b="select batch_id from batch where course_spec_id=$csid and year_batch=$batch";
							$rb=mysqli_query($conn,$b);
						while($row=mysqli_fetch_array($rb))
						{
							$bid=$row['batch_id'];
							$c="select b.adm_no from stud_batch_rel b,stud s where b.batch_id=$bid and s.name='$name'";
							$rc=mysqli_query($conn,$c);
							while($row=mysqli_fetch_array($rc))
							{
								$adm=$row['adm_no'];
							
								$sql="select name,sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_array($re))
						{
							$na=$row['name'];
							{
							if($na==$name)
                       $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";

						?>
                        </div>
  <div class="txt row1">Admission No : <?php echo $adm?></div>
   <div class="txt row2">Name : <?php echo $na?> </div>
<a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a><?php
							}
						}
							}
						
						}
						}
						}
					}//batchyes
					else
					{//batchno
					
					$cs="select id from courses where course='$course'";
						$rcs=mysqli_query($conn,$cs);
						while($row=mysqli_fetch_array($rcs))
						{
							$cid=$row['id'];
							
						}
						$did="select id from department where dept='$dept'";
						$rdid=mysqli_query($conn,$did);
						while($row=mysqli_fetch_array($rdid))
						{
						$odid=$row['id'];
						//echo $odid;
						}
						$spid="select spec_id from dept_course where dept_id=$odid and course_id=$cid";
						$rspid=mysqli_query($conn,$spid);
						while($row=mysqli_fetch_array($rspid))
						{
						$specid=$row['spec_id'];
						//echo $specid;
						$a="select course_spec_id from course_specialization where course_id=$cid and spec_id=$specid";
						$ra=mysqli_query($conn,$a);
						while($row=mysqli_fetch_array($ra))
						{
							$csid=$row['course_spec_id'];
							$b="select batch_id from batch where course_spec_id=$csid";
							$rb=mysqli_query($conn,$b);
						while($row=mysqli_fetch_array($rb))
						{
							$bid=$row['batch_id'];
							$c="select adm_no from stud_batch_rel where batch_id=$bid";
							$rc=mysqli_query($conn,$c);
							while($row=mysqli_fetch_array($rc))
							{
								$adm=$row['adm_no'];
								$sql="select name,sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						echo '<table>';
						while($row=mysqli_fetch_array($re))
						{
							$na=$row['name'];
							if($na==$name)
							{
                       echo'<tr><td>';
					   $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        </div>
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							}
						}
							}
						
						}
						}
						}
					
					}//batchno
					}//admno
					
				}//snamey
				
				
				//***************************************************************************
				
					
				else
				{//snameno
				if($adm!='')
				{
					$sql="select name,sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_array($re))
						{
							$na=$row['name'];
                       $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";

						}?>
                        </div>
  <div class="txt row1">Admission No : <?php echo $adm?></div>
   <div class="txt row2">Name : <?php echo $na?> </div>
<a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a><?php
					
				}//admyes
				else
				{//admno
				if($batch!='')
					{
					$cs="select id from courses where course='$course'";
						$rcs=mysqli_query($conn,$cs);
						while($row=mysqli_fetch_array($rcs))
						{
							$cid=$row['id'];
							
						}
						$did="select id from department where dept='$dept'";
						$rdid=mysqli_query($conn,$did);
						while($row=mysqli_fetch_array($rdid))
						{
						$odid=$row['id'];
						//echo $odid;
						}
						$spid="select spec_id from dept_course where dept_id=$odid and course_id=$cid";
						$rspid=mysqli_query($conn,$spid);
						while($row=mysqli_fetch_array($rspid))
						{
						$specid=$row['spec_id'];
						//echo $specid;
						$a="select course_spec_id from course_specialization where course_id=$cid and spec_id=$specid";
						$ra=mysqli_query($conn,$a);
						while($row=mysqli_fetch_array($ra))
						{
							$csid=$row['course_spec_id'];
							$b="select batch_id from batch where course_spec_id=$csid and year_batch=$batch";
							$rb=mysqli_query($conn,$b);
						while($row=mysqli_fetch_array($rb))
						{
							$bid=$row['batch_id'];
							$c="select adm_no from stud_batch_rel where batch_id=$bid ";
							$rc=mysqli_query($conn,$c);
							while($row=mysqli_fetch_array($rc))
							{
								$adm=$row['adm_no'];
								$sql="select name,sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						echo'<table>';
						while($row=mysqli_fetch_array($re))
						{
							$na=$row['name'];
							
                       echo'<tr><td>';
					   $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo'</tr></td>';

						?>
                        </div>
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?> </td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						}
							}
						
						}
						}
						}
					}//batchyes
					else
					{//batchno
					
					$cs="select id from courses where course='$course'";
						$rcs=mysqli_query($conn,$cs);
						while($row=mysqli_fetch_array($rcs))
						{
							$cid=$row['id'];
							
						}
						$did="select id from department where dept='$dept'";
						$rdid=mysqli_query($conn,$did);
						while($row=mysqli_fetch_array($rdid))
						{
						$odid=$row['id'];
						//echo $odid;
						}
						$spid="select spec_id from dept_course where dept_id=$odid and course_id=$cid";
						$rspid=mysqli_query($conn,$spid);
						while($row=mysqli_fetch_array($rspid))
						{
						$specid=$row['spec_id'];
						//echo $specid;
						$a="select course_spec_id from course_specialization where course_id=$cid and spec_id=$specid";
						$ra=mysqli_query($conn,$a);
						while($row=mysqli_fetch_array($ra))
						{
							$csid=$row['course_spec_id'];
							$b="select batch_id from batch where course_spec_id=$csid";
							$rb=mysqli_query($conn,$b);
						while($row=mysqli_fetch_array($rb))
						{
							$bid=$row['batch_id'];
							$c="select adm_no from stud_batch_rel where batch_id=$bid";
							$rc=mysqli_query($conn,$c);
							while($row=mysqli_fetch_array($rc))
							{
								$adm=$row['adm_no'];
								$sql="select name,sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						echo '<table>';
						while($row=mysqli_fetch_array($re))
						{
							$na=$row['name'];
							
                       echo'<tr><td>';
					   $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        </div>
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						}
							}
						
						}
						}
						}
					
					}
				
				
				}//admno
				}//snameno
					
									
				}//main spec no
			
					
		}//courseyes
		//*********************************************************************************************************
		else
		{//course no
		if($spec!='')
		{//specy
		if($adm!='')
				{
					$sql="select name,sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						?>
                        <table>
                        <?php
						while($row=mysqli_fetch_array($re))
						{
							$na=$row['name'];
                       $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<tr><td><img src='".$img."' width='100' /></td></tr>";

						}?>
                        </div>
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?> </td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr><?php
					
				}
				else
				{//admno
		$a="select course_spec_id from course_specialization where spec_id=$spec";
		$ra=mysqli_query($conn,$a);
		while($row=mysqli_fetch_array($ra))
		{//csid
		$csid=$row['course_spec_id'];
		if($batch!='')
		{
		$b="select batch_id from batch where course_spec_id=$csid and year_batch=$batch";
		$rb=mysqli_query($conn,$b);
		while($row=mysqli_fetch_array($rb))
		{
			$bid=$row['batch_id'];
			$c="select adm_no from stud_batch_rel where batch_id=$bid";
			$rc=mysqli_query($conn,$c);
			while($row=mysqli_fetch_array($rc))
			{
				$adm=$row['adm_no'];
				if($name!='')
				{
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						if($na==$name)
						{
							
                       echo'<tr><td>';
					   $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						}
					}
				}
				else
				{ echo'<table>';
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						
                       echo'<tr><td>';
					   $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						
					}
				}
				
			}
			
		}
		}//batchy
		else
		{
		$b="select batch_id from batch where course_spec_id=$csid";
		$rb=mysqli_query($conn,$b);
		while($row=mysqli_fetch_array($rb))
		{
			$bid=$row['batch_id'];
			$c="select adm_no from stud_batch_rel where batch_id=$bid";
			$rc=mysqli_query($conn,$c);
			while($row=mysqli_fetch_array($rc))
			{
				$adm=$row['adm_no'];
				if($name!='')
				{
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					echo'<table>';
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						if($na==$name)
						{
							
                       echo'<tr><td>'; 
					  $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						}
					}
				}
				else
				{?>
                <table>
                <?php
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						
                       echo'<tr><td>';
					   $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						
					}
				}
				
			}
			
		}	
		}//nobatch
		}//csid
		}//admno
		}//specy
		else
		{//specno
		
		if($adm!='')
				{
					$sql="select name,sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						?>
                        <table>
                        <?php
						while($row=mysqli_fetch_array($re))
						{
							$na=$row['name'];
                       $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<tr><td><img src='".$img."' width='100' /></td></tr>";

						}?>
                        </div>
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?> </td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
				}
		$a="select id from department where dept='$dept'";
		$ra=mysqli_query($conn,$a);
		while($row=mysqli_fetch_array($ra))
		{//deptid
		$did=$row['id'];
		
		}//deptid
		$b="select course_id,spec_id from dept_course where dept_id=$did";
		$rb=mysqli_query($conn,$b);
		while($row=mysqli_fetch_array($rb))
		{//csid
		$cid=$row['course_id'];
		$sid=$row['spec_id'];
		$cs="select course_spec_id from course_specialization where course_id=$cid and spec_id=$sid";
		$rcs=mysqli_query($conn,$cs);
		while($row=mysqli_fetch_array($rcs))
		{//cs
			$cs_id=$row['course_spec_id'];
			
		if($batch!='')
		{//ybatch
		$d="select batch_id from batch where year_batch=$batch and course_spec_id=$cs_id";
		$rd=mysqli_query($conn,$d);
		while($row=mysqli_fetch_array($rd))
		{//bid
			$bid=$row['batch_id'];
			$f="select adm_no from stud_batch_rel where batch_id=$bid";
			$rf=mysqli_query($conn,$f);
			while($row=mysqli_fetch_array($rf))
			{//adm
			$adm=$row['adm_no'];
			if($name!='')
			{//yname
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					echo'<table>';
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						if($na==$name)
						{
							
                       echo'<tr><td>'; 
					  
					  $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						}
					}
				
			}//yname
			else
			{
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					echo'<table>';
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						
                       echo'<tr><td>'; 
					  $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						 
					}
			}
			}//adm
		}//bid
		}//ybatch
		else
		{		
		$d="select batch_id from batch where course_spec_id=$cs_id";
		$rd=mysqli_query($conn,$d);
		while($row=mysqli_fetch_array($rd))
		{//bid
			$bid=$row['batch_id'];
			
			$f="select adm_no from stud_batch_rel where batch_id=$bid";
			$rf=mysqli_query($conn,$f);
			while($row=mysqli_fetch_array($rf))
			{//adm
			$adm=$row['adm_no'];
			echo '<br>';
				$xy="select name,sex,image from stud where adm_no='$adm'";
				$rxy=mysqli_query($conn,$xy);
				while($row=mysqli_fetch_array($rxy))
				{
					$na=$row['name'];
					if($name!='')
					{
						if($na==$name)
						{
							
                       echo'<tr><td>';
					   $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        </div>
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						}					
					}
					else
					{
						echo'<tr><td>';
						$img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
					}
				}
			}//adm
		}//bid
		}
		}//cs
		}//csid
		}//specno
		
		}//course no
		//**********************************************************************************************************
	}//deptyes
	//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
	else
	{//dept no
		if($course!='')
		{//ycourse
				if($adm!='')
				{//adm
				$sql="select sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						echo '<table>';
						while($row=mysqli_fetch_array($re))
						{
                       
					   $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<tr><td><img src='".$img."' width='100' /></td></tr>";

						}?>
                        
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $name?> </td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
						
						
					}//adm
					else
					{//noadm
					$a="select id from courses where course='$course'";
					$ra=mysqli_query($conn,$a);
					while($row=mysqli_fetch_array($ra))
					{//cid
		    			$cid=$row['id'];
						if($spec!='')
						{//yspec
							$b="select course_spec_id from course_specialization where course_id=$cid and spec_id=$spec";
							$rb=mysqli_query($conn,$b);
							while($row=mysqli_fetch_array($rb))
							{//csid
							$csid=$row['course_spec_id'];
							//echo $csid;
							if($batch!='')
							{//ybatch
							$d="select batch_id from batch where year_batch=$batch and course_spec_id=$csid";
							$rd=mysqli_query($conn,$d);
							while($row=mysqli_fetch_array($rd))
							{//bid
								$bid=$row['batch_id'];
								//echo $bid;
								$f="select adm_no from stud_batch_rel where batch_id=$bid";
								$rf=mysqli_query($conn,$f);
								while($row=mysqli_fetch_array($rf))
									{//adm
									$adm=$row['adm_no'];
									echo "cs,".$adm;
									if($name!='')
									{//yname
									echo "entered";
										$d="select name,sex,image from stud where adm_no='$adm'";
										$rd=mysqli_query($conn,$d);
										echo'<table>';
										while($row=mysqli_fetch_array($rd))
										{
											$na=$row['name'];
											if($na==$name)
											{
							
                       						echo'<tr><td>'; 
					   						$img = ($row['image'] && file_exists('student/'.$row['image'])) ? 'student/'.$row['image']:(($row['sex'] == 'M') ? 'images/no-male.png' : 'images/no-female.png') ;
											echo "<img src='".$img."' width='100' />";
											echo '</td></tr>'

						?>
                        					<tr><td>Admission No : <?php echo $adm?></td></tr>
   											<tr><td>Name : <?php echo $na?></td></tr>
											<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
											}
										}
									}//yname
									else
									{//noname
									$d="select name,sex,image from stud where adm_no='$adm'";
									$rd=mysqli_query($conn,$d);
									echo'<table>';
									while($row=mysqli_fetch_array($rd))
									{
									$na=$row['name'];
						
                       				echo'<tr><td>'; 
					   				$img = ($row['image'] && file_exists('student/'.$row['image'])) ? 'student/'.$row['image']:(($row['sex'] == 'M') ? 'images/no-male.png' : 'images/no-female.png') ;
									echo "<img src='".$img."' width='100' />";
										echo '</td></tr>'

										?>
                        				<tr><td>Admission No : <?php echo $adm?></td></tr>
   										<tr><td>Name : <?php echo $na?></td></tr>
										<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						 
									}
									}//noname
									}//adm
							}//bid
							}//ybatch
							else
							{//nobatch
								$b="select batch_id from batch where course_spec_id=$csid";
		$rb=mysqli_query($conn,$b);
		while($row=mysqli_fetch_array($rb))
		{
			$bid=$row['batch_id'];
			$c="select adm_no from stud_batch_rel where batch_id=$bid";
			$rc=mysqli_query($conn,$c);
			while($row=mysqli_fetch_array($rc))
			{
				$adm=$row['adm_no'];
				if($name!='')
				{
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					echo'<table>';
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						if($na==$name)
						{
							
                       echo'<tr><td>'; 
					  $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						}
					}
				}
				else
				{?>
                <table>
                <?php
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						
                       echo'<tr><td>';
					   $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						
					}
				}
				
			}
			
		}	
		
							}//nobatch
							}//csid
						}//yspec
						else
						{//nospec
						if($adm!='')
				{
					$sql="select name,sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						?>
                        <table>
                        <?php
						while($row=mysqli_fetch_array($re))
						{
							$na=$row['name'];
                       $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<tr><td><img src='".$img."' width='100' /></td></tr>";

						}?>
                        </div>
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?> </td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
				}
		$a="select id from courses where course='$course'";
		$ra=mysqli_query($conn,$a);
		while($row=mysqli_fetch_array($ra))
		{//cid
		$cid=$row['id'];
		//echo $cid;
		}//cid
		$b="select spec_id from course_specialization where course_id=$cid";
		$rb=mysqli_query($conn,$b);
		while($row=mysqli_fetch_array($rb))
		{//csid
		$sid=$row['spec_id'];
		$cs="select course_spec_id from course_specialization where course_id=$cid and spec_id=$sid";
		$rcs=mysqli_query($conn,$cs);
		while($row=mysqli_fetch_array($rcs))
		{//cs
			$cs_id=$row['course_spec_id'];
			
		if($batch!='')
		{//ybatch
		$d="select batch_id from batch where year_batch=$batch and course_spec_id=$cs_id";
		$rd=mysqli_query($conn,$d);
		while($row=mysqli_fetch_array($rd))
		{//bid
			$bid=$row['batch_id'];
			$f="select adm_no from stud_batch_rel where batch_id=$bid";
			$rf=mysqli_query($conn,$f);
			while($row=mysqli_fetch_array($rf))
			{//adm
			$adm=$row['adm_no'];
			if($name!='')
			{//yname
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					echo'<table>';
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						if($na==$name)
						{
							
                       echo'<tr><td>'; 
					  $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						}
					}
				
			}//yname
			else
			{
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					echo'<table>';
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						
                       echo'<tr><td>'; 
					  $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						 
					}
			}
			}//adm
		}//bid
		}//ybatch
		else
		{		
		$d="select batch_id from batch where course_spec_id=$cs_id";
		$rd=mysqli_query($conn,$d);
		while($row=mysqli_fetch_array($rd))
		{//bid
			$bid=$row['batch_id'];
			
			$f="select adm_no from stud_batch_rel where batch_id=$bid";
			$rf=mysqli_query($conn,$f);
			while($row=mysqli_fetch_array($rf))
			{//adm
			$adm=$row['adm_no'];
			echo '<br>';
				$xy="select name,sex,image from stud where adm_no='$adm'";
				$rxy=mysqli_query($conn,$xy);
				while($row=mysqli_fetch_array($rxy))
				{
					$na=$row['name'];
					if($name!='')
					{
						if($na==$name)
						{
							
                       echo'<tr><td>';
					   $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        </div>
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						}					
					}
					else
					{
						echo'<tr><td>';
						$img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
					}
				}
			}//adm
		}//bid
		}
		}//cs
		}//csid
		}//specno

						
					}//cid
					}//noadm
		}//ycourse
		else
		{//nocourse
			if($adm!='')
				{
					$sql="select name,sex,image from stud where adm_no='$adm'";
						$re=mysqli_query($conn,$sql);
						?>
                        <table>
                        <?php
						while($row=mysqli_fetch_array($re))
						{
							$na=$row['name'];
                       $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<tr><td><img src='".$img."' width='100' /></td></tr>";

						}?>
                        </div>
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?> </td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
				}
				else
				{//noadm
			if($spec!='')
			{//yspec
				$cid="select course_id from course_specialization where spec_id=$spec";
				$ecid=mysqli_query($conn,$cid);
				while($row=mysqli_fetch_array($ecid))
				{//cid
					$cid=$row["course_id"];
					$csid="select course_spec_id from course_specialization where course_id=$cid and spec_id=$spec";
					$ecsid=mysqli_query($conn,$csid);
						while($row=mysqli_fetch_array($ecsid))
						{//csid
					$csid=$row["course_spec_id"];
					if($batch!='')
					{//ybatch
						$d="select batch_id from batch where year_batch=$batch and course_spec_id=$csid";
							$rd=mysqli_query($conn,$d);
							while($row=mysqli_fetch_array($rd))
							{//bid
								$bid=$row['batch_id'];
								//echo $bid;
								$f="select adm_no from stud_batch_rel where batch_id=$bid";
								$rf=mysqli_query($conn,$f);
								while($row=mysqli_fetch_array($rf))
									{//adm
									$adm=$row['adm_no'];
									echo "cs,".$adm;
									if($name!='')
									{//yname
									echo "entered";
										$d="select name,sex,image from stud where adm_no='$adm'";
										$rd=mysqli_query($conn,$d);
										echo'<table>';
										while($row=mysqli_fetch_array($rd))
										{
											$na=$row['name'];
											if($na==$name)
											{
							
                       						echo'<tr><td>'; 
					   						$img = ($row['image'] && file_exists('student/'.$row['image'])) ? 'student/'.$row['image']:(($row['sex'] == 'M') ? 'images/no-male.png' : 'images/no-female.png') ;
											echo "<img src='".$img."' width='100' />";
											echo '</td></tr>'

						?>
                        					<tr><td>Admission No : <?php echo $adm?></td></tr>
   											<tr><td>Name : <?php echo $na?></td></tr>
											<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
											}
										}
									}//yname
									else
									{//noname
									$d="select name,sex,image from stud where adm_no='$adm'";
									$rd=mysqli_query($conn,$d);
									echo'<table>';
									while($row=mysqli_fetch_array($rd))
									{
									$na=$row['name'];
						
                       				echo'<tr><td>'; 
					   				$img = ($row['image'] && file_exists('student/'.$row['image'])) ? 'student/'.$row['image']:(($row['sex'] == 'M') ? 'images/no-male.png' : 'images/no-female.png') ;
									echo "<img src='".$img."' width='100' />";
										echo '</td></tr>'

										?>
                        				<tr><td>Admission No : <?php echo $adm?></td></tr>
   										<tr><td>Name : <?php echo $na?></td></tr>
										<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						 
									}
									}//noname
									}//adm
							}//bid
					}//ybatch
					else
					{//nobatch
					
					$b="select batch_id from batch where course_spec_id=$csid";
		$rb=mysqli_query($conn,$b);
		while($row=mysqli_fetch_array($rb))
		{
			$bid=$row['batch_id'];
			$c="select adm_no from stud_batch_rel where batch_id=$bid";
			$rc=mysqli_query($conn,$c);
			while($row=mysqli_fetch_array($rc))
			{
				$adm=$row['adm_no'];
				if($name!='')
				{
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					echo'<table>';
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						if($na==$name)
						{
							
                       echo'<tr><td>'; 
					  $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						}
					}
				}
				else
				{?>
                <table>
                <?php
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						
                       echo'<tr><td>';
					   $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						
					}
				}
				
			}
			
		}	
					
					}//nobatch
						}//csid
				}//cid
			}//yspec
			
			else
			{
				
				if($batch!='')
				{//ybatch
					$bid="select batch_id from batch where year_batch=$batch";
					$ebid=mysqli_query($conn,$bid);
					while($row=mysqli_fetch_array($ebid))
					{//bid
						$bid=$row["batch_id"];
						$adm="select adm_no from stud_batch_rel where batch_id=$bid";
						$eadm=mysqli_query($conn,$adm);
					while($row=mysqli_fetch_array($eadm))
					{//adm
						$adm=$row["adm_no"];
									if($name!='')
									{//yname
									//echo "hav name";
										$d="select name,sex,image from stud where adm_no='$adm'";
										$rd=mysqli_query($conn,$d);
										echo'<table>';
										while($row=mysqli_fetch_array($rd))
										{
											$na=$row['name'];
											if($na==$name)
											{
							
                       						echo'<tr><td>'; 
					   						$img = ($row['image'] && file_exists('student/'.$row['image'])) ? 'student/'.$row['image']:(($row['sex'] == 'M') ? 'images/no-male.png' : 'images/no-female.png') ;
											echo "<img src='".$img."' width='100' />";
											echo '</td></tr>'

						?>
                        					<tr><td>Admission No : <?php echo $adm?></td></tr>
   											<tr><td>Name : <?php echo $na?></td></tr>
											<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
											}
										}
									}//yname
									else
									{//noname
									$d="select name,sex,image from stud where adm_no='$adm'";
									$rd=mysqli_query($conn,$d);
									echo'<table>';
									while($row=mysqli_fetch_array($rd))
									{
									$na=$row['name'];
						
                       				echo'<tr><td>'; 
					   				$img = ($row['image'] && file_exists('student/'.$row['image'])) ? 'student/'.$row['image']:(($row['sex'] == 'M') ? 'images/no-male.png' : 'images/no-female.png') ;
									echo "<img src='".$img."' width='100' />";
										echo '</td></tr>'

										?>
                        				<tr><td>Admission No : <?php echo $adm?></td></tr>
   										<tr><td>Name : <?php echo $na?></td></tr>
										<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						 
									}
									}//noname
												
					}//adm
					}//bid
				}//ybatch
				else
				{//nbatch
			echo '<table>';
						$b="select batch_id from batch";
		$rb=mysqli_query($conn,$b);
		while($row=mysqli_fetch_array($rb))
		{
			$bid=$row['batch_id'];
			$c="select adm_no from stud_batch_rel where batch_id=$bid";
			$rc=mysqli_query($conn,$c);
			while($row=mysqli_fetch_array($rc))
			{
				$adm=$row['adm_no'];
				if($name!='')
				{
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
				//	echo'<table>';
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						if($na==$name)
						{
							
                       echo'<tr><td>'; 
					  $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						}
					}
				}
				else
				{?>
                <table>
                <?php
					$d="select name,sex,image from stud where adm_no='$adm'";
					$rd=mysqli_query($conn,$d);
					while($row=mysqli_fetch_array($rd))
					{
						$na=$row['name'];
						
                       echo'<tr><td>';
					   $img = ($row['image'] && file_exists('upload/photo/'.$row['image'])) ? 'upload/photo/'.$row['image']:(($row['sex'] == 'M') ? 'upload/photo/no-male.png' : 'upload/photo/no-female.png') ;
						echo "<img src='".$img."' width='100' />";
						echo '</td></tr>'

						?>
                        
  <tr><td>Admission No : <?php echo $adm?></td></tr>
   <tr><td>Name : <?php echo $na?></td></tr>
<tr><td><a href='dashboard_staff.php?menu=viewstud&adm_no=<?php echo $adm?>' onClick="" id="view<?php echo $adm?>">View Details </a></td></tr></table><?php
							
						
					}
				}
				
			}
			
		}	
					
						
				}//nbatch
			}//nspec
			}//noadm
		}//nocourse
		
	}//dept_no
	
	}
	/*else
		{
			echo '<script>alert("Please enter atleast one criteria to search");</script>';
		}*/
	
	
	
	
	
			
	
	?>
</body>
</html>