<?php

require('../../Recursos/Librerias/fpdf/fpdf.php');

$datos = json_decode($_GET['json']);

echo $datos->alqCliente;
/*
class PDF extends FPDF
{
    //Encabezado
    function Header()
    {
    // Logo
    $this->SetFillColor(0,0,0);
    $this->Cell(80,20,'',0,0,'',true);
    $this->Ln();
    $this->Image('../../Recursos/Imagenes/rent a car.png',10,8,80);

    // Arial bold 15
    $this->SetFont('Courier','B',14);
    // Movernos a la derecha
    //$this->Cell(50);
    // Título
    $this->Cell(80,12,'AUTOCLICK-NEIVA',0,0,'C');
    // Salto de línea
    $this->Ln(5);
    $this->SetFont('Courier','I',10);
    $this->Cell(80,14,'NIT: 801823719213-1',0,0,'C');
    $this->Ln(4);
    $this->Cell(80,14,'Dir: Calle 98 No. 24-1',0,0,'C');
    $this->Ln(4);
    }

    //Pie de página
    function Footer()
    {
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Courier','I',11);
    $this->Cell(0,10,'AUTOCLICK-NEIVA',0,0,'C');
    $this->Ln(4);
    $this->Cell(0,10,'https://autoclick-neiva.com.co',0,0,'C');
    }

    // Tabla coloreada
    function generarFactura(){
    //encabezado
    $this->SetFont('Courier','',10);
    $fechaAlquiler = "2018-08-25";
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');

    $dias = floor(abs((strtotime($fecha)-strtotime($fechaAlquiler))/86400));

    $tarifaPorDia = 10000;
    $valorAPagar = $tarifaPorDia * $dias;
    $this->Ln(10);
    $this->Line($this->GetX(),$this->GetY(), $this->GetX()+90,$this->GetY());
    $this->Cell(10,10,'Factura de venta No. 123',0,0,'L');
    $this->Ln(4);
   	$this->Cell(10,10,'Fecha: '.$fecha,0,0,'L');
    $this->Ln(4);
    $this->Cell(80,10,'Hora: '.$hora,0,0,'L');
    $this->Ln(4);
   	$this->Cell(10,10,'Empleado: Alex Arcos',0,0,'L');
    $this->Ln(10);
    $this->Line($this->GetX(),$this->GetY(), $this->GetX()+90,$this->GetY());

    //Datos cliente y carro
    $this->Cell(10,10,'C.C.             :',0,0,'L');
    $this->Cell(40);
    $this->Cell(20,10,'102912618',0,0,'L');
    $this->Ln(4);

    $this->Cell(10,10,'Nombre           : ',0,0,'L');
    $this->Cell(40);
    $this->Cell(20,10,'Evelyn Castro',0,0,'L');
    $this->Ln(4);

    $this->Cell(10,10,'Carro            : ',0,0,'L');
    $this->Cell(40);
    $this->Cell(20,10,'Mercedes Benz',0,0,'L');
    $this->Ln(4);

    $this->Cell(10,10,'Fecha alquiler   : ',0,0,'L');
    $this->Cell(40);
    $this->Cell(20,10,$fechaAlquiler,0,0,'L');
    $this->Ln(4);

    $this->Cell(10,10,"Fecha entrega    :",0,0,'L');
    $this->Cell(40);
    $this->Cell(20,10,$fecha,0,0,'L');
    $this->Ln(4);

    $this->Cell(10,10,utf8_decode("Días             :"),0,0,'L');
    $this->Cell(40);
    $this->Cell(20,10,$dias,0,0,'L');
    $this->Ln(10);

    $this->Line($this->GetX(),$this->GetY(), $this->GetX()+90,$this->GetY());
    
    $this->SetFont('Courier','B',11);
    $this->Cell(10,10,"Valor a pagar 	:",0,0,'L');
    $this->Cell(40);
    $this->Cell(20,10,number_format($valorAPagar),0,0,'L');
    $this->Ln(10);

    }
}

$pdf = new PDF('P','mm',array(100,150));

$pdf->AddPage();
$pdf->SetMargins(5,5);
$pdf->generarFactura();
$pdf->Output();*/
?>