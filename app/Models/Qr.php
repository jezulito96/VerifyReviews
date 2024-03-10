<?php

namespace App\Models;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\QROptions;
use chillerlan\QRCode\Output\QRGdImagePNG;


class Qr {
    public $ruta;
    public $texto;
    public $tamaño;
    public $nivel_correccion_errores;
    public $framSize;
    public $respuesta;
    public $formaQr;
    public $codigo;

    public function __construct(){
        $ruta = base_url() . 'images/qr/qrcode.png';

        $formaQr = new QROptions;

        $formaQr->version             = 7;
        $formaQr->outputInterface     = QRGdImagePNG::class;
        $formaQr->scale               = 40;
        $formaQr->outputBase64        = true;
        $formaQr->bgColor             = [200, 150, 200];
        $formaQr->imageTransparent    = true;
        #$formaQr->transparencyColor   = [233, 233, 233];
        $formaQr->drawCircularModules = false;
        $formaQr->drawLightModules    = true;
        $formaQr->keepAsSquare        = [
            QRMatrix::M_FINDER_DARK,
            QRMatrix::M_FINDER_DOT,
            QRMatrix::M_ALIGNMENT_DARK,
        ];
        $formaQr->moduleValues        = [
            // finder
            QRMatrix::M_FINDER_DARK    => [0, 63, 255], // dark (true)
            QRMatrix::M_FINDER_DOT     => [0, 63, 255], // finder dot, dark (true)
            QRMatrix::M_FINDER         => [233, 233, 233], // light (false), white is the transparency color and is enabled by default
            // alignment
            QRMatrix::M_ALIGNMENT_DARK => [255, 0, 255],
            QRMatrix::M_ALIGNMENT      => [233, 233, 233],
            // timing
            QRMatrix::M_TIMING_DARK    => [255, 0, 0],
            QRMatrix::M_TIMING         => [233, 233, 233],
            // format
            QRMatrix::M_FORMAT_DARK    => [67, 159, 84],
            QRMatrix::M_FORMAT         => [233, 233, 233],
            // version
            QRMatrix::M_VERSION_DARK   => [62, 174, 190],
            QRMatrix::M_VERSION        => [233, 233, 233],
            // data
            QRMatrix::M_DATA_DARK      => [0, 0, 0],
            QRMatrix::M_DATA           => [233, 233, 233],
            // darkmodule
            QRMatrix::M_DARKMODULE     => [0, 0, 0],
            // separator
            QRMatrix::M_SEPARATOR      => [233, 233, 233],
            // quietzone
            QRMatrix::M_QUIETZONE      => [233, 233, 233],
            // logo (requires a call to QRMatrix::setLogoSpace()), see QRImageWithLogo
            QRMatrix::M_LOGO           => [233, 233, 233],
        ];
        $this -> formaQr = $formaQr;
    }

    public function crear($url){
        $codigoQR = (new QRCode($this -> formaQr))->render($url);      
        // $codigoQR_base64 = 'data:image/webp;base64,' . base64_encode($codigoQR);  
            return $codigoQR;
        // $qrCode->text($this->texto)
        //        ->output(new QRImage($this->tamaño, $this->nivel_correccion_errores))
        //        ->errorCorrection($this->nivel_correccion_errores)
        //        ->margin($this->framSize)
        //        ->size($this->tamaño)
        //        ->writeFile($this->ruta);
    }
}
