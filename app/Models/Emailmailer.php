<?php

namespace App\Models;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require FCPATH . '../vendor/autoload.php';

class Emailmailer {
    private $mail;

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

    public function enviarCorreo($destinatario, $asunto, $mensaje,$imagen = null) {
        try {

            // para enviar imagenes
            if ($imagen !== null) {
                $this->mail->isHTML(true); 
                $this->mail->AddEmbeddedImage($imagen['contenido'], $imagen['cid'], $imagen['nombre'], 'base64', $imagen['tipo']);
                $this ->mail -> Body = file_get_contents(base_url() . 'otros/plantillaEmail.html');
            }else{
                //para enviar solo texto
                $this->mail->isHTML(false); 
                $this->mail->Body = $mensaje; 
            }

            // Configuraciones generales del mensaje
            $this->mail->setFrom('verifyReviews@verifyreviews.es', 'VerifyReviews'); 
            $this->mail->addAddress($destinatario); 
            $this->mail->Subject = $asunto; 
            


            // Enviar el correo
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

