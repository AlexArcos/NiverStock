<?php

class DatosEmpleado {

    private $miConexion;
    private $mensaje;
    private $retorno;

    public function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

    /**
     * Agregar un empleado 
     * @param Empleado $unEmpleado
     * @param type $rol
     * @return type
     */
    public function agregarEmpleado(Empleado $unEmpleado, $rol, $clave) {
        $this->mensaje = null;
        try {
            $this->miConexion->beginTransaction();
            //Agregar tabla personas
            $consulta = "insert into personas values (null,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unEmpleado->getIdentificacion());
            $resultado->bindParam(2, $unEmpleado->getNombres());
            $resultado->bindParam(3, $unEmpleado->getApellidos());
            $resultado->bindParam(4, $unEmpleado->getCorreo());
            $resultado->execute();

            $idPersona = $this->miConexion->lastInsertId();

            //Agregar tabla empleados
            $consulta = "insert into empleados values(null,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unEmpleado->getCargo());
            $resultado->bindParam(2, $idPersona);
            $resultado->execute();

            $idEmpleado = $this->miConexion->lastInsertId();

            //Agregar en tabla usuarios
            $password = md5($clave);
            $consulta = "insert into usuarios values(null,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unEmpleado->getIdentificacion());
            $resultado->bindParam(2, $password);
            $resultado->bindParam(3, $rol);
            $resultado->bindParam(4, $idEmpleado);
            $resultado->execute();

            $this->miConexion->commit();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Empleado agregado";
        } catch (PDOException $ex) {
            $this->mensaje = $ex->getMessage();
            $this->miConexion->rollBack();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $this->mensaje;
        }
        return $this->retorno;
    }

    /**
     * Función para obtener empleado por identificacion
     * @param type $identificacion
     * @return type
     */
    public function obtenerEmpleadoXIdentificacion($identificacion) {
        $this->mensaje = NULL;
        try {
            $consulta = "select personas.*,empleados.empCargo from personas inner join empleados "
                    . "on personas.idPersona=empleados.empPersona "
                    . "where personas.perIdentificacion = ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $identificacion);
            $resultado->execute();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Empleado...";
        } catch (Exception $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }

        return $this->retorno;
    }

    /**
     * Función que obtiene el listado de todos los empleados
     * @return type
     */
    public function listarEmpleados() {
        $this->mensaje = NULL;
        try {
            $consulta = "select personas.*,empleados.* from personas inner join empleados "
                    . "on personas.idPersona=empleados.empPersona";
            $resultado = $this->miConexion->query($consulta);
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Empleados...";
        } catch (Exception $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    /**
     * Función para obtener un empleado segun la busqueda
     * @return type
     */
    public function obtenerEmpleadoPorValor($valor) {
        try {
            $consulta = "select personas.*,empleados.* from personas"
                    . " inner join empleados on empleados.empPersona=personas.idPersona"
                    . " where (personas.perIdentificacion like ?) or (personas.perNombres like ?)"
                    . " (personas.perApellidos like ?) or (personas.perCorreo like ?) or"
                    . " (empleados.empCargo like ?)";
            $valor = "%" . $valor = "%";

            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $valor);
            $resultado->bindParam(2, $valor);
            $resultado->bindParam(3, $valor);
            $resultado->bindParam(4, $valor);
            $resultado->bindParam(5, $valor);
            $resultado->execute();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Lista empleados...";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

}
