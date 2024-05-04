<?php

namespace App\Models;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require FCPATH . '../vendor/autoload.php';

class Emailmailer {
    private $mail;
    private $correo_electronico;

    public function __construct() {
        $this->mail = new PHPMailer(true);
        // Configuración SMTP
        // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true; 
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $this->mail->Host = 'smtp.hostinger.com'; 
        $this->mail->Port = 465; 
        $this->mail ->CharSet = 'UTF-8';
        $this->mail->Username = 'verifyReviews@verifyreviews.es'; 
        $this->mail->Password = 'PwM}YKUx24i1$]HB'; 
        

    }

    public function enviarCorreo($destinatario, $asunto, $mensaje) {
        try {

            $this->mail->isHTML(false); 
            // Configuraciones generales del mensaje
            $this->mail->setFrom('verifyReviews@verifyreviews.es', 'VerifyReviews'); 
            $this->mail->addAddress($destinatario); 
            $this->mail->Subject = $asunto; 
            $this->mail->Body = $mensaje;


            // Enviar el correo
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function enviarImagen($destinatario,$imagen_qr){
        $asunto = "Reseña de Verify Reviews";

        try {

            // $this->mail->isHTML(true); 
            // // Configuraciones generales del mensaje
            // $this->mail->setFrom('verifyReviews@verifyreviews.es', 'VerifyReviews'); 
            // $this->mail->addAddress($destinatario); 
            // $this->mail->Subject = $asunto; 
            // $this ->mail -> Body = '
            // <h2>Escribe tu opinión sobre tu compra</h2>
            // <p>Descarga nuestro codigo Qr y escanealo para opinar sobre nuestro negocio</p>
            // <p>Ayuda a nuestro negocio a crecer, ¡Tú opinión nos importa!</p>
            // <center>
            // <table width=”450″ border=”0″ align=”center” cellpadding=”0″ cellspacing=”0″>
            // <tr>
            // <td>
            // <svg width="100" height="100">
            //             <image xlink:href="cid:codigo_Qr" width="100" height="100" />
            // </svg>
            // </td>
            // </tr>
            // </table>
            // </center>
                    
            //     ';
            // $this->mail->addEmbeddedImage(FCPATH . "otros/codigo_Qr.svg", 'codigo_Qr');

            $this->mail->isHTML(true); 
            $this->mail->setFrom('verifyReviews@verifyreviews.es', 'VerifyReviews'); 
            $this->mail->addAddress($destinatario); 
            $this->mail->Subject = $asunto; 
            
            // // Abrir el archivo SVG
            // $archivo = fopen($imagen_qr, 'r');
            
            // // Leer el contenido del archivo en un buffer
            // $contenido_png = '';
            // while (!feof($archivo)) {
            //     $contenido_png .= fread($archivo, 8192); // Leer 8192 bytes a la vez
            // }
            
            // fclose($archivo);
            
            // // Codificar el contenido en base64
            // $contenidoBase64 = base64_encode($contenido_png);
            
            // Incrustar el contenido base64 en el correo electrónico
            // $this->mail->addStringEmbeddedImage($contenidoBase64, 'codigo_Qr', 'codigo_Qr.png', 'base64', 'image/png');
            $this->mail->addEmbeddedImage($imagen_qr, 'codigo_Qr');
            
            // Cuerpo del mensaje con la etiqueta <img> que utiliza el ID del contenido incrustado
            $this->mail->Body = '
                <h2>Escribe tu opinión sobre tu compra</h2>
                <p>Descarga nuestro código QR y escanéalo para opinar sobre nuestro negocio</p>
                <p>Ayuda a nuestro negocio a crecer, ¡Tu opinión nos importa!</p>
                <center>
                    <img src="cid:codigo_Qr" type="image/png" alt="Código QR"  width="200px" height="200px">
                </center>
            ';

            
            // Enviar el correo
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}

