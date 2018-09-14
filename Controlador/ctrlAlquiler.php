<?php
session_start();
extract($_REQUEST);

include '../Modelo/Conexion.php';
include '../Modelo/Carro.php';
include '../Modelo/Persona.php';
include '../Modelo/Cliente.php';
include '../Modelo/Alquiler.php';
include '../Modelo/DatosAlquiler.php';
date_default_timezone_get("America/Bogota");

error_reporting(0);

$objDatosAlquiler = new DatosAlquiler();

switch ($_REQUEST['opcion']) {
    case 1: //Agregar alquiler
        $idCliente = $txtIdCliente;
        $idCarro = $txtIdCarro;
        $fechaAlquiler= date("Y-m-d");
        $fechaDevolucion = $txtFechaDevolucion;

        $unCliente = new Cliente();
        $unCliente->setIdCliente($idCliente);

        $unCarro = new Carro();
        $unCarro->setIdCarro($idCarro);

        $unAlquiler = new Alquiler($unCarro,$unCliente,$fechaAlquiler,$fechaDevolucion);
        $resultado = $objDatosAlquiler->agregarAlquiler($unAlquiler);

        if ($resultado->estado == true) {
            header("location:../Vista/Administrador/?pg=frmAgregarAlquiler.php&x=1");
        } else {
            header("location:../Vista/Administrador/?pg=frmAgregarAlquiler.php&x=2");
        }
        break;
    case 2: //Delución alquiler
        $fechaDevolucion = date("Y-m-d");

        $unCarro = new Carro();
        $unCarro->setIdCarro($idCarro);

        $unAlquiler = new Alquiler();
        $unAlquiler->setIdAlquiler($idAlquiler);
        $unAlquiler->setCarro($unCarro);
        $unAlquiler->setFechaDevolucion($fechaDevolucion);

        $resultado = $objDatosAlquiler->devolucionAlquiler($unAlquiler);


        if ($resultado->estado == true) {
            header("location:../Vista/Administrador/?pg=frmDevolucionAlquiler.php&x=1");
        } else {
            header("location:../Vista/Administrador/?pg=frmDevolucionAlquiler.php&x=2");
        }

        break;
    case 3: //listar Alquileres
        $resultado = array('mensaje', 'datos' => null);
        $retorno = $objDatosAlquiler->listarAlquileres();

        if ($retorno->estado) {
            $resultado['datos'] = $retorno->datos->fetchAll();
        } else {
            $resultado['datos'] = $retorno->datos;
        }
        $resultado['mensaje'] = $retorno->mensaje;
        echo json_encode($resultado);

        break;
    case 4: //Obtener Alquileres
        $resultado = array('mensaje', 'datos' => null);
        $retorno = $objDatosAlquiler->obtenerAlquilerPorId($idAlquiler);

        if ($retorno->estado) {
            $resultado['datos'] = $retorno->datos->fetchObject();
        } else {
            $resultado['datos'] = $retorno->datos;
        }
        $resultado['mensaje'] = $retorno->mensaje;
        echo json_encode($resultado);

        break;
}