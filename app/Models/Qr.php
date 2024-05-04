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

use chillerlan\QRCode\Output\QRGdImagePNG;
use chillerlan\QRCode\Output\QRImage;

use chillerlan\QRCode\Output\QRMarkupSVG;
use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\QROptions;

class Qr {
    private $cod_qr;
    private $options;
    private $genera_varios_qr;
    private $url;
    private $correo_electronico;
    


    public function __construct(){

        $this ->options = new QROptions;




        // se crea una clave aleatoria de 16 bytes
        $clavePublica = random_bytes(8);

        // Clave privada y vector de inicialización para guardar en la base de datos
        $clave_privada = random_bytes(32); 
        $vector_inicializacion = random_bytes(16);   

        // se encripta la clave con -->  AES-256-CBC
        $claveCifrada = openssl_encrypt($clavePublica, 'AES-256-CBC', $clave_privada, OPENSSL_RAW_DATA, $vector_inicializacion);

        // se pasa la clave a hexadecimal
        $claveCifradaHex = bin2hex($claveCifrada);

        // se añade a la url para luego crear el qr
        $this -> url = "http://verifyReviews.es/verifyreviews/resena?publicKey=" . $claveCifradaHex;

        // se guardan las claves en la base de datos
        $baseDatos = new BaseDatos();
        $baseDatos -> setCodigoQr($claveCifradaHex,$clave_privada,$vector_inicializacion);

    }


    /**
     * Genera QR segun la accion que seleccione el usuario
     * 
     * @param int $accion
     *      - 1 automatico -> Devuelve una imagen que se muestra directamente en pantalla
     *      - 2 Email -> Manda un email al usuario con un codigo Qr
     *      - 3 PDF -> Genera un pdf con un codigo Qr
     *      - 4 Genera imagenes para poder descargarla 
     * @param int $numero numero de codigos qr que se deben generar
     */
    public function crear($accion, $numero = 1){

        // if($numero > 1){
        //     $this -> genera_varios_qr = true;
        // }        

        if($accion == 1){

            $this ->options -> scale = 5; 
            $this ->options->version          = 5;
            $this ->options->outputInterface   = QRMarkupSVG::class;
            // $this ->options->outputInterface   = QRGdImagePNG::MIME_TYPE;
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

            $this -> cod_qr = (new QRCode($this ->options))->render($this -> url);
            return $this->cod_qr;
        }elseif($accion == 2){

            $this ->  options = new QROptions([
                'version'             => 5,
                'outputInterface'     => QRImage::class,
                'outputType'          => QRCode::OUTPUT_IMAGE_PNG,
                'scale'               => 20,
                'drawCircularModules' => true,
                'drawLightModules'    => false,
                'circleRadius'        => 0.5, // Ajustar el radio de los círculos
                'moduleValues'        => [
                    'dark'  => ['r' => 122, 'g' => 147, 'b' => 172, 'a' => 255], // Color oscuro (negro)
                ],
                'dark'  => ['r' => 122, 'g' => 147, 'b' => 172, 'a' => 255], // Color oscuro (negro)
                'addQuietzone'        => true, // Agregar zona de silencio
                'imageTransparent'    => false, // Hacer la imagen transparente
            ]);

            $this -> cod_qr = (new QRCode($this ->options))->render($this -> url);
            return $this->cod_qr;

            // $email = new Emailmailer();
            // $asunto = "Deja Tu reseña";
            // $mensaje = "Deja tu opinión en Verify Reviews escaneando el codigo Qr";
            // $email -> enviarCorreo($this -> correo_electronico, $asunto, $mensaje,$this -> imagen_qr);
        }
        
    }

    

    public function setColor($opcion){
        
        $colores = [
            [
                0 => '#7A93AC', //gris_verify
                1 => '#92BCEA', // azul_claro_verify
                2 => '#51a5d9', // azul_verify
            ], 
            [
                0 => '#D70071', //morado
                1 => '#9C4E97', // purpura
                2 => '#0035A9', // azul oscuro 
            ],
            [
                // 2.tonos verdes marrones
                0 => '#3E8989', 
                1 => '#05F140',
                2 => '#2CDA9D' 
            ],
            [
                // 3.tonos grises
                0 => '#7A9E9F', 
                1 => '#B8D8D8',
                2 => '#4F6367' 
            ],
            [
                // 4.tonos marrones
                0 => '#7F534B', 
                1 => '#8C705F',
                2 => '#1E1A1D' 
            ],
            [
                // 5. tonos rosas...
                0 => '#ffb5a7', 
                1 => '#f9dcc4',
                2 => '#fec89a' 
            ],
            [
                // 6. grises casi negros
                0 => '495057', 
                1 => '#343a40', 
                2 => '#6c757d'
            ]
        ];

        $this ->options->svgDefs = '
        <linearGradient id="gradient" x1="100%" y2="100%">
            <stop stop-color="' . $colores[$opcion][0] .'" offset="0"/>
            <stop stop-color="' . $colores[$opcion][1] .'" offset="0.5"/>
            <stop stop-color="' . $colores[$opcion][2] .'" offset="1"/>
        </linearGradient>
        <style><![CDATA[
            .dark{fill: url(#gradient);}
            .light{fill: #eaeaea;}
        ]]></style>';

    }




}


