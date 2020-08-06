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
		$this->Cell(276,10,'All Available Tag Data',0,0,'C');
		$this->Ln(20);
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	function headerTable(){
		$this->SetFont('Times','B',12);
		$this->Cell(20,10,'ID',1,0,'C');
		$this->Cell(50,10,'Tag Number',1,0,'C');
		$this->Cell(50,10,'Asset',1,0,'C');
		$this->Cell(50,10,'Serial Number',1,0,'C');
		$this->Cell(50,10,'Department',1,0,'C');
		$this->Cell(50,10,'Date Added',1,0,'C');
		$this->Ln();
	}
	function viewTable($db){
		$this->SetFont('Times','',12);
		
		
		
		$sql = "SELECT * From tags";
		$result = $db-> query($sql);
		while ($data = mysqli_fetch_object($result)){
			$this->Cell(20,10,$data->id,1,0,'C');
			$this->Cell(50,10,$data->tag_num,1,0,'C');
			$this->Cell(50,10,$data->asset,1,0,'C');
			$this->Cell(50,10,$data->snum,1,0,'C');
			$this->Cell(50,10,$data->department,1,0,'C');
			$this->Cell(50,10,$data->add_date,1,0,'C');
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