<?php
namespace App\Models;
use Dompdf\Dompdf;
require FCPATH . '../vendor/autoload.php';

class Pdf {
    private $dompdf;

    public function __construct() {
        // Inicializar Dompdf
        $this->dompdf = new Dompdf();
    }

    public function crearPdf($rutaHtml, $nombreArchivo) {
        // HTML para el contenido del PDF con la imagen
        // $html = '
        // <head>
        //     <title>PDF con imagen</title>
        // </head>
        // <body>
        //     <img type="image/png" src="' . $rutaImagen . '" alt="C&oacute;digo Qr">
        // </body>
        // ';

        // $html = '
        //     <h1>Factura-3478</h1>
        //     <h3>Danos tu opini&oacute;n</h3>
        //     <img src="'. $rutaImagen .'" type="image/png" />
        // ';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rutaHtml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html = curl_exec($ch);
        curl_close($ch);

        $this -> dompdf->setPaper('A4', 'portrait');

        // Cargar el HTML en Dompdf
        $this->dompdf->loadHtml($html);
        

        // Renderizar el PDF
        $this->dompdf->render();

        // Guardar el PDF en un archivo
        $this->dompdf->stream($nombreArchivo, array('Attachment' => true));

    }

}

