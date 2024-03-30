<?php

namespace App\Models;


class Master {
    private $listaCategorias;

    public function getListaCategorias() {
        $baseDatos = new BaseDatos();

        $listaCategorias = array();        
        foreach($baseDatos -> getListaCategorias() as $i => $val){
            array_push($listaCategorias, new Categoria($val['cod_categoria'] , $val['tipo_negocio'] ));
        }
        
        return $listaCategorias;
    }

    public function getListaUsuarios() {

    }




}

?>