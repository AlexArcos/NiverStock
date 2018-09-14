<?php
session_start();
extract($_REQUEST);

require('../../../Recursos/Librerias/fpdf/fpdf.php');
require('../../../Recursos/Librerias/barCode/code128/code128.php');

include '../../../Modelo/Conexion.php';
include '../../../Modelo/DatosCarro.php';

class PDF extends PDF_Code128
{
    //Encabezado
    function Header()
    {
    // Logo
    $this->Image('../../../Recursos/Imagenes/rent a car.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(50,10,'LISTA DE CARROS',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    }

    //Pie de página
    function Footer()
    {
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    // Tabla coloreada
    function listarCarros($header, $carros)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(0,20,100);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,20,100);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');

        // Cabecera
        $w = array(40, 35, 45, 40, 60);
        for($i=0;$i<count($header);$i++){
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        }
        $this->Ln();

        // Restauración de colores y fuentes
        $this->SetFillColor(0,0,0);
        $this->SetTextColor(0);
        $this->SetFont('');

        // Datos
        $fill = false;
        while($carro = $carros->fetchObject())
        {
            $this->Cell($w[0],15,$carro->carPlaca,'LRT',0,'C',$fill);
            $this->Cell($w[1],15,$carro->carMarca,'LRT',0,'C',$fill);
            $this->Cell($w[2],15,$carro->carColor,'LRT',0,'C',$fill);
            $this->Cell($w[3],15,$carro->carEstado,'LRT',0,'C',$fill);
            $this->Cell($w[4],15,$this->code128($this->GetX()+9,$this->GetY()+3, $carro->carPlaca,40,8),'LRT',0,'C',$fill);
            $this->Ln();
            //$fill = !$fill;
        }
        // Línea de cierre
        $this->Cell(array_sum($w),0,'','T');
    }
}

$pdf = new PDF();
//Obtener carros
$objDatosCarro = new DatosCarro();
$resultado = $objDatosCarro->listarCarros();

// Títulos de las columnas
$header = array('PLACA', 'MARCA', 'COLOR', 'ESTADO','CODIGO DE BARRAS');
$pdf->SetMargins(25,25);
$pdf->AddPage("L");
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',14);
$pdf->listarCarros($header,$resultado->datos);
$pdf->Output();
?>