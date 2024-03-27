<?php

namespace App\Controllers;
use App\Models\BaseDatos;
use App\Models\Qr;
use App\Models\Categoria;
use App\Models\Comercio;
use App\Models\Mapa;
use App\Models\Resena;
use App\Models\Usuario;
use App\Models\UsuarioRegistrado;
use App\Models\UsuarioSinRegistrar;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Output\QRImage;



class Home extends BaseController{

    private $listaCategorias = 0;

    // public function index(): string {

    //     $baseDatos = new BaseDatos();

    //     // $maleta['listaCategorias'] = $baseDatos -> getListaCategorias();

    //     $qr = new Qr();

    //     $clavePublica = "holaaaa";

    //     $maleta['qr'] = $qr -> crear("http://verifyReviews.es/verifyreviews/resena?clavePublica=" . $clavePublica);
        

    //     //vistas
    //     $maleta['head_content'] = view('head_content');
    //     $maleta['header_content'] = view('header_content');
    //     // echo view('head_content');
    //     return view('index', $maleta);
    // }

    public function index(): string {
        $baseDatos = new BaseDatos();
        //recojo de la lista BD las categorías y las convierto en objetos si listaCategorias es null
        if ($this -> listaCategorias == 0){
            echo "entra1";
            $listaCategorias = array();
            foreach($baseDatos -> getListaCategorias() as $i => $val){
                array_push($listaCategorias, new Categoria($val['cod_categoria'] , $val['tipo_negocio'] ));
            }
            $maleta_index['listaCategorias'] = $listaCategorias;

            $this -> listaCategorias = $listaCategorias;
        }

         


        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content'); 
        $maleta['index_content'] = view('index_content', $maleta_index); 
        return view('index', $maleta);
    }

    public function resena(): string {
        
        $maleta['val'] = $this->request->getGet('clavePublica');

        
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['resena_content'] = view('resena_content');
        return view('resena', $maleta);
    }

    public function nuevoNegocio(): string {
        $baseDatos = new BaseDatos();
        //recojo de la lista BD las categorías y las convierto en objetos si listaCategorias es null
        if ($this -> listaCategorias == 0){
            echo "entra2";
            $listaCategorias = array();
            foreach($baseDatos -> getListaCategorias() as $i => $val){
                array_push($listaCategorias, new Categoria($val['cod_categoria'] , $val['tipo_negocio'] ));
            }
            $nuevo_negocio['listaCategorias'] = $listaCategorias;

            $this -> listaCategorias = $listaCategorias;
        }
        

        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['nuevo_negocio'] = view('nuevo_negocio',$nuevo_negocio);
        return view('index', $maleta);
    }
}
