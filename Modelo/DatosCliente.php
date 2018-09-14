<?php

class DatosCliente {
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
    public function agregarCliente(Cliente $unCliente) {
        $this->mensaje = null;
        try {
            $this->miConexion->beginTransaction();
            //Agregar tabla personas
            $consulta = "insert into personas values (null,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unCliente->getIdentificacion());
            $resultado->bindParam(2, $unCliente->getNombres());
            $resultado->bindParam(3, $unCliente->getApellidos());
            $resultado->bindParam(4, $unCliente->getCorreo());
            $resultado->execute();

            $idPersona = $this->miConexion->lastInsertId();

            //Agregar tabla clientes
            $consulta = "insert into clientes values(null,?,(select curdate()),?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unCliente->getTelefono());
            $resultado->bindParam(2, $idPersona);
            $resultado->execute();

            $this->miConexion->commit();
            
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Cliente agregado";
            
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
     * Función para obtener cliente por identificacion
     * @param type $identificacion
     * @return type
     */
    public function obtenerClienteXIdentificacion($identificacion) {
        $this->mensaje = NULL;
        try {
            $consulta = "select personas.*,clientes.* from personas inner join clientes"
                    . " on personas.idPersona=clientes.cliPersona"
                    . " where personas.perIdentificacion = ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $identificacion);
            $resultado->execute();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Cliente...";
        } catch (Exception $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }

        return $this->retorno;
    }
    
    public function getMensaje() {
        return $this->mensaje;
    }

    /**
     * Función que obtiene el listado de todos los empleados
     * @return type
     */
    public function listarClientes() {
        $this->mensaje = NULL;
        try {
            $consulta = "select personas.*,clientes.* from personas inner join clientes "
                    . "on personas.idPersona=clientes.cliPersona";
            $resultado = $this->miConexion->query($consulta);
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Lista de clientes...";
        } catch (Exception $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }
}
