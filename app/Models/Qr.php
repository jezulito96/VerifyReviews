<?php
namespace App\Models;


use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\QROptions;
use chillerlan\QRCode\Output\QRGdImagePNG;
use chillerlan\QRCode\Output\QROutputInterface;

class Qr {
    private $hash;
    private $cod_qr;
    private $url;
    private $nombreNegocio;

    public function __construct(){
        $ruta = base_url() . 'images/qr/qrcode.png';

        $cod_qr = new QROptions;

         
        // $cod_qr->bgColor             = [200, 150, 200]; // color de fondo
        $cod_qr->imageTransparent    = true; // fondo transparente o no
        #$cod_qr->transparencyColor   = [233, 233, 233]; //
        $cod_qr->drawCircularModules = false; // modulos en forma de cirulos o no
        $cod_qr->drawLightModules    = true; // puntos en las esquinas del Qr

        $this -> cod_qr = $cod_qr;
    }
    public function crear($url){
        $codigoQR = (new QRCode($this -> cod_qr))->render($url);      

        return $codigoQR;
    }
    public function setColor($color) {

        $color = strtolower($color);

        $colores = [
            "rojo" => [255, 0, 0],
            "verde" => [0, 255, 0],
            "azul" => [0, 0, 255], 
        ];

        // Verificar si el color solicitado está en la lista de colores predefinidos
        if(isset($colores[$color])) {
            $this -> cod_qr -> fgColor = $colores[$color];
        }

    }
    public function setTamano($tamano){
        $this -> cod_qr -> scale = $tamano; 
    }
    public function setTipo($tipo){

        if($tipo == "png"){
            $this -> cod_qr -> outputInterface = QRGdImagePNG::class; 
            $this -> cod_qr -> outputBase64 = true;
        }
        
    }

    public function setHash($hash) {
        $this->hash = $hash;
    }

    public function getHash() {
        return $this->hash;
    }

    public function setQr($qr) {
        $this->qr = $qr;
    }

    public function getQr() {
        return $this->qr;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setNombreNegocio($nombreNegocio) {
        $this->nombreNegocio = $nombreNegocio;
    }

    public function getNombreNegocio() {
        return $this->nombreNegocio;
    }
}
        // $cod_qr->keepAsSquare        = [
        //     QRMatrix::M_FINDER_DARK,
        //     QRMatrix::M_FINDER_DOT,
        //     QRMatrix::M_ALIGNMENT_DARK,
        // ];
        