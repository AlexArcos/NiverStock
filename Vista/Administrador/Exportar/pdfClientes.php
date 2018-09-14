<?php
session_start();
extract($_REQUEST);
require('../../../Recursos/Librerias/fpdf/fpdf.php');
include '../../../Modelo/Conexion.php';
include '../../../Modelo/DatosCliente.php';

class PDF extends FPDF
{
    //Encabezado
    function Header()
    {
    // Logo
    $this->Image('../../../Recursos/Imagenes/rent a car.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(50,10,'LISTA DE CLIENTES',0,0,'C');
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
    function listarClientes($header, $clientes)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(0,20,100);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,20,100);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Cabecera
        $w = array(40, 35, 35, 53, 32);
        for($i=0;$i<count($header);$i++){
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        }
        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;
        while($cliente = $clientes->fetchObject())
        {
            $this->Cell($w[0],9,$cliente->perIdentificacion,'LR',0,'L',$fill);
            $this->Cell($w[1],9,$cliente->perNombres,'LR',0,'L',$fill);
            $this->Cell($w[2],9,$cliente->perApellidos,'LR',0,'L',$fill);
            $this->Cell($w[3],9,$cliente->perCorreo,'LR',0,'L',$fill);
            $this->Cell($w[4],9,$cliente->cliTelefono,'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Línea de cierre
        $this->Cell(array_sum($w),0,'','T');
    }
}

$pdf = new PDF();
//Obtener empleados
$objDatosCliente = new DatosCliente();
$resultado = $objDatosCliente->listarClientes();

// Títulos de las columnas
$header = array('IDENTIFICACION', 'NOMBRE', 'APELLIDO', 'CORREO', 'TELEFONO');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);
$pdf->listarClientes($header,$resultado->datos);
$pdf->Output();
?>