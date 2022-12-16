<?php

$conn = new mysqli('localhost', 'root', '', 'ladctracking');

if(ISSET($_GET['id']))
require_once("connection.php");
require_once('fpdf.php');
require_once('mysql_table.php');
require_once ('mc_table.php');
$id = $_GET['id'];




$select="SELECT * FROM trailerlog WHERE trindex ='$id'";
$result = $conn->query($select);






class PDF extends PDF_MySQL_Table
{
// Page header
function Header()
{
        $this->SetFont('Arial','B',13);
    $this->Cell(15);

     $this->Cell(25,8,'Gate Pass' ,1,0,'C');
    $this->SetFont('Arial','B',13);
    $this->Ln(8);
    //Ensure table header is output
    
    parent::Header();
}
}







$pdf=new PDF();
$pdf->AddPage();


$pdf->SetLeftMargin(25);

// Then put a blue underlined link

// Centered text in a framed 20*10 mm cell and line brea
$pdf->SetFont('Arial','B', 16);
$pdf->Cell(160,8,'INBOUND',1,0,'C');
$pdf->Ln(8);

$pdf->SetFont('Arial','B', 14);

$pdf->Cell(40,8,'Gate Pass Num',1,0,'C');
$pdf->Cell(60,8,'Date In',1,0,'C');
$pdf->Cell(60,8,'Time In',1,0,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Ln(8);
while($row = $result->fetch_object()){
    
    
    $id = $row->trindex;
  $date = $row->date;
  $time = $row->time;
  $carrier = $row->carrier;
  $tractor = $row->tractor;
  $trailer = $row->trailer;
  $driver = $row->drivername;
    $purpose = $row->purpose;
$seal = $row->seal;
  $eol = $row->eol;
  $guardname = $row->guardname;
  $exitloadstatus = $row->exitloadstatus;
  $trailerout = $row->trailerout;
  $outboundguard = $row->outboundguard;
  $sealn = $row->sealn;
  $traileroutnum = $row->traileroutnum;

    
$pdf->Cell(40,8,$id,1,0,'C');
$pdf->Cell(60,8,$date,1,0,'C');
$pdf->Cell(60,8,$time,1,0,'C');
    
    $pdf->SetFont('Arial','B', 14);

$pdf->Ln(8);
$pdf->Cell(160,8,'Carrier',1,0,'C');

$pdf->SetFont('Arial','', 12);

$pdf->Ln(8);
$pdf->Cell(160,8,$carrier,1,0,'C');
$pdf->Ln(8);

     $pdf->SetFont('Arial','B', 14);
$pdf->Cell(80,8,'Tractor Num',1,0,'C');
    $pdf->Cell(80,8,'Driver Name',1,0,'C');
$pdf->Ln(8);
    
    $pdf->SetFont('Arial','', 12);

    $pdf->Cell(80,8,$tractor,1,0,'C');
    $pdf->Cell(80,8,$driver,1,0,'C');



$pdf->Ln(8);

$pdf->SetFont('Arial','B', 14);
$pdf->Cell(80,8,'Purpose',1,0,'C');
$pdf->Cell(80,8,'Inbound Status',1,0,'C');
$pdf->Ln(8);
$pdf->SetFont('Arial','', 14);
$pdf->Cell(80,8,$purpose,1,0,'C');
$pdf->Cell(80,8,$eol,1,0,'C');
$pdf->Ln(8);

    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(80,8,'Trailer In Num',1,0,'C');

    
$pdf->Cell(80,8,'Seal #',1,0,'C');
$pdf->Ln(8);

     $pdf->SetFont('Arial','', 12);
$pdf->Cell(80,8,$trailer,1,0,'C');

    $pdf->Cell(80,8,$seal,1,0,'C');
$pdf->Ln(8);
    
$pdf->SetFont('Arial','B', 14);
$pdf->Cell(160,8,'Inbound Guard Name',1,0,'C');
$pdf->Ln(8);

     $pdf->SetFont('Arial','', 12);

    $pdf->Cell(160,8,$guardname,1,0,'C');
$pdf->Ln(10);
    
$pdf->SetFont('Arial','B', 16);
$pdf->Cell(160,8,'OUTBOUND',1,0,'C');
$pdf->Ln(8);
    
$pdf->SetFont('Arial','B', 14);
$pdf->Cell(80,8,'Outbound Status',1,0,'C');
$pdf->Cell(80,8,'Tractor Out Date/Time',1,0,'C');
$pdf->Ln(8);

     $pdf->SetFont('Arial','', 12);

    $pdf->Cell(80,8,$exitloadstatus,1,0,'C');
$pdf->Cell(80,8,$trailerout,1,0,'C');
$pdf->Ln(8);
    

$pdf->SetFont('Arial','B', 14);
    $pdf->Cell(80,8,'Trailer Out Num',1,0,'C');

    
$pdf->Cell(80,8,'Seal #',1,0,'C');
$pdf->Ln(8);

     $pdf->SetFont('Arial','', 12);
$pdf->Cell(80,8,$traileroutnum,1,0,'C');

    $pdf->Cell(80,8,$sealn,1,0,'C');
$pdf->Ln(8);
    $pdf->SetFont('Arial','B', 14);
$pdf->Cell(160,8,'Outbound Guard Name',1,0,'C');
$pdf->Ln(8);

     $pdf->SetFont('Arial','', 12);

    $pdf->Cell(160,8,$outboundguard,1,0,'C');
$pdf->Ln(10);
}


$pdf->Output();

   ;


$pdf->Output();
?>