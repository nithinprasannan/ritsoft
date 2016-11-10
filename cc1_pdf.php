<?php
error_reporting(0);
require('force_justify.php');
/*$cc_no="";
$adno="";
$name="Nithin Prasannan";
$dte="2016-08-21";
$completion="2016-07-24";
$course="Barch";
$specialization="Archetecture";
$university="Mahatma Gandhi University";
$month="April";
$character="Good"; */
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

$pdf=new PDF();

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
$pdf->Text(47,96,"Course & Conduct Certificate");


$pdf->SetTextColor(255,0,0);
$pdf->SetFont('Arial','',12);
$pdf->Text(20,79,"CC No : ".$cc_no);
$pdf->Text(150,79,"Admission No : ".$adno);

//Set the interior cell margin to 1cm
$pdf->cMargin=15;
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times','I',17); 

/* $pdf->Text(180,105,"0");
$pdf->Text(206,105,"0");
$pdf->Text(50,120,"22");
$a="This is to certify that ";
$b=strlen($a);
$c=strlen($name);
$d=$b+$c+35;
$e=180-$d;
$pdf->Text(30,120,"".$e);
 $pdf->Text($e,120,"This is to certify that "); */
 $pdf->SetXY(20,110);
 $pdf->Text(21,115," ");
 $pdf->Ln();
 $pdf->SetXY(5,115);
// $pdf->SetFont('Times','BI',15);

$pdf->MultiCell(190,6,"This is to certify that ".$name,0,'R',0);
$pdf->SetFont('Times','I',17); 
 $pdf->SetXY(5,117);
 $pdf->Ln();
 if($sex == 'M')
 {
$pdf->MultiCell(190,10,"was a student of this institution from ".$dte." to ".$completion." and he has completed the prescribed course of study in ".$course." - ".$specialization." and appeared for the Final Year Examination conducted by ".$university." during ".$month." his conduct and character during the period were ".$character,0,'FJ',0); 
 }
 else
 {
$pdf->MultiCell(190,10,"was a student of this institution from ".$dte." to ".$completion." and she has completed the prescribed course of study in ".$course." - ".$specialization." and appeared for the Final Year Examination conducted by ".$university." during ".$month." her conduct and character during the period were ".$character,0,'FJ',0); 
 }
$pdf->SetFont('Arial','',12);
$issuedate=date('Y-m-d');	 
$pdf->Text(30,250,"Date : ".$issuedate);
$pdf->Text(150,250,"Principal");


$pdf->Output();
}
?>
