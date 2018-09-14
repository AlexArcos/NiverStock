<?php
//Librerias para enviar correo
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../Modelo/Conexion.php';
include '../Modelo/Persona.php';
include '../Modelo/Empleado.php';
include '../Modelo/DatosEmpleado.php';
require '../Recursos/Librerias/phpMailer/vendor/autoload.php';
error_reporting(0);

extract($_REQUEST);
$objDatosEmpleado = new DatosEmpleado();

switch ($_REQUEST['opcion']) {
    case 1: //Agregar empleado

        $unEmpleado = new Empleado($txtCargo, $txtIdentificacion, $txtNombres, $txtApellidos, $txtCorreo);

        $datos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@%$&#?/";
        $cantidad = strlen($datos);
        $clave = "";

        for($i=0;$i<7;$i++){
            $posicion =rand(0,$cantidad-1);
            $clave .= $datos[$posicion];
        }

        $resultado = $objDatosEmpleado->agregarEmpleado($unEmpleado, $txtRol, $clave);
        $mensaje = $resultado->mensaje;

        if ($resultado->estado == true) {
            // Subir la foto
            $nombre = $_FILES['foto']['name'];
            $error = "";
            try {
                if ($nombre != " ") {
                    $nombreArchivo = $_POST['txtIdentificacion'] . ".png";
                    $ruta = "../Vista/Fotos/";
                    move_uploaded_file($_FILES['foto']['tmp_name'], $ruta . $nombreArchivo);
                    header("location:../Vista/Administrador/?pg=frmAgregarEmpleado.php&x=1");
                }
            } catch (Exception $ex) {
                $error = $ex->getMessage();
                header("location:../Vista/Administrador/?pg=frmAgregarEmpleado.php&x=2");
            }

            //Enviar clave al correo del empleado registrado   
            $mail = new PHPMailer(true);                
            try {    
                $mail->SMTPDebug = 2;                                 
                $mail->isSMTP();                                     
                $mail->Host = 'smtp.gmail.com';  
                $mail->SMTPAuth = true;                               
                $mail->Username = 'esty0019@gmail.com';                 
                $mail->Password = 'mnf1619ala';                           
                $mail->SMTPSecure = 'ssl';                            
                $mail->Port = 465;                                    

                $mail->setFrom("esty0019@gmail.com","AUTOCLICK Alquiler de carros");
                $mail->addAddress($txtCorreo,$txtNombres." ".$txtApellidos);

                $mail->isHTML(true);  

                $mail->Subject = "Clave de acceso";
                $mail->Body    = "Clave: ".$clave;

                $mail->send();
            } catch (Exception $e) {
                header("location:../Vista/Administrador/?pg=frmAgregarEmpleado.php&x=4");
            }
        } else {
            header("location:../Vista/Administrador/?pg=frmAgregarEmpleado.php&x=3");
        }
        break;

    case 2: //Consultar empleado
        $txtIdentificacion = $_POST['txtIdentificacion'];
        $resultado = $objDatosEmpleado->obtenerEmpleadoXIdentificacion($txtIdentificacion);

        if ($resultado->estado) {
            if ($resultado->datos->rowCount() > 0) {
                $emple = $resultado->datos->fetchObject();
                echo "<br> Nombre :" . $emple->perNombres;
            } else {
                echo "No existe";
            }
        } else {
            echo $resultado->mensaje;
        }
        break;

    case 3: //Consultar mediante ajax
        // $identificacion se recibe del llamado de ajax
        $resultado = $objDatosEmpleado->obtenerEmpleadoXIdentificacion($identificacion);
        if ($resultado->estado == true) {
            if ($resultado->datos->rowCount() > 0) {
                $otraPersona = $resultado->datos->fetchObject();
                echo "Ya existe la persona, se llama: " . $otraPersona->perNombres . " " . $otraPersona->perApellidos;
            } else {
                echo "";
            }
        } else {
            echo "";
        }
        break;

    case 4: //listar empleados
        $resultado = $objDatosEmpleado->listarEmpleados();

        if ($resultado->estado) {
            $tamaño = $resultado->datos->rowCount();
            if ($tamaño > 0) {
                $empleados = $resultado->datos->fetchall();
            } else {
                echo "Sin empleados";
            }
        } else {
            echo $resultado->mensaje;
        }
        break;

    case 5: //Consultar empleados por parametros
        $resultado = $objDatosEmpleado->obtenerEmpleadoPorValor($valor);
        if ($resultado->estado) {
            $empleados['datos'] = $resultado->datos->fetchAll();
        } else {
            $empleados['datos'] = $resultado->datos;
        }
        $empleados['mensaje'] = $resultado->mensaje;
        echo json_encode($empleados);
        break;
 
}