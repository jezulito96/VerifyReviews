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
        $scale = 5;
        $logoWidth = 50;
        $logoHeight = 20;
        $options = new QROptions([
            'version'             => 6,
            'outputType'          => QROutputInterface::MARKUP_SVG,
            'scale'               => $scale,
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
        $texto = "https://verifyreviews.es/verifyreviews/resena";

        // Generar el código QR sin logo
        $codigoQRFinal = $qrCode->render($texto);

        // Obtener la ruta del archivo del logo
        $logoPath = FCPATH . 'img/logoMovil.png';

        $logoData = file_get_contents($logoPath);

        // Obtener el contenido base64 del logo
        $logoBase64 = base64_encode($logoData);

        // Insertar el logo en el SVG del código QR
        // $this->cod_qr = str_replace('</svg>', '<image x="25" y="25" width="50px" height="50px" xlink:href="data:image/png;base64,'.$logoBase64.'" /></svg>', $codigoQRFinal);
        // Calcular las coordenadas para centrar la imagen del logo dentro del código QR
        $this->cod_qr = str_replace('</svg>', '<image x="'.(($options->scale * 25) - ($logoWidth / 2)).'" y="'.(($options->scale * 25) - ($logoHeight / 2)).'" width="'.$logoWidth.'" height="'.$logoHeight.'" xlink:href="data:image/png;base64,'.$logoBase64.'" /></svg>', $codigoQRFinal);

        // Insertar el logo en el SVG del código QR
        // $this->cod_qr = str_replace('</svg>', '<image href="'.$logoPath.'" x="11" y="10" width="25px" height="25px" /></svg>', $codigoQRFinal);
        // $codigoQRFinal = str_replace('</svg>', '<image x="25" y="25" width="50" height="50" xlink:href="data:image/png;base64,'.$logoBase64.'" /></svg>', $codigoQRFinal);
    }

    public function crear(){
        // Retornar el código QR generado
        return $this->cod_qr;
    }
}
