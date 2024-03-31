<?php

namespace App\Models;

class Negocio {
    private $nombre;
    private $email;
    private $calle;
    private $ciudad;
    private $pais;
    private $telefono_negocio;
    private $fotos;
    private $foto_principal;
    private $coordenadas;
    private $sitio_web;
    private $cod_categoria;
    private $nombre_titular;
    private $telefono_titular;
    private $activo;
    private $confirma_correo;

    public function __construct($nombre, $email, $calle, $ciudad, $pais, $telefono_negocio, $fotos, $foto_principal, $coordenadas, $sitio_web, $cod_categoria, $nombre_titular, $telefono_titular, $activo, $confirma_correo) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->calle = $calle;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->telefono_negocio = $telefono_negocio;
        $this->fotos = $fotos;
        $this->foto_principal = $foto_principal;
        $this->coordenadas = $coordenadas;
        $this->sitio_web = $sitio_web;
        $this->cod_categoria = $cod_categoria;
        $this->nombre_titular = $nombre_titular;
        $this->telefono_titular = $telefono_titular;
        $this->activo = $activo;
        $this->confirma_correo = $confirma_correo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getTelefonoNegocio() {
        return $this->telefono_negocio;
    }

    public function getFotos() {
        return $this->fotos;
    }

    public function getFotoPrincipal() {
        return $this->foto_principal;
    }

    public function getCoordenadas() {
        return $this->coordenadas;
    }

    public function getSitioWeb() {
        return $this->sitio_web;
    }

    public function getCodCategoria() {
        return $this->cod_categoria;
    }

    public function getNombreTitular() {
        return $this->nombre_titular;
    }

    public function getTelefonoTitular() {
        return $this->telefono_titular;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function getConfirmaCorreo() {
        return $this->confirma_correo;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setCalle($calle) {
        $this->calle = $calle;
    }

    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    public function setPais($pais) {
        $this->pais = $pais;
    }

    public function setTelefonoNegocio($telefono_negocio) {
        $this->telefono_negocio = $telefono_negocio;
    }

    public function setFotos($fotos) {
        $this->fotos = $fotos;
    }

    public function setFotoPrincipal($foto_principal) {
        $this->foto_principal = $foto_principal;
    }

    public function setCoordenadas($coordenadas) {
        $this->coordenadas = $coordenadas;
    }

    public function setSitioWeb($sitio_web) {
        $this->sitio_web = $sitio_web;
    }

    public function setCodCategoria($cod_categoria) {
        $this->cod_categoria = $cod_categoria;
    }

    public function setNombreTitular($nombre_titular) {
        $this->nombre_titular = $nombre_titular;
    }

    public function setTelefonoTitular($telefono_titular) {
        $this->telefono_titular = $telefono_titular;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function setConfirmaCorreo($confirma_correo) {
        $this->confirma_correo = $confirma_correo;
    }
}


?>