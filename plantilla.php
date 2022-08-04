<?php
require('fpdf.php');
setlocale(LC_TIME, "ES_MX");
class PDF extends FPDF
{

    function Header()
{
	// Logo
    $this->Image('hotpay3.png',16,10,30);
	// Arial bold 15
	$this->SetFont('Times','B',15);
	// Line break
	$this->Ln(20);
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('times','I',8);
	// Page number
	$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
}

function prueba($nombre_archivo,$nombre_usuario,$fecha,$monto,$empresa,$saldo_empresa,$concepto,$saldo_tarjeta,$ruta,$tarjeta)
{
	$pdf = new PDF();
	$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
	$fecha_hora=explode(" ",$fecha);
	$fecha_separada=explode("-",$fecha_hora[0]);
	
	$new_fecha_spanish=$diassemana[date('w')]." ".date($fecha_separada[2])." de ".$meses[$fecha_separada[1]-1]. " de ".date('Y') ;
	$Nueva_Fecha = date("d-m-Y", strtotime($fecha_hora[0]));				
	$new_fecha = strftime("%A, %d de %B del %Y", strtotime($Nueva_Fecha));
	$fecha_larga=$new_fecha_spanish.' '. date('h:i:s A', strtotime($fecha_hora[1])).' Centro de Mexico';
	
	$fecha_larga=utf8_encode($fecha_larga);
	$title = 'REPORTE DE '.$concepto;
	$pdf->SetTitle($title);
	$pdf->setMargins(15, 0, 11.7);
	$pdf->AddPage();
	$pdf->SetFont('Times','B',9);
	$pdf->Ln(15);
	$pdf->Cell(170,10,$fecha_larga,0,0,'R');
    $pdf->SetFont('Times','B',12);
    $pdf->Ln(25);

	if($concepto=='FONDEO A TARJETA')
	{	
	$pdf->Cell(20,10,'PERSONA QUE REALIZA EL FONDEO',0,0,'');
	$pdf->Ln(10);
	$pdf->Cell(10,10,$nombre_usuario,0,0,'L');
	$pdf->Ln(15);
	$pdf->Cell(20,10,'EMPRESA',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,$empresa,0,0,'L');
	$pdf->Ln(15);
	$pdf->Cell(10,10,'TARJETA',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,$tarjeta,0,0,'L');
	$pdf->Ln(15);
	$pdf->Cell(20,10,'MONTO DEL FONDEO',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,number_format($monto,2,'.',','),0,0,'L');
	$pdf->Ln(15);
	$pdf->Cell(10,10,'SALDO DE LA TARJETA DESPUES DEL FONDEO',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,number_format(($saldo_tarjeta+$monto),2,'.',','),0,0,'L');
	$pdf->Ln(15);
	$pdf->Cell(10,10,'SALDO DE LA EMPRESA DESPUES DEl FONDEO',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,number_format($saldo_empresa,2,'.',','),0,0,'L');
	$pdf->Ln(15);
	$pdf->Cell(10,10,'CONCEPTO',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,$concepto,0,0,'L');
	}	
	else
	{	
	$pdf->Cell(20,10,'PERSONA QUE REALIZA EL REVERSO',0,0,'');
	$pdf->Ln(10);
	$pdf->Cell(10,10,$nombre_usuario,0,0,'L');
	$pdf->Ln(15);
	$pdf->Cell(20,10,'EMPRESA',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,$empresa,0,0,'L');
	$pdf->Ln(15);
	$pdf->Cell(10,10,'TARJETA',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,$tarjeta,0,0,'L');
	$pdf->Ln(15);
	$pdf->Cell(20,10,'MONTO DEL REVERSO',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,number_format($monto,2,'.',','),0,0,'L');
	$pdf->Ln(15);
	$pdf->Cell(10,10,'SALDO DE LA TARJETA DESPUES DEL REVERSO',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,number_format(($saldo_tarjeta+$monto),2,'.',','),0,0,'L');
	$pdf->Ln(15);
	$pdf->Cell(10,10,'SALDO DE LA EMPRESA DESPUES DEl REVERSO',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,number_format($saldo_empresa,2,'.',','),0,0,'L');
	$pdf->Ln(15);
	$pdf->Cell(10,10,'CONCEPTO',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,$concepto,0,0,'L');
	}
	$pdf->Ln(30);
	$pdf->Cell(10,10,'FOLIO',0,0,'L');
	$pdf->Ln(10);
	$pdf->Cell(10,10,$nombre_archivo,0,0,'L');
	$pdf->Ln(10);
	$pdf->Output($ruta,'F');
	$pdf->Close();
	
}
}
?>
