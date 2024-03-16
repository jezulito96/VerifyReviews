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

        echo view('cabecera');
        return view('index', $maleta);
    }

    public function resena(): string {

        $maleta['val'] = $this->request->getGet('clavePublica');
        return view('resena', $maleta);
    }
}
