<?php
namespace App\Models;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\QROptions;
use chillerlan\QRCode\QROptionsTrait;
use chillerlan\QRCode\Output\QRGdImagePNG;
use chillerlan\QRCode\Output\QROutputInterface;

class Qr extends QRCode {
    private $cod_qr;

    public function __construct(){
        $options = new QROptions([
            'version'             => 6,
            'outputType'          => QROutputInterface::MARKUP_SVG,
            'scale'               => 10,
            'outputBase64'        => false,
            'eccLevel'            => QRCode::ECC_L,
            'bgColor'             => [200, 150, 200],
            'imageTransparent'    => false,
            'transparencyColor'   => [233, 233, 233],
            'drawCircularModules' => true,
            'drawLightModules'    => true,
            'circleRadius'        => 0.4,
            'keepAsSquare'        => [
                QRMatrix::M_FINDER_DARK,
                QRMatrix::M_FINDER_DOT,
                QRMatrix::M_ALIGNMENT_DARK,
            ],
            'moduleValues'      => [
                'dark'  => ['r' => 0, 'g' => 0, 'b' => 255, 'a' => 255], // Cambiar a azul
                'light' => ['r' => 255, 'g' => 255, 'b' => 255, 'a' => 255], // Fondo en blanco
            ],
        ]);

        // Crear una instancia de QRCode con las opciones configuradas
        $qrCode = new QRCode($options);

        // Definir el texto que deseas codificar en el código QR
        $texto = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";

        // Establecer el texto en el código QR
        $qrCode->setText($texto);

        // Generar el código QR como un archivo SVG
        $this->cod_qr = $qrCode->writeString();
    }

    public function crear(){
        // Retornar el código QR generado
        return $this->cod_qr;
    }
}