<?php  
session_start();
extract($_REQUEST);
include "../Modelo/Conexion.php";
include "../Modelo/DatosAlquiler.php";

$objDatosAlquiler = new DatosAlquiler();
$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
$yDatos = array();
$xMeses = array();

switch ($_REQUEST['opcion']) {
    case 1: //Agregar empleado
		$i=0;
		$data[$i] = array("Meses","Cantidad");
		$resultado = $objDatosAlquiler->obtenerCantidadCarrosAlquiladosPorMes();

		while($datos = $resultado->datos->fetchObject()){
			$i++;
			$xMeses[$i] = (string) $meses[$datos->Mes-1];
			$yDatos[$i] = (int) $datos->Cantidad;
			$data[$i] = array($xMeses[$i],$yDatos[$i]); 
		}

		echo json_encode($data);
		break;

	case 2:
		$i=0;
		$data[$i] = array("Placa","Cantidad");
		$resultado = $objDatosAlquiler->obtenerCantidadCarrosAlquiladosPorPlaca();

		while($datos = $resultado->datos->fetchObject()){
			$i++;
			$xMeses[$i] = (string) $datos->Placa;
			$yDatos[$i] = (int) $datos->Cantidad;
			$data[$i] = array($xMeses[$i],$yDatos[$i]); 
		}

		echo json_encode($data);
		break;

	case 3:
		$i=0;
		$data[$i] = array("Identificación","Cantidad");
		$resultado = $objDatosAlquiler->obtenerCantidadCarrosAlquiladosPorCliente();

		while($datos = $resultado->datos->fetchObject()){
			$i++;
			$xMeses[$i] = (string) $datos->Identificacion;
			$yDatos[$i] = (int) $datos->Cantidad;
			$data[$i] = array($xMeses[$i],$yDatos[$i]); 
		}

		echo json_encode($data);
		break;
}
?>