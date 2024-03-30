<?php

namespace App\Models;

class Negocio {
    private $id;
    private $nombre;
    private $coordenadas;
    private $fotos;
    private $contacto;
    private $sitioWeb;
    private $email;
    private $resenas;
    private $direccion;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setCoordenadas($coordenadas) {
        $this->coordenadas = $coordenadas;
    }

    public function getCoordenadas() {
        return $this->coordenadas;
    }

    public function setFotos($fotos) {
        $this->fotos = $fotos;
    }

    public function getFotos() {
        return $this->fotos;
    }

    public function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    public function getContacto() {
        return $this->contacto;
    }

    public function setSitioWeb($sitioWeb) {
        $this->sitioWeb = $sitioWeb;
    }

    public function getSitioWeb() {
        return $this->sitioWeb;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function generarCodigoQR() {

    }

    public function recibirMensaje($mensaje) {

    }

    public function asignarMapa() {

    }

    public function setResenas($resenas) {
        $this->resenas = $resenas;
    }

    public function getResenas() {
        return $this->resenas;
    }
}


?>