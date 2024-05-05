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
            <img type="image/png" src="' . $rutaImagen . '" alt="C&oacute;digo Qr">
            
        </body>
        </html>
        ';

        // Cargar el HTML en Dompdf
        $this->dompdf->loadHtml($html);

        // Renderizar el PDF
        $this->dompdf->render();

        // Guardar el PDF en un archivo
        // $this->dompdf->stream($nombreArchivo, array('Attachment' => true));

                // Obtener el contenido del PDF como una cadena
                $output = $this->dompdf->output();

                // Enviar el PDF como una descarga al navegador
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment;filename="' . $nombreArchivo . '"');
                echo $output;
    }
}

