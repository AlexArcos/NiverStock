<?php

class Empleado extends Persona {

    private $idEmpleado;
    private $cargo;

    /**
     * Contructor de la clase empleado
     * @param type $cargo
     * @param type $identificacion
     * @param type $nombres
     * @param type $apellidos
     * @param type $correo
     */
    public function __construct($cargo = null, $identificacion = null, $nombres = null, $apellidos = null, $correo = null) {
        parent::__construct($identificacion, $nombres, $apellidos, $correo);
        $this->cargo = $cargo;
    }

    public function getIdEmpleado() {
        return $this->idEmpleado;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }


}
