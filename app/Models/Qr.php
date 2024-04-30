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
        $this->cod_qr = (new QRCode($options))->render('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
    }

    public function __construct(){
        $options = new SVGWithLogoOptions;

        // SVG logo options (see extended class)
        $options->svgLogo             = __DIR__.'/github.svg'; // logo from: https://github.com/simple-icons/simple-icons
        $options->svgLogoScale        = 0.25;
        $options->svgLogoCssClass     = 'dark';
        // QROptions
        $options->version             = 5;
        $options->outputInterface     = QRSvgWithLogo::class;
        $options->outputBase64        = false;
        $options->eccLevel            = EccLevel::H; // ECC level H is necessary when using logos
        $options->addQuietzone        = true;
        $options->drawLightModules    = true;
        $options->connectPaths        = true;
        $options->drawCircularModules = true;
        $options->circleRadius        = 0.45;
        $options->keepAsSquare        = [
            QRMatrix::M_FINDER_DARK,
            QRMatrix::M_FINDER_DOT,
            QRMatrix::M_ALIGNMENT_DARK,
        ];
        // https://developer.mozilla.org/en-US/docs/Web/SVG/Element/linearGradient
        $options->svgDefs = '
            <linearGradient id="gradient" x1="100%" y2="100%">
                <stop stop-color="#D70071" offset="0"/>
                <stop stop-color="#9C4E97" offset="0.5"/>
                <stop stop-color="#0035A9" offset="1"/>
            </linearGradient>
            <style><![CDATA[
                .dark{fill: url(#gradient);}
                .light{fill: #eaeaea;}
            ]]></style>';


        $out = (new QRCode($options))->render('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
    }

    public function crear(){
        // Retornar el código QR generado
        return $this->cod_qr;
    }
}
