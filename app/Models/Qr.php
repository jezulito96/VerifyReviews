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
        // $codigoQR_base64 = 'data:image/webp;base64,' . base64_encode($codigoQR);  
            return $codigoQR;
        // $qrCode->text($this->texto)
        //        ->output(new QRImage($this->tamaño, $this->nivel_correccion_errores))
        //        ->errorCorrection($this->nivel_correccion_errores)
        //        ->margin($this->framSize)
        //        ->size($this->tamaño)
        //        ->writeFile($this->ruta);
    }
    public function setColor($color) {

        // if($color = "red"){
        //     $this -> cod_qr -> outputInterface = [

        //     ];
        // }

        $this -> cod_qr-> qroutputinterface = [
            // finder
            QRMatrix::M_FINDER_DARK    => [0, 0, 255], // dark (true)
            // QRMatrix::M_FINDER_DOT     => [0, 63, 255], // finder dot, dark (true)
            // QRMatrix::M_FINDER         => [233, 233, 233], // light (false), white is the transparency color and is enabled by default
            // // alignment
            // QRMatrix::M_ALIGNMENT_DARK => [255, 0, 255],
            // QRMatrix::M_ALIGNMENT      => [233, 233, 233],
            // // timing
            // QRMatrix::M_TIMING_DARK    => [255, 0, 0],
            // QRMatrix::M_TIMING         => [233, 233, 233],
            // // format
            // QRMatrix::M_FORMAT_DARK    => [67, 159, 84],
            // QRMatrix::M_FORMAT         => [233, 233, 233],
            // // version
            // QRMatrix::M_VERSION_DARK   => [62, 174, 190],
            // QRMatrix::M_VERSION        => [233, 233, 233],
            // // data
            // QRMatrix::M_DATA_DARK      => [0, 0, 0],
            // QRMatrix::M_DATA           => [233, 233, 233],
            // // darkmodule
            // QRMatrix::M_DARKMODULE     => [0, 0, 0],
            // // separator
            // QRMatrix::M_SEPARATOR      => [233, 233, 233],
            // // quietzone
            // QRMatrix::M_QUIETZONE      => [233, 233, 233],
            // // logo (requires a call to QRMatrix::setLogoSpace()), see QRImageWithLogo
            // QRMatrix::M_LOGO           => [233, 233, 233],
        ];
        
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
    // public function set

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
        