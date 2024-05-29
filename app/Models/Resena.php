<?php

namespace App\Models;

class Resena {
    private $cod_resena;
    private $cod_negocio;
    private $cod_usuario;
    private $fecha_creacion;
    private $fecha_servicio;
    private $calificacion;
    private $titulo;
    private $opinion;
    private $fotos;
    private $qr_id;
    private $estado;
    private $nickname;
    private $foto_perfil;
    private $nombre_negocio;

    // Constructor
    public function __construct($cod_resena, $cod_negocio, $cod_usuario, $fecha_creacion, $fecha_servicio, $calificacion, $titulo, $opinion, $fotos, $qr_id, $estado, $nickname) {
        $this->cod_resena = $cod_resena;
        $this->cod_negocio = $cod_negocio;
        $this->cod_usuario = $cod_usuario;
        $this->fecha_creacion = $fecha_creacion;
        $this->fecha_servicio = $fecha_servicio;
        $this->calificacion = $calificacion;
        $this->titulo = $titulo;
        $this->opinion = $opinion;
        $this->fotos = $fotos;
        $this->qr_id = $qr_id;
        $this->estado = $estado;
        $this->nickname = $nickname;

        $baseDatos = new BaseDatos();
        $this -> foto_perfil =  $baseDatos -> get_foto_perfil_usuario($cod_usuario);
        $this -> nombre_negocio =  $baseDatos -> get_nombre_negocio($cod_negocio);
    }

    public function get_nombre_negocio(){
        return $this -> nombre_negocio;
    }
    public function get_foto_perfil_usuario(){
        return $this -> foto_perfil;
    }

    public function getCodResena() {
        return $this->cod_resena;
    }

    public function getCodNegocio() {
        return $this->cod_negocio;
    }

    public function getCodUsuario() {
        return $this->cod_usuario;
    }

    public function getFechaCreacion() {
        return $this->fecha_creacion;
    }

    public function getFechaServicio() {
        return $this->fecha_servicio;
    }

    public function getCalificacion() {
        return $this->calificacion;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getOpinion() {
        return $this->opinion;
    }

    public function getFotos() {
        return $this->fotos;
    }

    public function getQrId() {
        return $this->qr_id;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getNickname() {
        return $this->nickname;
    }

    // // Setters
    // public function setCodResena($cod_resena) {
    //     $this->cod_resena = $cod_resena;
    // }

    // public function setCodNegocio($cod_negocio) {
    //     $this->cod_negocio = $cod_negocio;
    // }

    // public function setCodUsuario($cod_usuario) {
    //     $this->cod_usuario = $cod_usuario;
    // }

    // public function setFechaCreacion($fecha_creacion) {
    //     $this->fecha_creacion = $fecha_creacion;
    // }

    // public function setFechaServicio($fecha_servicio) {
    //     $this->fecha_servicio = $fecha_servicio;
    // }

    // public function setCalificacion($calificacion) {
    //     $this->calificacion = $calificacion;
    // }

    // public function setTitulo($titulo) {
    //     $this->titulo = $titulo;
    // }

    // public function setOpinion($opinion) {
    //     $this->opinion = $opinion;
    // }

    // public function setFotos($fotos) {
    //     $this->fotos = $fotos;
    // }

    // public function setQrId($qr_id) {
    //     $this->qr_id = $qr_id;
    // }

    // public function setEstado($estado) {
    //     $this->estado = $estado;
    // }

    // public function setNickname($nickname) {
    //     $this->nickname = $nickname;
    // }
}
