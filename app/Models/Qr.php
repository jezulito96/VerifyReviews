<?php
namespace App\Models;
require FCPATH . '../vendor/autoload.php';

use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\Output\QRMarkupSVG;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\QROptions;
use chillerlan\QRCode\Output\QROutputInterface;

class Qr extends QRCode {
    private $cod_qr;

    public function __construct(){

        $options = new QROptions([
            'svgLogo'             => FCPATH . 'img/logoMovil.png',
            'svgLogoScale'        => 0.25,
            'svgLogoCssClass'     => 'dark',
            'version'             => 6,
            'outputType'          => QRMarkupSVG::MIME_TYPE,
            'scale'               => 5,
            'outputBase64'        => false,
            'eccLevel'            => EccLevel::H,
            'addQuietzone'        => true,
            'connectPaths'        => true,
            // 'addLogoSpace'        => true,
            // 'bgColor'             => [200, 150, 200],
            // 'imageTransparent'    => false,
            // 'transparencyColor'   => [233, 233, 233],
            'drawCircularModules' => true,
            // 'drawLightModules'    => true,
            'circleRadius'        => 0.45,
            'keepAsSquare'        => [
                QRMatrix::M_FINDER_DARK,
                QRMatrix::M_FINDER_DOT,
                QRMatrix::M_ALIGNMENT_DARK,
            ],
            // 'moduleValues'      => [
            //     'dark'  => ['r' => 0, 'g' => 0, 'b' => 255, 'a' => 255], // Cambiar a azul
            //     'light' => ['r' => 255, 'g' => 255, 'b' => 255, 'a' => 255], // Fondo en blanco
            // ],
        ]);
        $options ->svgDefs = '
        <linearGradient id="gradient" x1="100%" y2="100%">
            <stop stop-color="#D70071" offset="0"/>
            <stop stop-color="#9C4E97" offset="0.5"/>
            <stop stop-color="#0035A9" offset="1"/>
        </linearGradient>
        <style><![CDATA[
            .dark{fill: url(#gradient);}
            .light{fill: #eaeaea;}
        ]]></style>';
        $out = (new QRCode($options))->render('https://verifyreviews.es/verifyreviews/resena');
        if(php_sapi_name() !== 'cli'){
            header('Content-type: image/svg+xml');
        
            if(extension_loaded('zlib')){
                header('Vary: Accept-Encoding');
                header('Content-Encoding: gzip');
                $out = gzencode($out, 9);
            }
        }
        $this -> cod_qr = $out;
        // Definir el texto que deseas codificar en el código QR
        // $texto = "https://verifyreviews.es/verifyreviews/resena";


        // // Generar el código QR sin logo
        // $codigoQRFinal = $qrCode->render($texto);

        // // Obtener la ruta del archivo del logo
        // $logoPath = FCPATH . 'img/logoMovil.png';

        // $logoData = file_get_contents($logoPath);

        // // Obtener el contenido base64 del logo
        // $logoBase64 = base64_encode($logoData);

        // // Insertar el logo en el SVG del código QR
        // $this->cod_qr = str_replace('</svg>', '<image x="5" y="5" class="imageLogo" xlink:href="data:image/png;base64,'.$logoBase64.'" /></svg>', $codigoQRFinal);
    }

    public function crear(){
        // Retornar el código QR generado
        return $this->cod_qr;
    }
}
