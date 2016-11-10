  <?php
 
  session_start();
  

  
 
	  $rcpt_no=0;
  
 
  
  
 
	 
//page for creating pdf document
  require('mc_table.php');
 //creating object and opening functions 
$pdf=new PDF_HTML();
$pdf->PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();
$pdf->SetFont('Times','B',9); 
//receiving values from student certificate form

	//echo $d_id;
	
if(isset($_POST['submit']))
{	
    	$adm=$_POST['textfield'];
		$d=$_POST['textfield6'];
		$name=$_POST['textfield2'];
		$branch=$_POST['textfield4'];
		$sem=$_POST['textfield5'];
		$d_id=$_POST['did'];
		$year=$_POST['yearadm'];
		$year= date("d-m-y", strtotime($year) );
		$purpose=$_POST['purpose'];
		$course=$_POST['textfield3'];
		$issued=$_POST['log'];
		$rcpt_no=$_POST['no'];
		
		
  $name=strtoupper($name);
  
  $len=strlen($name);
  
 $sem_no=substr($sem,-1);
 if($sem=='S10')
 {
	 $sem_no=substr($sem,-2);
 }
 if($sem_no=='1')
 {
	 $upper='st';
 }
 else if($sem_no=='2')
 {
	 $upper='nd';
	 
 }
 else if($sem_no=='3')
 {
	 $upper='rd';
 }
 
 else
 {
	 $upper="th";
 }
  


$slname="";

   $course=strtoupper($course);

  if($issued=='hod')
  {
	  $auth="Head Of The Department";
	  
	  }
	  else if($issued=='pgdean')
	  $auth="PG Dean";
	  else if($issued=='ugdean')
	  $auth="uG Dean";
else if($issued=='principal')
$auth="Principal";
else
$auth="";

	 $slname=$course;
	// $branch=" ";
 

	 if($branch=='Civil Engineering')
	 {
 $slname='CE';
	 }
 else if($branch=='Mechanical Engineering')
  $slname='ME';
   else if($branch=='Electrical & Electronics Engineering')
  $slname='EEE';
   else if($branch=='Computer Science & Engineering')
  $slname='CSE';
  else if($branch=='Electronics & Communication Engineering')
  $slname='ECE';
 $branch=strtoupper($branch);
 //code for fetching serial number from database
include "dboperation.php";
$obj=new dboperation(); 

 $sl_no='';

		
		
	
	
		 $sql2="insert into serial_no values(null,$d_id,$rcpt_no,'$adm')";
		
$obj->Ex_query($sql2); 

 $purpose=ucfirst($purpose);
 $pdf->Rect(88,2,206,180);
$pdf->Image("images/download.jpg",180,4,25,25);
$pdf->Text(175,35,"GOVERNMENT OF KERALA");
$pdf->SetFont('Times','B',12);

$pdf->Text(150,40,"RAJIV GANDHI INSTITUTE OF TECHNOLOGY ");
$pdf->SetFont('Times','B',10);
$pdf->Text(180,45,"KOTTAYAM-686501");
$pdf->Text(94,50,"No:RIT/".$slname."/".$year."/".$rcpt_no);


$pdf->Image("images/download.jpg",25,4,25,25);
$pdf->SetFont('Times','B',8);
$pdf->Text(20,35,"GOVERNMENT OF KERALA");
$pdf->SetFont('Arial','B',10);

$pdf->Text(5,40,"Rajiv Gandhi Institute Of Technology");
$pdf->SetFont('Arial','B',8);
$pdf->Text(25,45,"KOTTAYAM-686501");
$pdf->Text(5,50,"No:RIT/".$slname."/".$year."/".$rcpt_no);



$pdf->SetFont('Times','BI',18);
 $pdf->Text(176,58,"CERTIFICATE ");
 
   $pdf->SetFont('Times','BI',10);    
 $pdf->Text(105,70,"Certified that Shri/Kumari ");
  $pdf->SetFont('Times','BI',12);
 $pdf->Text( 155,70,$name."          "."(Admission No:".$adm.")");   

  $pdf->SetDash(1,1);
$pdf->Line(145,70,290,70);
  $pdf->SetFont('Times','BI',10);
 $pdf->Text(90,80,"is a bonafide student of");
 $pdf->SetFont('Times','BI',11);
 
 $pdf->Text(126,80,$sem_no."   SEMESTER ".$course."  ".$branch);
  $pdf->setLeftMargin(127);
 $pdf->subWrite(133,$upper,10);
//$pdf->Write(90,$upper);
 
  $pdf->SetDash(1,1);
$pdf->Line(126,80,290,80);
  $pdf->SetFont('Times','BI',10); 
 $pdf->Text(90,90,"of this institution during the year ");
 $pdf->SetFont('Times','BI',14);
  $pdf->Text(180,90,$year);
  $pdf->SetDash(1,1);
$pdf->Line(145,90,290,90);
 
   $pdf->SetFont('Times','BI',10);
$pdf->Text(90,100,"This certificate is issued on his/her request for  ");
 $pdf->SetDash(1,1);
$pdf->Line(162,100,290,100);
$pdf->SetXY(172,95.5);
//$pdf->SetXY(101,101);
//$x=GetX();
$pdf->SetFont('Times','BI',12);
$pdf->setLeftMargin(99);
$pdf->Write(7,$purpose);
$pdf->SetDash(1,1);
$pdf->Line(95,108,290,108);
//................................................................................................................... ");
 $pdf->SetFont('Times','B',10);
 $pdf->Text(94,135,"Date:".$d);
 $pdf->Text(94,140,"Place:Pampady ");
 $pdf->SetFont('Times','BI',12);
 $pdf->Text(240,140,$auth);
 $pdf->SetFont('Times','B',10);
  $pdf->Text(1,60,"Name:".$name);
  $pdf->Text(1,70,"Admission Number :".$adm);
   $pdf->Text(1,80,"Semester : ".$sem);
    $pdf->Text(1,90,"Course :".$course);
	if($branch!=" ")
	{
    $pdf->SetFont('Times','B',10);
    $pdf->Text(1,100,"Branch :");
	
	$pdf->SetFont('Times','B',7);
	 $pdf->Text(15,100,$branch);
	}
//	$pdf->setLeftMargin(90);
//$pdf->Write(1,$branch);
 $pdf->SetFont('Times','B',10);
	 $pdf->Text(1,110,"Period :".$year);
	 $pdf->Text(1,140,"Date:".$d);
	 $pdf->SetFont('Times','BI',11);
	 $pdf->Text(42,140,$auth);
	 
	// $htmlTable='<TABLE>
//<TR>
//<TD></TD></TABLE>';
//$pdf->WriteHTML2("<br><br><br>$htmlTable");
	//$Y_Fields_Name_position = 20;
//Table position, under Fields Name
//$Y_Table_Position = 26;

			//$pdf=new PDF_MC_Table();
//$pdf->AddPage();
$pdf->SetDash(1,1);
$pdf->Line(83,1,83,200);
//$pdf->LineGraph(190,100);
//$pdf->subWrite(8,'H',33);
//$pdf->Write(10,'ello world');
//$pdf->Line($xOfTheStart,$yOfTheStart,$xOfTheEnd,$yOfTheEnd);
//$pdf->Line(50,50,80,80);
//$strf=$name;
//$strf=strtoupper($strf);
//$pdf->Write(30,$strf);
//$pdf->SetFontSize(25);
//$strfnew=preg_replace("/[a-z]+/e","strtoupper('')",$strf);
//$strf=strtoupper($strf);
//$pdf->Write(10,$strf[1].$strfnew[0]);
//$pdf->Write(30,$strf,$strfnew);
$pdf->Output();

  
}
	?>


