<?php

namespace App\Controllers;
use App\Models\BaseDatos;
use App\Models\Master;
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
        $master = Master::obtenerInstancia();
        $maleta_index['listaCategorias'] = $master->getListaCategorias();
        
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
        $master = Master::obtenerInstancia();
        $nuevo_negocio['listaCategorias'] = $master->getListaCategorias();


        
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['nuevo_negocio'] = view('nuevo_negocio',$nuevo_negocio);
        return view('index', $maleta);
    }

    public function setNegocio(): string {
        // $this->request->getGet('nombre');
        // $this->request->getGet('email');
        // $this->request->getGet('calle');
        // $this->request->getGet('ciudad');
        // $this->request->getGet('pais');
        // $this->request->getGet('fotos');
        // $this->request->getGet('sitio_web');
        // $this->request->getGet('categoria');
        $latitud = $this->request->getGet('latitud');
        $longitud = $this->request->getGet('longitud');


        if(isset($latitud)) {
            echo $latitud;
        }else{
            echo "naaa";
        }
        if(isset($longitud)) {
            echo $longitud;
        }else{
            echo "naaa";
        }
        
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['nuevo_negocio'] = view('nuevo_negocio');
        return view('index', $maleta);
    }
}
