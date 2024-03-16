<?php

namespace App\Controllers;
use App\Models\BaseDatos;
use App\Models\Qr;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Output\QRImage;



class Home extends BaseController{

    public function index(): string {

        $baseDatos = new BaseDatos();

        $maleta['listaCategorias'] = $baseDatos -> getListaCategorias();

        $qr = new Qr();

        $clavePublica = "holaaaa";

        $maleta['qr'] = $qr -> crear("http://verifyReviews.es/verifyreviews/resena?clavePublica=" . $clavePublica);
        

        //imagen json
                
        $jsonFilePath = base_url() . 'imgs/imgMenu.json';

        // Verificar si el archivo existe
        if (file_exists($jsonFilePath)) {
            $maleta['jsonContent'] = file_get_contents($jsonFilePath);
        } else {
            echo 'El archivo JSON no existe.';
        }

        

        //vistas
        $maleta['cabecera'] = view('cabecera');
        $maleta['header_content'] = view('header_content');
        // echo view('cabecera');
        return view('index', $maleta);
    }

    public function resena(): string {
        
        $maleta['val'] = $this->request->getGet('clavePublica');

        
        //vistas
        $maleta['cabecera'] = view('cabecera');
        $maleta['header_content'] = view('header_content');
        return view('resena', $maleta);
    }
}
