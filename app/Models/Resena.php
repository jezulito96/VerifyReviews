<?php

namespace App\Models;

class Resena {
    private $titulo;
    private $foto;
    private $opinion;
    private $calificacion;
    private $fechaServicio;
    private $fechaCreacion;
    private $codResena;

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setOpinion($opinion) {
        $this->opinion = $opinion;
    }

    public function getOpinion() {
        return $this->opinion;
    }

    public function setCalificacion($calificacion) {
        $this->calificacion = $calificacion;
    }

    public function getCalificacion() {
        return $this->calificacion;
    }

    public function setFechaServicio($fechaServicio) {
        $this->fechaServicio = $fechaServicio;
    }

    public function getFechaServicio() {
        return $this->fechaServicio;
    }

    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }

    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    public function setCodResena($codResena) {
        $this->codResena = $codResena;
    }

    public function getCodResena() {
        return $this->codResena;
    }
}


?>