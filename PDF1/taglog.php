<?php
require('fpdf.php');

$db = mysqli_connect("localhost", "id12176797_assets","newagetech", "id12176797_espconnect");


class PDF extends FPDF{
	function header(){
		$this->Image('logo.png',10,6);
		$this->SetFont('Arial','B',14);
		$this->Cell(276,5,'Asset Management System',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(276,10,'All Tag Location Data',0,0,'C');
		$this->Ln(20);
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	function headerTable(){
		$this->SetFont('Times','B',12);
		$this->Cell(30,10,'ID',1,0,'C');
		$this->Cell(50,10,'Tag Number',1,0,'C');
		$this->Cell(50,10,'Asset',1,0,'C');
		$this->Cell(60,10,'Location Detected',1,0,'C');
		$this->Cell(60,10,'Date Detected',1,0,'C');
		$this->Ln();
	}
	function viewTable($db){
		$this->SetFont('Times','',12);
		
		
		
		$sql = "SELECT * From tag_log";
		$result = $db-> query($sql);
		while ($data = mysqli_fetch_object($result)){
			$this->Cell(30,10,$data->id,1,0,'C');
			$this->Cell(50,10,$data->tag_num,1,0,'C');
			$this->Cell(50,10,$data->asset,1,0,'C');
			$this->Cell(60,10,$data->location,1,0,'C');
			$this->Cell(60,10,$data->date,1,0,'C');
			$this->Ln();
		}
	}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();