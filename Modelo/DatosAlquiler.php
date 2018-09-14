<?php

class DatosAlquiler {

    private $miConexion;
    private $mensaje;
    private $retorno;

    public function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

    /**
     * Agregar un alquiler
     * @param  Alquiler $unAlquiler 
     * @return arreglo retorno
     */
    public function agregarAlquiler(Alquiler $unAlquiler) {
        $this->mensaje = null;
        try {
            $this->miConexion->beginTransaction();
            //Agregar tabla alquiler
            $consulta = "insert into alquiler values (null,?,?,?,?)";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unAlquiler->getCarro()->getIdCarro());
            $resultado->bindParam(2, $unAlquiler->getCliente()->getIdCliente());
            $resultado->bindParam(3, $unAlquiler->getFechaAlquiler());
            $resultado->bindParam(4, $unAlquiler->getFechaDevolucion());
            $resultado->execute();

            $consulta = "update carros set carEstado='Alquilado' where idCarro=?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unAlquiler->getCarro()->getIdCarro());
            $resultado->execute();

            $this->miConexion->commit();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Alquiler agregado correctamente";
        } catch (PDOException $ex) {
            $this->mensaje = $ex->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $this->mensaje;
        }
        return $this->retorno;
    }

    /**
     * Devolucion Alquiler
     * @param  Alquiler $unAlquiler
     * @return arreglo retorno
     */
    public function devolucionAlquiler(Alquiler $unAlquiler){
        $this->mensaje = null;
        try {
            $this->miConexion->beginTransaction();
            //Agregar tabla alquiler
            $consulta = "update alquiler set alqFechaDevolucion=? where idAlquiler=?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unAlquiler->getFechaDevolucion());
            $resultado->bindParam(2, $unAlquiler->getIdAlquiler());
            $resultado->execute();

            $consulta = "update carros set carEstado='Disponible' where idCarro=?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $unAlquiler->getCarro()->getIdCarro());
            $resultado->execute();

            $this->miConexion->commit();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Devolucion exitosa";
        } catch (PDOException $ex) {
            $this->mensaje = $ex->getMessage();
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $this->mensaje;
        }
        return $this->retorno;
    }

    /**
     * Función para obtener el listado de alquileres
     * @return type
     */
    public function listarAlquileres() {
        $this->mensaje = NULL;
        try {
            $consulta = "select personas.*,clientes.*,carros.*,alquiler.* from alquiler inner join carros on carros.idCarro = alquiler.alqCarro inner join clientes on clientes.idCliente = alquiler.alqCliente inner join personas on personas.idPersona = clientes.cliPersona where carros.carEstado='Alquilado' order by idAlquiler desc limit 1";
            $resultado = $this->miConexion->query($consulta);

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "lista de alquileres...";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    /**
     * Función para obtener el listado de alquileres
     * @return type
     */
    public function obtenerAlquilerPorId($idAlquiler) {
        $this->mensaje = NULL;
        try {
            $consulta = "select personas.*,clientes.*,carros.*,alquiler.* from alquiler inner join carros on carros.idCarro = alquiler.alqCarro inner join clientes on clientes.idCliente = alquiler.alqCliente inner join personas on personas.idPersona = clientes.cliPersona where alquiler.idAlquiler=?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idAlquiler);
            $resultado->execute();

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            $this->retorno->mensaje = "Datos de alquiler...";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    /**
     * Función para obtener la cantidad de carros alquilados por mes
     * @return type
     */
    public function obtenerCantidadCarrosAlquiladosPorMes() {
        $this->mensaje = NULL;
        try {
            $consulta = "SELECT MONTH(alquiler.alqFechaAlquiler) as Mes, COUNT(alquiler.idAlquiler) as Cantidad FROM alquiler GROUP by MONTH(alquiler.alqFechaAlquiler)";
            $resultado = $this->miConexion->query($consulta);

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            if($resultado->rowCount()>0){
                $this->retorno->mensaje = "lista de carros alquilados..."; 
            }else{
                $this->retorno->mensaje = "No hay carros alquilados";
            }
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    /**
     * Función para obtener la cantidad de carros alquilados por placa
     * @return type
     */
    public function obtenerCantidadCarrosAlquiladosPorPlaca() {
        $this->mensaje = NULL;
        try {
            $consulta = "SELECT carros.carPlaca as Placa,COUNT(alquiler.alqCarro) as Cantidad  from alquiler inner join carros on alquiler.alqCarro=carros.idCarro GROUP BY Placa";
            $resultado = $this->miConexion->query($consulta);

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            if($resultado->rowCount()>0){
                $this->retorno->mensaje = "lista de carros alquilados por placa..."; 
            }else{
                $this->retorno->mensaje = "No hay carros alquilados";
            }
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    /**
     * Función para obtener la cantidad de carros alquilados por cliente
     * @return type
     */
    public function obtenerCantidadCarrosAlquiladosPorCliente() {
        $this->mensaje = NULL;
        try {
            $consulta = "SELECT personas.perIdentificacion AS Identificacion, COUNT(alquiler.alqCliente) AS Cantidad  FROM alquiler INNER JOIN clientes ON alquiler.alqCliente=clientes.idCliente INNER JOIN personas ON personas.idPersona = clientes.cliPersona GROUP BY Identificacion";
            $resultado = $this->miConexion->query($consulta);

            $this->retorno->estado = true;
            $this->retorno->datos = $resultado;
            if($resultado->rowCount()>0){
                $this->retorno->mensaje = "lista de carros alquilados por cliente..."; 
            }else{
                $this->retorno->mensaje = "No hay carros alquilados";
            }
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }
}