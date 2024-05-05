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
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <title>PDF con imagen</title>
        </head>
        <body>
            <img src="' . $rutaImagen . '" alt="Imagen">
        </body>
        </html>
        ';

        // Cargar el HTML en Dompdf
        $this->dompdf->loadHtml($html);

        // Renderizar el PDF
        $this->dompdf->render();

        // Guardar el PDF en un archivo
        $this->dompdf->stream($nombreArchivo, array('Attachment' => true));
    }
}

