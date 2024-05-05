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

    public function crearPdf($rutaImagen, $nombreArchivo) {
        // HTML para el contenido del PDF con la imagen
        // $html = '
        // <head>
        //     <title>PDF con imagen</title>
        // </head>
        // <body>
        //     <img type="image/png" src="' . $rutaImagen . '" alt="C&oacute;digo Qr">
        // </body>
        // ';

        $html = '
            <h1>Factura-3478</h1>
            <h3>Pon una reseña</h3>
            <img src="'. $rutaImagen .'" type="image/png" />
        ';

        $this -> dompdf->setPaper('A4', 'Inandscape');

        // Cargar el HTML en Dompdf
        $this->dompdf->loadHtml(utf8_decode($html));
        

        // Renderizar el PDF
        $this->dompdf->render();

        // Guardar el PDF en un archivo
        $this->dompdf->stream($nombreArchivo, array('Attachment' => true));

    }
}

