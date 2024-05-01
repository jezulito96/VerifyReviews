<?php
// namespace App\Models;
// require FCPATH . '../vendor/autoload.php';

// use chillerlan\QRCode\Output\QRMarkupSVG;
// use chillerlan\QRCode\QRCode;
// use chillerlan\QRCode\Data\QRMatrix;
// use chillerlan\QRCode\QROptions;
// use chillerlan\QRCode\Output\QROutputInterface;

// class Qr extends QRCode {
//     private $cod_qr;

//     public function __construct(){

//         $options = new QROptions([
//             'version'             => 6,
//             'outputType'          => QRMarkupSVG::class,
//             'scale'               => 5,
//             'outputBase64'        => false,
//             'eccLevel'            => QRCode::ECC_L,
//             'addLogoSpace'        => true,
//             'bgColor'             => [200, 150, 200],
//             'imageTransparent'    => false,
//             'transparencyColor'   => [233, 233, 233],
//             'drawCircularModules' => true,
//             'drawLightModules'    => true,
//             'circleRadius'        => 0.4,
//             'keepAsSquare'        => [
//                 QRMatrix::M_FINDER_DARK,
//                 QRMatrix::M_FINDER_DOT,
//                 QRMatrix::M_ALIGNMENT_DARK,
//             ],
//             'moduleValues'      => [
//                 'dark'  => ['r' => 0, 'g' => 0, 'b' => 255, 'a' => 255], // Cambiar a azul
//                 'light' => ['r' => 255, 'g' => 255, 'b' => 255, 'a' => 255], // Fondo en blanco
//             ],
//         ]);

//         // Crear una instancia de QRCode con las opciones configuradas
//         $qrCode = new QRCode($options);

//         // Definir el texto que deseas codificar en el código QR
//         $texto = "https://verifyreviews.es/verifyreviews/resena";

//         // Generar el código QR sin logo
//         $codigoQRFinal = $qrCode->render($texto);

//         // Obtener la ruta del archivo del logo
//         $logoPath = FCPATH . 'img/logoMovil.png';

//         $logoData = file_get_contents($logoPath);

//         // Obtener el contenido base64 del logo
//         $logoBase64 = base64_encode($logoData);

//         // Insertar el logo en el SVG del código QR
//         $this->cod_qr = str_replace('</svg>', '<image x="5" y="5" class="imageLogo" xlink:href="data:image/png;base64,'.$logoBase64.'" /></svg>', $codigoQRFinal);
//     }

//     public function crear(){
//         // Retornar el código QR generado
//         return $this->cod_qr;
//     }
// }

// ------------------------------------------------------------------------

namespace App\Models;
require FCPATH . '../vendor/autoload.php';

use chillerlan\QRCode\Output\QRMarkupSVG;
use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\QROptions;

class Qr {
    private $cod_qr;
    private $options;
    public function __construct(){

        $this ->options = new QROptions;



    }

    public function crear($url){
        $this ->options -> scale = 5; 
        $this ->options->version          = 5;
        $this ->options->outputInterface   = QRMarkupSVG::class;
        $this ->options->outputBase64        = false;
        $this ->options->eccLevel            = EccLevel::L; 
        $this ->options->addQuietzone        = true;
        $this ->options->drawLightModules    = false;
        $this ->options->connectPaths        = true;
        $this ->options->drawCircularModules = true;
        $this ->options->circleRadius        = 0.45;
        $this ->options->keepAsSquare        = [
            QRMatrix::M_FINDER_DARK,
            QRMatrix::M_FINDER_DOT,
            QRMatrix::M_ALIGNMENT_DARK,
        ];
        // Retornar el código QR generado
        $this -> cod_qr = (new QRCode($this ->options))->render($url);
        return $this->cod_qr;
    }

    public function setColor($opcion){
        $colores = [
            [
                'gris_verify' => '#7A93AC',
                'azul_verify' => '#51a5d9',
                'azul_claro_verify' => '#92BCEA',
            ], 
            [
                'morado_oscuro' => '#D70071',
                'purpura_oscuro' => '#9C4E97',
                'azul_oscuro' => '#0035A9',
            ],
            [
                'azul_verify' => '#51a5d9',
                'morado_oscuro' => '#D70071',
            ]
            
            

        ];

        $this ->options->svgDefs = '
        <linearGradient id="gradient" x1="100%" y2="100%">
            <stop stop-color="' . $colores[$opcion][0] .'" offset="0"/>
            <stop stop-color="' . $colores[$opcion][1] .'" offset="0.4"/>
            <stop stop-color="' . $colores[$opcion][2] .'" offset="1"/>
        </linearGradient>
        <style><![CDATA[
            .dark{fill: url(#gradient);}
            .light{fill: #eaeaea;}
        ]]></style>';
    }


}


