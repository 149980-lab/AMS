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
		$this->Cell(276,10,'Tag Data',0,0,'C');
		$this->Ln(20);
		
		//spacing
		$this->Cell(276,10,'',0,1,'C');
		
		
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	function headerTable($db){
		$this->SetFont('Times','B',12);
		

		$this->Cell(70,10,'Tag Number:',0,0,'C');
		$sqli = "SELECT * From tags WHERE id='2' ";
		$res = $db-> query($sqli);
		while ($data = mysqli_fetch_object($res)){
			$this->Cell(20,10,$data->tag_num,0,1,'L');
			$tg = $data->tag_num ;
		}

		$this->Cell(70,10,'Asset:',0,0,'C');
		$sqli = "SELECT * From tags WHERE id='2' ";
		$res = $db-> query($sqli);
		while ($data = mysqli_fetch_object($res)){
			$this->Cell(20,10,$data->asset,0,1,'L');
		}
			

		$this->Cell(70,10,'Serial Number:',0,0,'C');
		$sqli = "SELECT * From tags WHERE id='2' ";
		$res = $db-> query($sqli);
		while ($data = mysqli_fetch_object($res)){
			$this->Cell(20,10,$data->snum,0,1,'L');
		}

		$this->Cell(70,10,'Department:',0,0,'C');
		$sqli = "SELECT * From tags WHERE id='2' ";
		$res = $db-> query($sqli);
		while ($data = mysqli_fetch_object($res)){
			$this->Cell(20,10,$data->department,0,1,'L');
		}

		$this->Cell(70,10,'Description:',0,0,'C');
		$sqli = "SELECT * From tags WHERE id='2' ";
		$res = $db-> query($sqli);
		while ($data = mysqli_fetch_object($res)){
			$this->Cell(20,10,$data->description,0,1,'L');
		}
		
		$this->Cell(276,20,'',0,1,'C');
		
		$this->Cell(276,10,'Location Data:',0,1,'L');
		$this->Cell(30,10,'ID',1,0,'C');
		$this->Cell(50,10,'Tag Number',1,0,'C');
		$this->Cell(50,10,'Asset',1,0,'C');
		$this->Cell(60,10,'Location Detected',1,0,'C');
		$this->Cell(60,10,'Date Detected',1,0,'C');
		$this->Ln();
	}
	
	function viewTable($db){
		$this->SetFont('Times','',12);
		$sqli = "SELECT * From tags WHERE id='2' ";
		$res = $db-> query($sqli);
		while ($data = mysqli_fetch_object($res)){
			$tg = $data->tag_num ;
		}

		$sql = "SELECT * From tag_log WHERE tag_num='$tg' ";
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
$pdf->headerTable($db);
$pdf->viewTable($db);
$pdf->Output();