<?php

namespace App\Models;


class Categoria {
    private $codCategoria;
    private $tipoNegocio;
    private $imgCategoria;

    private static $listaObjetos = array();

    public function __construct($codCategoria, $tipoNegocio) {
        $this->codCategoria = $codCategoria;
        $this->tipoNegocio = $tipoNegocio;
    }

    public function getCodCategoria() {
        return $this->codCategoria;
    }

    public function getTipoNegocio() {
        return $this->tipoNegocio;
    }

}

?>