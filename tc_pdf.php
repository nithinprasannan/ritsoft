<?php
/*if(isset($_POST['submit2']))
{
$_POST['tc_no']="";
$_POST['adno']="";
$_POST['name']="";
$_POST['dob']="";
$_POST['caste']='';
$_POST['dte']="";
$_POST['class']="";
$_POST['leaving']="";
$_POST['relive']="";
$_POST['higher']="";
$_POST['fee']='';
$_POST['concession']="";
$_POST['application']="";
$_POST['issue']="";
$_POST['reason']="";
$_POST['institution']="";
echo "<script language='JavaScript' type='text/JavaScript'>
window.location='actioncert.php';
</script>
";
   } */

if(isset($_POST['submit']))
{
	    $tc_no=$_POST['tc_no'];
		$adno=$_POST['adno'];
		$name=$_POST['name'];
		$dob=$_POST['dob'];
		$caste=$_POST['caste'];
		$todays_date=date('Y-m-d');
		$dte=$_POST['dte'];
		$class=$_POST['class'];
		$leaving=$_POST['leaving'];
		$relive=$_POST['relive'];
		$higher=$_POST['higher'];
		$fee=$_POST['fee'];
		$concession=$_POST['concession'];
		$application=$_POST['application'];
		$issue=$_POST['issue'];
		$reason=$_POST['reason'];
		$institution=$_POST['institution'];
		
include "dboperation.php";
$obj=new dboperation();
$q="INSERT INTO `tc` (`tc_no`, `adm_no`, `tc_date`, `reason`) VALUES ('$tc_no', '$adno', '$issue', '$reason')";$obj->Ex_query($q); 

/*   $name="Nithin";
   $dt="223";
  $adm="1";
    $branch="mca";
	 $sem="s2";
	   $year="2016";
	   $purpose="for admission of higher course";
  
$d=date('d-m-Y');
  $s=date("d-m-Y",strtotime($d));
  
 $p=wordwrap($purpose,8,"\n",true); */
  require('mc_table.php');
 
$pdf=new PDF_HTML();
$pdf->PDF('P','mm','A4');
$pdf->AliasNbPages();
//$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();
$pdf->Image('images/frame1.jpg', 0, 0, $pdf->w, $pdf->h);

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
$pdf->Text(65,87,"Transfer Certificate");

$pdf->SetTextColor(255,0,0);
$pdf->SetFont('Arial','',10);
$pdf->Text(20,77,"TC No : ".$tc_no);
$pdf->Text(150,77,"Admission No : ".$adno);

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',10);
$pdf->Text(27,103,"1. Name of student");
$pdf->Text(100,103,": ".$name);

$pdf->Text(27,113,"2. Date of birth");
$pdf->Text(100,113,": ".$dob);

$pdf->Text(27,123,"3. Caste and religion");
$pdf->Text(100,123,": ".$caste);

$pdf->Text(27,133,"4. Date of admission");
$pdf->Text(100,133,": ".$dte);

$pdf->Text(27,143,"5. Class to which admitted");
$pdf->Text(100,143,": ".$class);

$pdf->Text(27,153,"6. Date of leaving");
$pdf->Text(100,153,": ".$leaving);

$pdf->Text(27,163,"7. Class from which relieved");
$pdf->Text(100,163,": ".$relive);

$pdf->Text(27,173,"8. Whether qualified for promotion to");
$pdf->Text(32,178,"   higher class");
$pdf->Text(100,173,": ".$higher);

$pdf->Text(27,183,"9. Whether all fees and other dues");
$pdf->Text(33,188,"have been paid");
$pdf->Text(100,183,": ".$fee);

$pdf->Text(27,193,"10. Whether the student was receipt");
$pdf->Text(33,198,"of fee concession");
$pdf->Text(100,193,": ".$concession);

$pdf->Text(27,203,"11. Date of application of TC");
$pdf->Text(100,203,": ".$application);

$pdf->Text(27,213,"12. Date of issue of TC");
$pdf->Text(100,213,": ".$issue);

$pdf->Text(27,223,"13. Reason for leaving");
$pdf->Text(100,223,": ".$reason);

$pdf->Text(27,233,"14. Institution to which the student");
$pdf->Text(33,238,"intends proceeding");
$pdf->Text(100,233,": ".$institution);


$issuedate=date('Y-m-d');	 


$pdf->Text(30,250,"Verified By");
$pdf->Text(30,260,"Clerk");
$pdf->Text(70,260,"Superintendent");
$pdf->Text(30,268,"Date : ".$issuedate);
$pdf->Text(150,270,"Principal");






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
   // $pdf->SubPopen("new\\TC_".$dt.".pdf",shell=True);

$pdf->Output();

   // header("location: ".$index.php);
   
}
?>


