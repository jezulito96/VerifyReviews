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

    public function crearPdf($imagen_base64,$imagen_logo_base64, $nombreArchivo) {
        

        // $html = '
        //     <h1>Factura-3478</h1>
        //     <h3>Danos tu opini&oacute;n</h3>
        //     <img width="200px" height="200px" src="data:image/png;base64,' . $imagen_base64 . '" />
        // ';

        $html = '
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Factura de Alimentación a Domicilio</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }
                .container {
                    width: 80%;
                    margin: 0 auto;
                }
                .header {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .logo {
                    float: left;
                    margin-right: 20px;
                }
                .qr {
                    float: right;
                }
                .invoice {
                    border-collapse: collapse;
                    width: 100%;
                }
                .invoice th, .invoice td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }
                .invoice th {
                    background-color: #f2f2f2;
                }
                .total {
                    margin-top: 20px;
                    float: right;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Factura de Alimentación a Domicilio</h1>
                <div class="header">
                    <img width="150px" height="150px" src="data:image/png;base64,' . $imagen_logo_base64  . '" class="logo" />
                    <img width="200px" height="200px" src="data:image/png;base64,' . $imagen_base64 . '" class="qr" />
                </div>
                <p>Fecha: ' . date('d/m/Y') . '</p>
                <p>Número de Factura: 123456789</p>
                <table class="invoice">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Hamburguesa</td>
                            <td>2</td>
                            <td>$5.00</td>
                            <td>$10.00</td>
                        </tr>
                        <tr>
                            <td>Pizza</td>
                            <td>1</td>
                            <td>$10.00</td>
                            <td>$10.00</td>
                        </tr>
                    </tbody>
                </table>
                <div class="total">
                    <p>Total: $20.00</p>
                    <p>Envío: $5.00</p>
                    <h3>Total a pagar: $25.00</h3>
                </div>
            </div>
        </body>
        
        ';

        $this -> dompdf->setPaper('A4', 'portrait');

        // Cargar el HTML en Dompdf
        $this->dompdf->loadHtml($html);
        

        // Renderizar el PDF
        $this->dompdf->render();

        // Guardar el PDF en un archivo
        $this->dompdf->stream($nombreArchivo, array('Attachment' => true));

    }
}

