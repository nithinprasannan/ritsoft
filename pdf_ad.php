<?php
ob_start();
session_start();
error_reporting(0);
$tp_no = $_SESSION['acc'];
// $tp_no="";
include "dboperation.php";
$obj5=new dboperation();
	$query5="SELECT * FROM temp WHERE temp_no = '$tp_no' ";	
	$result5=$obj5->selectdata($query5);
	while($row=$obj5->fetch($result5))
	{ 
	 
	    $co=("$row[1]");
		$sp=("$row[2]");
		$bc=("$row[3]");
		$todays_date=("$row[4]");
		$na=("$row[5]");
		$db=("$row[6]");
		$sx=("$row[7]");
		$rlgn=("$row[8]");
		$cst=("$row[9]");
		$mob=("$row[10]");
		$mail=("$row[11]");
		$nagd=("$row[12]");
		$rel=("$row[13]");
		$occpn=("$row[14]");
		$inc=("$row[15]");
		$adrs=("$row[16]");
		$phno=("$row[17]");
		$csem=("$row[34]");
		$rlno=("$row[19]");
		$rnk=("$row[20]");
		$qta=("$row[21]");
		$scl1=("$row[22]");
		$rgno1=("$row[23]");
		$brd1=("$row[24]");
		$scl2=("$row[25]");
		$rgno2=("$row[26]");
		$brd2=("$row[27]");
		$chnc=("$row[28]");
		$nalast=("$row[29]");
		$tot=("$row[30]");
		$phy=("$row[31]");
		$chem=("$row[32]");
		$math=("$row[33]");
		$bld=("$row[36]");
		$gate=("$row[37]");
	  
	}
  require('mc_table.php');
// $co="MCA";
$pdf=new PDF_HTML();
$pdf->PDF('P','mm','A4');
$pdf->AliasNbPages();
//$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();
$pdf->Image('images/rcrd.jpg', 0, 0, $pdf->w, $pdf->h);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',12); 
$pdf->Text(60,25,"RAJIV GANDHI INSTITUTE OF TECHNOLOGY");
$pdf->SetFont('Arial','B',10); 
$pdf->Text(88,30,"STUDENT RECORD");

$pdf->SetFont('Arial','B',8); 
$pdf->Text(18,35,"PERSONAL DATA");

$pdf->SetFont('Times','',10);
$pdf->Text(20,40,"Temperory No : ".$tp_no);
$pdf->SetFont('Times','',9);

$pdf->Text(175,42,"Affix Photo");
$pdf->SetFont('Times','',10);

$pdf->Text(20,45,"1. Name of candidate");
$pdf->Text(100,45,": ".$na);

$pdf->Text(20,50,"2. Date of Birth in Christian ERA");
$pdf->Text(100,50,": ".$db);

$pdf->Text(20,55,"3. Gender");
$pdf->Text(100,55,": ".$sx);

$pdf->Text(20,60,"4. Blood Group");
$pdf->Text(100,60,": ".$bld);

$pdf->Text(20,65,"5. Religin / Caste");
$pdf->Text(100,65,": ".$rlgn." / ".$cst);

$pdf->Text(20,70,"6. Email Address");
$pdf->Text(100,70,": ".$mail);

$pdf->Text(23,75,"(a)  Name of Parent/Guardian");
$pdf->Text(100,75,": ".$nagd);

$pdf->Text(23,80,"(b)  Permanent address of Parent/Guardian");
$pdf->Text(100,80,": ".$adrs);

$pdf->Text(28,90,"Mobile No");
$pdf->Text(100,90,": ".$mob);

$pdf->Text(28,95,"Telephone No");
$pdf->Text(100,95,": ".$phno);

$pdf->Text(23,100,"(c)  Relations with the pupil");
$pdf->Text(100,100,": ".$rel);

$pdf->Text(23,105,"(d)  Annual income of Parent/Guardian");
$pdf->Text(100,105,": ".$inc);

$pdf->Text(20,110,"7. Course / Specialisation");
$pdf->Text(100,110,": ".$co." / ".$sp);

$pdf->Text(23,115,"(a)  Entance roll No");
$pdf->Text(100,115,": ".$rlno);

$pdf->Text(23,120,"(b)  Entrance rank No");
$pdf->Text(100,120,": ".$rnk);

$pdf->Text(23,125,"(c)  Quota");
$pdf->Text(100,125,": ".$qta);


