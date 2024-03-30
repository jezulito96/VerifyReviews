<?php

namespace App\Models;


class Master {
    private static $instancia;
    private $listaCategorias;

    private static $baseDatos;

    private function __construct() {}

    public static function obtenerInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new Master();
            self::$baseDatos = new BaseDatos();
        }
        return self::$instancia;
    }

    public function getListaCategorias() {
        if ($this->listaCategorias === null) {
            

            $this->listaCategorias = array();        
            foreach(self::$baseDatos->getListaCategorias() as $val){
                $this->listaCategorias[] = new Categoria($val['cod_categoria'], $val['tipo_negocio']);
            }
        }
        
        return $this->listaCategorias;
    }

    public function getListaNegocios() {
        if ($this->listaCategorias === null) {
            $baseDatos = new BaseDatos();

            $this->listaCategorias = array();        
            foreach(self::$baseDatos->getListaNegocios() as $val){

            }
        }
        
        return $this->listaCategorias;
    }
}


?>