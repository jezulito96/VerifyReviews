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

    public static function agregarObjeto(Negocio $objeto) {
        self::$listaObjetos[] = $objeto; // Añadir objeto a la lista estática
    }

    public static function getListaObjetos($codCategoria) {
        $objetosFiltrados = array();
        foreach (self::$listaObjetos as $objeto) {
            if ($objeto->getCodCategoria() == $codCategoria) {
                $objetosFiltrados[] = $objeto;
            }
        }
        return $objetosFiltrados;
    }
    
}

?>