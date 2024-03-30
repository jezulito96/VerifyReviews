<?php

namespace App\Models;


class Master {
    private static $instancia;
    private $listaCategorias;

    private function __construct() {}

    public static function obtenerInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new Master();
        }
        return self::$instancia;
    }

    public function getListaCategorias() {
        if ($this->listaCategorias === null) {
            $baseDatos = new BaseDatos();

            $this->listaCategorias = array();        
            foreach($baseDatos->getListaCategorias() as $val){
                $this->listaCategorias[] = new Categoria($val['cod_categoria'], $val['tipo_negocio']);
            }
        }
        
        return $this->listaCategorias;
    }

    public function getListaUsuarios() {

    }
}


?>