if($co == 'Btech') 
{

// $pdf->Text(23,130,"(d)  Gate score");
$pdf->SetFont('Arial','B',8); 
$pdf->Text(18,135,"ACADEMIC DATA");

$pdf->SetFont('Times','',10);
$pdf->Text(20,140,"8. (a)  Name of institution studied at SSLC");
$pdf->Text(100,140,": ".$scl1);

$pdf->Text(23,145,"(b)  Reg. No. and year of passing the exam");
$pdf->Text(100,145,": ".$rgno1);

$pdf->Text(23,150,"(c)  Name of the Board / university");
$pdf->Text(100,150,": ".$brd1);

$pdf->Text(20,155,"9. (a)  Name of institution of qualifying exam passed");
$pdf->Text(100,155,": ".$scl2);

$pdf->Text(23,160,"(b)  Reg. No. and year of passing the exam");
$pdf->Text(100,160,": ".$rgno2);

$pdf->Text(23,165,"(c)  Name of the Board / university");
$pdf->Text(100,165,": ".$brd2);

$pdf->Text(20,170,"10. No. of chances for qualifying exam");
$pdf->Text(100,170,": ".$chnc);

$pdf->Text(20,175,"11. Name of Institution last studied");
$pdf->Text(100,175,": ".$nalast);

$pdf->Text(20,180,"12. Total marks obtained for the qualifying exam");
$pdf->Text(100,180,": ".$tot);

$pdf->Text(20,185,"13. Marks obtained for  (a)  Physics");
$pdf->Text(100,185,": ".$phy);

$pdf->Text(51,190,"(b)  Chemistry");
$pdf->Text(100,190,": ".$chem);

$pdf->Text(51,195,"(c)  Mathematics");
$pdf->Text(100,195,": ".$math);


$pdf->SetFont('Arial','B',8); 
$pdf->Text(90,200,"DECLARATION");
$pdf->SetFont('Times','',10);
$pdf->Text(50,205,"The information given above are true in the best of my knowledge and belief.");
$pdf->Text(20,210,"Signature of parent/guardian");
$pdf->Text(140,210,"Signature of student");

$pdf->Text(75,215,"DETAILES OF DOCUMENTS ATTACHED");

$pdf->Text(20,222,"1. SSLC/SSC pass certificate / marks statement & proof of Date of Birth.");
$pdf->Text(20,227,"2. PDC / +2 / VHSE /DIPLOMA pass certificate / marks statement.");
$pdf->Text(20,232,"3. Transfer certificate and conduct certificate.");
$pdf->Text(20,237,"4. Medical certificate");
$pdf->Text(20,242,"5. Selection Memo.");

$pdf->Text(125,222,"6. Admit Card(Hall ticket).");
$pdf->Text(125,227,"7. Mark list.");
$pdf->Text(125,232,"8. Fee Recipient (from bank).");
$pdf->Text(125,237,"9. Migration certificate");
$pdf->Text(125,242,"10. Affidavit by the Student & Parent.");
$pdf->Text(35,247,"The candidates are directed to keep with them, attested true copies of certificates and other relevant records before");
$pdf->Text(20,252,"submitting for admission.");

$pdf->SetFont('Arial','B',8); 
$pdf->Text(90,257,"FOR OFFICE USE ONLY");
$pdf->SetFont('Times','',10);
$pdf->Text(35,265,"Admission No.");
$pdf->Text(145,265,"Fee Receipt No.");

$pdf->Text(90,270,"May be admitted");

$pdf->Text(35,282,"Signature of the verifier");
$pdf->Text(145,282,"Principal");
}

