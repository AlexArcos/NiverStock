<?php

class Cliente extends Persona {

    private $idCliente;
    private $telefono;
    private $fechaRegistro;

    /**
     * Constructor de la clase cliente
     * @param type $telefono
     * @param type $fechaRegistro
     * @param type $identificacion
     * @param type $nombres
     * @param type $apellidos
     * @param type $correo
     */
    public function __construct($telefono = null,/* $fechaRegistro = null,*/ $identificacion = null, $nombres = null, $apellidos = null, $correo = null) {
        parent::__construct($identificacion, $nombres, $apellidos, $correo);
        $this->telefono = $telefono;
        //$this->fechaRegistro = $fechaRegistro;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }


}
