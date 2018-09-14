<?php

class alquiler {
    private $idAlquiler;
    private $cliente;
    private $carro;
    private $fechaAlquiler;
    private $fechaDevolucion;
    
    public function __construct($carro = null, $cliente = null, $fechaAlquiler = null, $fechaDevolucion = null) {
        $this->cliente = $cliente;
        $this->carro = $carro;
        $this->fechaAlquiler = $fechaAlquiler;
        $this->fechaDevolucion = $fechaDevolucion;
    }

    public function getIdAlquiler() {
        return $this->idAlquiler;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getCarro() {
        return $this->carro;
    }

    public function getFechaAlquiler() {
        return $this->fechaAlquiler;
    }

    public function getFechaDevolucion() {
        return $this->fechaDevolucion;
    }

    public function setIdAlquiler($idAlquiler) {
        $this->idAlquiler = $idAlquiler;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setCarro($carro) {
        $this->carro = $carro;
    }

    public function setFechaAlquiler($fechaAlquiler) {
        $this->fechaAlquiler = $fechaAlquiler;
    }

    public function setFechaDevolucion($fechaDevolucion) {
        $this->fechaDevolucion = $fechaDevolucion;
    }

}
