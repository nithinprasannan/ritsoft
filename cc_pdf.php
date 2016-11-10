<?php
 if(isset($_POST['submit']))
{
	    $cc_no=$_POST['cc_no'];
		$adno=$_POST['adno'];
		$name=$_POST['name'];
		$dte=$_POST['dte'];
		$completion=$_POST['completion'];
		$course=$_POST['course'];
		$specialization=$_POST['specialization'];
		$university=$_POST['university'];
		$month=$_POST['month'];
		$character=$_POST['character'];
				
include "dboperation.php";
$obj5=new dboperation();
	$query5="SELECT * FROM stud WHERE adm_no = '$adno' ";	
	$result5=$obj5->selectdata($query5);
	while($row=$obj5->fetch($result5))
	{
	 	$sex=("$row[4]");
	}
$obj=new dboperation();
$q="INSERT INTO `cc` (`cc_no`, `adm_no`, `chrctr`) VALUES ('$cc_no', '$adno', '$character')";
$obj->Ex_query($q); 

/*   
$d=date('d-m-Y');
  $s=date("d-m-Y",strtotime($d));
  
 $p=wordwrap($purpose,8,"\n",true); */
  require('mc_table.php');
/* $na="Nithin P";
 $dte="22-05-2016";
 $completion="23-08-2016"; */
$pdf=new PDF_HTML();
$pdf->PDF('P','mm','A4');
$pdf->AliasNbPages();
//$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();
$pdf->Image('images/cc.jpg', 0, 0, $pdf->w, $pdf->h);

$pdf->SetTextColor(0,0,255);
$pdf->SetFont('Arial','B',18); 
$pdf->Text(38,46,"RAJIV GANDHI INSTITUTE OF TECHNOLOGY");
$pdf->SetTextColor(200,0,0);
$pdf->SetFont('Arial','',14);
$pdf->Text(40,52,"(Department of Technical Education, Government of Kerala)");
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',12);
$pdf->Text(39,57,"Govt. Engineering College, Vellore (P.O), Pampady, Kottayam - 686501");
$pdf->Text(65,62,"Ph: 0481-2507783/2506153, Fax:0481 - 2506153");
$pdf->Text(75,67,"Email: info@rit.ac.in, Web:www.rit.ac.in");

$pdf->AddFont('OldeEnglish-Regular','','OLDE ENGLISH REGULAR.php');
$pdf->SetFont('OldeEnglish-Regular','',35);
$pdf->Text(47,90,"Course & Conduct Certificate");

$pdf->SetTextColor(255,0,0);
$pdf->SetFont('Arial','',12);
$pdf->Text(20,79,"CC No : ".$cc_no);
$pdf->Text(150,79,"Admission No : ".$adno);

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times','I',17);    
$pdf->Text(85,120,'This is to certify that');
$pdf->SetFont('Times','B',16);
$pdf->Text(55,130,"".$name);

$pdf->SetFont('Times','I',17);    
$pdf->Text(30,140,'was a student of this institution from '.$dte.' to '.$completion);
if($sex == 'M')
{
$pdf->Text(30,150,'and he has completed the prescribed course of study in');
}
else
{
	$pdf->Text(30,150,'and she has completed the prescribed course of study in');

}
$pdf->SetFont('Times','B',16);
$pdf->Text(165,150,"".$course);
$pdf->Text(55,160,"".$specialization);

$pdf->SetFont('Times','I',17);    
$pdf->Text(30,170,'and appeared for the Final Year Examination conducted by');
$pdf->Text(30,180,"".$university.' during ');
$pdf->SetFont('Times','B',16);
$pdf->Text(120,180,"".$month);
$pdf->SetFont('Times','I',17); 
if($sex == 'M')
{ 
$pdf->Text(30,190,'his conduct and character during the period were');
}
else
{
	$pdf->Text(30,190,'her conduct and character during the period were');

}
$pdf->SetFont('Times','B',16);
$pdf->Text(155,190,"".$character);


$pdf->SetFont('Arial','',12);
$issuedate=date('Y-m-d');	 
$pdf->Text(30,250,"Date : ".$issuedate);
$pdf->Text(150,250,"Principal");






//$pdf->Image("logo.png",25,5);





//$pdf->SetFont('Times','B',14);


 // $pdf->SetDash(2,2);
//$pdf->Line(165,70,250,70);
 // $pdf->SetFont('Times','BI',10);
 //$pdf->Text(100,80,"is a bonafide student of ");
// $pdf->SetFont('Times','BI',14);
//  $pdf->Text(180,80,$branch." ".$sem);

 

//$pdf->Line(172,100,270,100);
//$pdf->SetXY(172,95.5);
//$pdf->SetXY(101,101);
//$x=GetX();
//$pdf->SetFont('Times','BI',14);
//$pdf->setLeftMargin(99);
//$pdf->Write(7,$purpose);
// ................................................................................................................... ");

	// $htmlTable='<TABLE>
//<TR>
//<TD></TD></TABLE>';
//$pdf->WriteHTML2("<br><br><br>$htmlTable");
	//$Y_Fields_Name_position = 20;
//Table position, under Fields Name
//$Y_Table_Position = 26;

			//$pdf=new PDF_MC_Table();
//$pdf->AddPage();
//$pdf->SetDash(2,2);
//$pdf->Line(85,1,85,200);
//$pdf->LineGraph(190,100);

 // $pdf->Output("CC\\CC_".$adno.".pdf",'F');
   // $pdf->SubPopen("new\\TC_".$dt.".pdf",shell=True);

$pdf->Output();

   // header("location: ".$index.php);
   
 }
?>


