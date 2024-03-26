<?php

namespace App\Models;

class Mapa {
    private $coordenadas;
    private $nombreComercio;
    private $ancho;
    private $alto;
    private $direccionComercio;

    public function setCoordenadas($coordenadas) {
        $this->coordenadas = $coordenadas;
    }

    public function getCoordenadas() {
        return $this->coordenadas;
    }

    public function setNombreComercio($nombreComercio) {
        $this->nombreComercio = $nombreComercio;
    }

    public function getNombreComercio() {
        return $this->nombreComercio;
    }

    public function setAncho($ancho) {
        $this->ancho = $ancho;
    }

    public function getAncho() {
        return $this->ancho;
    }

    public function setAlto($alto) {
        $this->alto = $alto;
    }

    public function getAlto() {
        return $this->alto;
    }

    public function setDireccionComercio($direccionComercio) {
        $this->direccionComercio = $direccionComercio;
    }

    public function getDireccionComercio() {
        return $this->direccionComercio;
    }
}


?>