if($co == 'Barch') 
{

// $pdf->Text(23,130,"(d)  Gate score");
$pdf->SetFont('Arial','B',8); 
$pdf->Text(18,135,"ACADEMIC DATA");

$pdf->SetFont('Times','',10);
$pdf->Text(20,140,"8. (a)  Name of institution studied at SSLC");
$pdf->Text(100,140,": ".$scl1);

$pdf->Text(23,145,"(b)  Reg. No. and year of passing the exam");
$pdf->Text(100,145,": ".$rgno1);

$pdf->Text(23,150,"(c)  Name of the Board / university");
$pdf->Text(100,150,": ".$brd1);

$pdf->Text(20,155,"9. (a)  Name of institution of qualifying exam passed");
$pdf->Text(100,155,": ".$scl2);

$pdf->Text(23,160,"(b)  Reg. No. and year of passing the exam");
$pdf->Text(100,160,": ".$rgno2);

$pdf->Text(23,165,"(c)  Name of the Board / university");
$pdf->Text(100,165,": ".$brd2);

$pdf->Text(20,170,"10. No. of chances for qualifying exam");
$pdf->Text(100,170,": ".$chnc);

$pdf->Text(20,175,"11. Name of Institution last studied");
$pdf->Text(100,175,": ".$nalast);

$pdf->Text(20,180,"12. Total marks obtained for the qualifying exam");
$pdf->Text(100,180,": ".$tot);

$pdf->Text(20,185,"13. Marks obtained for  (a)  Physics");
$pdf->Text(100,185,": ".$phy);

$pdf->Text(51,190,"(b)  Chemistry");
$pdf->Text(100,190,": ".$chem);

$pdf->Text(51,195,"(c)  Mathematics");
$pdf->Text(100,195,": ".$math);


$pdf->SetFont('Arial','B',8); 
$pdf->Text(90,200,"DECLARATION");
$pdf->SetFont('Times','',10);
$pdf->Text(50,205,"The information given above are true in the best of my knowledge and belief.");
$pdf->Text(20,210,"Signature of parent/guardian");
$pdf->Text(140,210,"Signature of student");

$pdf->Text(75,215,"DETAILES OF DOCUMENTS ATTACHED");

$pdf->Text(20,222,"1. SSLC/SSC pass certificate / marks statement & proof of Date of Birth.");
$pdf->Text(20,227,"2. PDC / +2 / VHSE /DIPLOMA pass certificate / marks statement.");
$pdf->Text(20,232,"3. Transfer certificate and conduct certificate.");
$pdf->Text(20,237,"4. Medical certificate");
$pdf->Text(20,242,"5. Selection Memo.");

$pdf->Text(125,222,"6. Admit Card(Hall ticket).");
$pdf->Text(125,227,"7. Mark list.");
$pdf->Text(125,232,"8. Fee Recipient (from bank).");
$pdf->Text(125,237,"9. Migration certificate");
$pdf->Text(125,242,"10. Affidavit by the Student & Parent.");
$pdf->Text(35,247,"The candidates are directed to keep with them, attested true copies of certificates and other relevant records before");
$pdf->Text(20,252,"submitting for admission.");

$pdf->SetFont('Arial','B',8); 
$pdf->Text(90,257,"FOR OFFICE USE ONLY");
$pdf->SetFont('Times','',10);
$pdf->Text(35,265,"Admission No.");
$pdf->Text(145,265,"Fee Receipt No.");

$pdf->Text(90,270,"May be admitted");

$pdf->Text(35,282,"Signature of the verifier");
$pdf->Text(145,282,"Principal");
}
if($co == 'Mtech') 
{

$pdf->Text(23,130,"(d)  Gate score");
$pdf->Text(100,130,": ".$gate);

$pdf->SetFont('Arial','B',8); 
$pdf->Text(18,135,"ACADEMIC DATA");

$pdf->SetFont('Times','',10);
$pdf->Text(20,140,"8. (a)  Name of institution studied at SSLC");
$pdf->Text(100,140,": ".$scl1);

$pdf->Text(23,145,"(b)  Reg. No. and year of passing the exam");
$pdf->Text(100,145,": ".$rgno1);

$pdf->Text(23,150,"(c)  Name of the Board / university");
$pdf->Text(100,150,": ".$brd1);

$pdf->Text(20,155,"9. (a)  Name of institution of qualifying exam passed");
$pdf->Text(100,155,": ".$scl2);

$pdf->Text(23,160,"(b)  Reg. No. and year of passing the exam");
$pdf->Text(100,160,": ".$rgno2);

$pdf->Text(23,165,"(c)  Name of the Board / university");
$pdf->Text(100,165,": ".$brd2);

$pdf->Text(20,170,"10. No. of chances for qualifying exam");
$pdf->Text(100,170,": ".$chnc);

$pdf->Text(20,175,"11. Name of Institution last studied");
$pdf->Text(100,175,": ".$nalast);

$pdf->Text(20,180,"12. Total marks obtained for the qualifying exam");
$pdf->Text(100,180,": ".$tot);

/* $pdf->Text(20,185,"13. Marks obtained for  (a)  Physics");
$pdf->Text(51,190,"(b)  Chemistry");
$pdf->Text(51,195,"(c)  Mathematics"); */

$pdf->SetFont('Arial','B',8); 
$pdf->Text(90,185,"DECLARATION");
$pdf->SetFont('Times','',10);
$pdf->Text(50,190,"The information given above are true in the best of my knowledge and belief.");
$pdf->Text(20,195,"Signature of parent/guardian");
$pdf->Text(140,195,"Signature of student");

$pdf->Text(75,200,"DETAILES OF DOCUMENTS ATTACHED");

$pdf->Text(20,207,"1. SSLC/SSC pass certificate / marks statement & proof of Date of Birth.");
$pdf->Text(20,214,"2. PDC / +2 / VHSE /DIPLOMA pass certificate / marks statement.");
$pdf->Text(20,221,"3. Transfer certificate and conduct certificate.");
$pdf->Text(20,228,"4. Medical certificate");
$pdf->Text(20,235,"5. Selection Memo.");

$pdf->Text(125,207,"6. Admit Card(Hall ticket).");
$pdf->Text(125,214,"7. Mark list.");
$pdf->Text(125,221,"8. Fee Recipient (from bank).");
$pdf->Text(125,228,"9. Migration certificate");
$pdf->Text(125,235,"10. Affidavit by the Student & Parent.");
$pdf->Text(35,240,"The candidates are directed to keep with them, attested true copies of certificates and other relevant records before");
$pdf->Text(20,245,"submitting for admission.");

$pdf->SetFont('Arial','B',8); 
$pdf->Text(90,250,"FOR OFFICE USE ONLY");
$pdf->SetFont('Times','',10);
$pdf->Text(35,258,"Admission No.");
$pdf->Text(145,258,"Fee Receipt No.");

$pdf->Text(90,263,"May be admitted");

$pdf->Text(35,275,"Signature of the verifier");
$pdf->Text(145,275,"Principal");
}
if($co == 'MCA') 
{

// $pdf->Text(23,130,"(d)  Gate score");
$pdf->SetFont('Arial','B',8); 
$pdf->Text(18,135,"ACADEMIC DATA");

$pdf->SetFont('Times','',10);
$pdf->Text(20,140,"8. (a)  Name of institution studied at SSLC");
$pdf->Text(100,140,": ".$scl1);

$pdf->Text(23,145,"(b)  Reg. No. and year of passing the exam");
$pdf->Text(100,145,": ".$rgno1);

$pdf->Text(23,150,"(c)  Name of the Board / university");
$pdf->Text(100,150,": ".$brd1);

$pdf->Text(20,155,"9. (a)  Name of institution of qualifying exam passed");
$pdf->Text(100,155,": ".$scl2);

$pdf->Text(23,160,"(b)  Reg. No. and year of passing the exam");
$pdf->Text(100,160,": ".$rgno2);

$pdf->Text(23,165,"(c)  Name of the Board / university");
$pdf->Text(100,165,": ".$brd2);

$pdf->Text(20,170,"10. No. of chances for qualifying exam");
$pdf->Text(100,170,": ".$chnc);

$pdf->Text(20,175,"11. Name of Institution last studied");
$pdf->Text(100,175,": ".$nalast);

$pdf->Text(20,180,"12. Total marks obtained for the qualifying exam");
$pdf->Text(100,180,": ".$tot);
/* $pdf->Text(20,185,"13. Marks obtained for  (a)  Physics");
$pdf->Text(51,190,"(b)  Chemistry");
$pdf->Text(51,195,"(c)  Mathematics"); */

$pdf->SetFont('Arial','B',8); 
$pdf->Text(90,185,"DECLARATION");
$pdf->SetFont('Times','',10);
$pdf->Text(50,190,"The information given above are true in the best of my knowledge and belief.");
$pdf->Text(20,195,"Signature of parent/guardian");
$pdf->Text(140,195,"Signature of student");

$pdf->Text(75,200,"DETAILES OF DOCUMENTS ATTACHED");

$pdf->Text(20,207,"1. SSLC/SSC pass certificate / marks statement & proof of Date of Birth.");
$pdf->Text(20,214,"2. PDC / +2 / VHSE /DIPLOMA pass certificate / marks statement.");
$pdf->Text(20,221,"3. Transfer certificate and conduct certificate.");
$pdf->Text(20,228,"4. Medical certificate");
$pdf->Text(20,235,"5. Selection Memo.");

$pdf->Text(125,207,"6. Admit Card(Hall ticket).");
$pdf->Text(125,214,"7. Mark list.");
$pdf->Text(125,221,"8. Fee Recipient (from bank).");
$pdf->Text(125,228,"9. Migration certificate");
$pdf->Text(125,235,"10. Affidavit by the Student & Parent.");
$pdf->Text(35,240,"The candidates are directed to keep with them, attested true copies of certificates and other relevant records before");
$pdf->Text(20,245,"submitting for admission.");

$pdf->SetFont('Arial','B',8); 
$pdf->Text(90,250,"FOR OFFICE USE ONLY");
$pdf->SetFont('Times','',10);
$pdf->Text(35,258,"Admission No.");
$pdf->Text(145,258,"Fee Receipt No.");

$pdf->Text(90,263,"May be admitted");

$pdf->Text(35,275,"Signature of the verifier");
$pdf->Text(145,275,"Principal");
}



/*$pdf->SetTextColor(0,0,255);


$issuedate=date('Y-m-d');	 


 */






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

// $pdf->Output("TC\\TC_".$adno.".pdf",'F');


$pdf->Output();

   // header("location: ".$index.php);
?>


