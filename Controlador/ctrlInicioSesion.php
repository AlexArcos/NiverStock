<?php
session_start();
extract($_REQUEST);
include '../Modelo/Conexion.php';
include '../Modelo/DatosNegocio.php';
error_reporting(0);

$objDatosNegocio = new DatosNegocio();
switch ($_REQUEST['opcion']){
    case 1://Iniciar sesion
        $unUsuario = new stdClass();
        $unUsuario->login = $txtUser;
        $unUsuario->password = $txtPass;
        $resultado = $objDatosNegocio->iniciarSesion($unUsuario);

        if($resultado->estado==true){
            if($resultado->datos->rowCount()>0){
                $user = $resultado->datos->fetchObject();
                $_SESSION['idEmpleado']=$user->idEmpleado;
                $_SESSION['nombreEmpleado']=$user->perNombres." ".$user->perApellidos;
                $_SESSION['identifica']=$user->perIdentificacion;
                echo "hola";
                switch ($user->usuRol){
                    case "Administrador":
                        header('location:../Vista/Administrador/');
                        
                        break;  
                    case "Asistente":
                        header('location:../Vista/Asistente/');
                        break;
                }
            }else{
                header('location:../Vista/?pg=frmInicioSesion.php&x=1');
            }
        }else{
            echo "menos";
        }
        
        break;
    case 2:
        break;
}


