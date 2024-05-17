<?php

namespace App\Models;


class Master {
    private static $instancia;
    private $listaCategorias;
    private $listaNegocios;

    private $listaResenas;

    private function __construct() {}

    public static function obtenerInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new Master();
        }
        return self::$instancia;
    }

    public function getListaCategorias() {
        $baseDatos = new BaseDatos();
        if ($this->listaCategorias === null) {

            $this->listaCategorias = array();        
            foreach($baseDatos->getListaCategorias() as $val){
                $this->listaCategorias[] = new Categoria($val['cod_categoria'], $val['tipo_negocio']);
            }
        }
        
        return $this->listaCategorias;
    }

    public function getListaNegocios() {
        $baseDatos = new BaseDatos();
        if ($this->listaNegocios === null) {

            $this->listaNegocios = array();        
            foreach($baseDatos->getListaNegocios() as $val){
                $this->listaNegocios[] = new Negocio(
                    $val['nombre'], 
                    $val['email'], 
                    $val['calle'], 
                    $val['ciudad'], 
                    $val['pais'], 
                    $val['telefono_negocio'], 
                    $val['fotos'], // Cambié 'fotosBD' a 'fotos' para que coincida con el array $val
                    $val['foto_principal'], 
                    $val['coordenadas'], 
                    $val['sitio_web'], 
                    $val['cod_categoria'], 
                    $val['nombre_titular'], 
                    $val['telefono_titular'], 
                    $val['activo'],
                    $val['confirma_correo']
                );
                
            }
        }
        
        return $this->listaNegocios;
    }

    public function obj_categoria($cod_categoria){
       
        foreach($this -> listaCategorias as $categoria){
            if($cod_categoria == $categoria -> getCodCategoria()){
                return $categoria;
            }
        }
        
    }

    public function setNegocio($nombre, $email, $calle, $ciudad, $pais, $telefono_negocio, $fotos, $foto_principal, $coordenadas, $sitio_web, $cod_categoria, $nombre_titular, $telefono_titular, $activo, $confirma_correo) {
        // busco el objeto de la categoria para meterla en el negocio
        $instancia = self::obtenerInstancia();
        $categoria_obj = $instancia -> obj_categoria($cod_categoria);

        // se crea objeto y se añade a la lista de negocios
        $this->listaNegocios[] = new Negocio(
            $nombre, 
            $email, 
            $calle, 
            $ciudad, 
            $pais, 
            $telefono_negocio, 
            $fotos, // Cambié 'fotosBD' a 'fotos' para que coincida con el constructor de la clase Negocio
            $foto_principal, 
            $coordenadas, 
            $sitio_web, 
            $categoria_obj, 
            $nombre_titular, 
            $telefono_titular, 
            $activo,
            $confirma_correo
        );
    }

    public function setResena($cod_reseña, $cod_negocio,$cod_usuario,$fecha_creacion,$fecha_servicio,$calificacion,$titulo,$opinion,$fotos,$qr_key,$estado,$nickname){
        $baseDatos = new BaseDatos();

        // primero tengo que sacar el qr_id del qr_key que es la clave publica 
        // $claveQr = hex2bin($qr_key);
        $id = $baseDatos ->getQr_id($qr_key);
        $baseDatos -> desactivarQr(intval($id));
        
        // después hago la insertcion a la base de datos con el id que me devuelve el metodo anterior
        if($id !=false){
            $baseDatos -> setResena($cod_reseña, $cod_negocio,$cod_usuario,$fecha_creacion,$fecha_servicio,$calificacion,$titulo,$opinion,$fotos,intval($id),$estado,$nickname);
            return true;
        }else{
            return false;
        }

    }

    // public function negocios_categoria($categoria){

    //     $lista_negocios_cat = array();
    //     foreach($this -> listaNegocios as $key => $negocio){
            
    //         // if($negocio -> cod_categoria == $categoria){
    //         //     array_push($lista_negocios_cat, $negocio);
    //         // }
    //     }

    //     return $lista_negocios_cat;
    // }


    // public function setListaResenas($cod_negocio){

    // }

    // public function setTopResenas(){

    // }


}


