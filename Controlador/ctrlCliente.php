<?php

include '../Modelo/Conexion.php';
include '../Modelo/Persona.php';
include '../Modelo/Cliente.php';
include '../Modelo/DatosCliente.php';
error_reporting(0);

extract($_REQUEST);
$objDatosCliente = new DatosCliente();

switch ($_REQUEST['opcion']) {
    case 1: 

        $unCliente = new Cliente($txtTelefono, $txtIdentificacion, $txtNombres, $txtApellidos, $txtCorreo);

        $resultado = $objDatosCliente->agregarCliente($unCliente);
        $mensaje = $resultado->mensaje;
        if ($resultado->estado == true) {
            header("location:../Vista/Administrador/?pg=frmAgregarCliente.php&x=1");
        } else {
            header("location:../Vista/Administrador/?pg=frmAgregarCliente.php&x=2");
        }
        break;
    case 2://Consultar cliente 
        $resultado = array('mensaje', 'datos');
        $retorno = $objDatosCliente->obtenerClienteXIdentificacion($identificacion);
        
        if ($retorno->estado) {
            if($retorno->datos->rowCount()>0){
                $resultado['datos'] = $retorno->datos->fetchObject();                
            }else{
                $resultado['datos'] = null;
            }
        } else {
            $resultado['datos'] = $retorno->datos;
        }
        $resultado['mensaje'] = $retorno->mensaje;
        $resultado['estado'] = $retorno->estado;
        echo json_encode($resultado);

        break;
    case 3: //listar clientes 
        $resultado = array('mensaje', 'datos' => null);
        $retorno = $objDatosCliente->listarClientes();

        if ($retorno->estado) {
            $resultado['datos'] = $retorno->datos->fetchAll();
        } else {
            $resultado['datos'] = $retorno->datos;
        }
        $resultado['mensaje'] = $retorno->mensaje;
        echo json_encode($resultado);

        break;
}