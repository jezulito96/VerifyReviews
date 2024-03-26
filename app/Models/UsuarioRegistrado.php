<?php

namespace App\Models;

class UsuarioRegistrado extends Usuario {
    private $apellidos;
    private $correo;
    private $ubicacion;
    private $contraseña;
    private $codUsuario;
    private $email;

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getUbicacion() {
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}

?>