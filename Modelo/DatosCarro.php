<?php

class DatosCarro {

    private $miConexion;
    private $mensaje;
    private $retorno;

    public function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

    /**
     * Agregar un carro a la base de datos 
     * @param Empleado $unEmpleado
     * @param type $rol
     * @return type
     */
    public function agregarCarro(Carro $unCarro) {
        $this->mensaje = null;
        try {
            //Agregar tabla carros
            $consulta = "insert into carros values (null,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unCarro->getPlaca());
            $resultado->bindParam(2, $unCarro->getMarca());
            $resultado->bindParam(3, $unCarro->getColor());
            $resultado->bindParam(4, $unCarro->getEstado());
            $resultado->execute();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Carro agregado";
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
     * Función que obtiene un carro por su placa
     * @param type $placa
     * @return type
     */
    public function obtenerCarroPorPlaca($placa) {
        $this->mensaje = NULL;
        try {
            $consulta = "select * from carros where carPlaca = ?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $placa);
            $resultado->execute();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Carro...";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    /**
     * Función para obtener el listado de carros
     * @return type
     */
    public function listarCarros() {
        $this->mensaje = NULL;
        try {
            $consulta = "select * from carros ";
            $resultado = $this->miConexion->query($consulta);

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Carros...";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    /**
     * Función para obtener el listado de carros disponibles
     * @return type
     */
    public function listarCarrosDisponibles() {
        $this->mensaje = NULL;
        try {
            $consulta = "select * from carros where carEstado='Disponible'";
            $resultado = $this->miConexion->query($consulta);

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Carros...";
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
