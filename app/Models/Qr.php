<?php
namespace App\Models;
require FCPATH . '../vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\QROptions;
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
            'addLogoSpace'        => true,
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

        // Generar el código QR sin logo
        $codigoQRFinal = $qrCode->render($texto);

        // Obtener la ruta del archivo del logo
        $logoPath = base_url() . 'img/logoMovil.png';

        // Insertar el logo en el SVG del código QR
        $this->cod_qr = str_replace('</svg>', '<image href="'.$logoPath.'" x="3" y="5" width="60px" height="20px" /></svg>', $codigoQRFinal);
        // $codigoQRFinal = str_replace('</svg>', '<image x="25" y="25" width="50" height="50" xlink:href="data:image/png;base64,'.$logoBase64.'" /></svg>', $codigoQRFinal);
    }

    public function crear(){
        // Retornar el código QR generado
        return $this->cod_qr;
    }
}
