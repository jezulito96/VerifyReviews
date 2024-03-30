<?php

namespace App\Models;


class Master {
    private static $instancia;
    private $listaCategorias;
    private $listaNegocios;

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
                $this->listaCategorias = new Categoria($val['cod_categoria'], $val['tipo_negocio']);
            }
        }
        
        return $this->listaCategorias;
    }

    public function getListaNegocios() {
        if ($this->listaNegocios === null) {

            $this->listaNegocios = array();        
            foreach(self::$baseDatos->getListaNegocios() as $val){
                $this->listaNegocios = new Negocio($val['cod_categoria'], $val['tipo_negocio']);
            }
        }
        
        return $this->listaNegocios;
    }

    public function setNegocio($nombre, $email, $calle, $ciudad, $pais, $telefono_negocio, $fotos, $foto_principal, $coordenadas, $sitio_web, $cod_categoria, $nombre_titular, $telefono_titular, $activo, $confirma_correo){
        // se guarda en BD 
        self::$baseDatos -> setNegocio($nombre, $email, $calle, $ciudad, $pais, $telefono_negocio, $fotos, $foto_principal, $coordenadas, $sitio_web, $cod_categoria, $nombre_titular, $telefono_titular, $activo, $confirma_correo);

        // se crea objeto y se añade a la lista de negocios


    }



}


?>