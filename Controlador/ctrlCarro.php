<?php

include '../Modelo/Conexion.php';
include '../Modelo/Carro.php';
include '../Modelo/DatosCarro.php';

error_reporting(0);

extract($_REQUEST);
$objDatosCarro = new DatosCarro();

switch ($_REQUEST['opcion']) {
    CASE 1:
        $unCarro = new Carro($txtPlaca, $txtMarca, $txtColor, "Disponible");
        $resultado = $objDatosCarro->agregarCarro($unCarro);
        $mensaje = $resultado->mensaje;
        if ($resultado->estado == true) {
            $nombre = $_FILES['foto']['name'];
            $error = "";
            try {
                if ($nombre != " ") {
                    $nombreArchivo = $_POST['txtPlaca'] . ".png";
                    $ruta = "../Vista/FotosCarro/";
                    move_uploaded_file($_FILES['foto']['tmp_name'], $ruta . $nombreArchivo);
                    header("location:../Vista/Administrador/?pg=frmAgregarCarro.php&x=1");
                }
            } catch (Exception $ex) {
                $error = $ex->getMessage();
                header("location:../Vista/Administrador/?pg=frmAgregarCarro.php&x=2");
            }
        } else {
            header("location:../Vista/Administrador/?pg=frmAgregarCarro.php&x=3");
        }
        break;

    case 2: //Consultar carro 
        $resultado = array('mensaje', 'datos');
        $retorno = $objDatosCarro->obtenerCarroPorPlaca($placa);
        
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

    case 3: //listar carros disponibles
        $resultado = array('mensaje', 'datos' => null);
        $retorno = $objDatosCarro->listarCarrosDisponibles();

        if ($retorno->estado) {
            $resultado['datos'] = $retorno->datos->fetchAll();
        } else {
            $resultado['datos'] = $retorno->datos;
        }
        $resultado['mensaje'] = $retorno->mensaje;
        echo json_encode($resultado);

        break;

    case 4: //listar carros 
        $resultado = array('mensaje', 'datos' => null);
        $retorno = $objDatosCarro->listarCarros();

        if ($retorno->estado) {
            $resultado['datos'] = $retorno->datos->fetchAll();
        } else {
            $resultado['datos'] = $retorno->datos;
        }
        $resultado['mensaje'] = $retorno->mensaje;
        echo json_encode($resultado);

        break;
}