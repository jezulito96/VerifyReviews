<?php

namespace App\Models;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

class Emailmailer {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);
        // Configuración SMTP
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true; 
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $this->mail->Host = 'smtp.hostinger.com'; 
        $this->mail->Port = 465; 
        $this->mail ->CharSet = 'UTF-8';
        $this->mail->Username = 'verifyReviews@verifyreviews.es'; 
        $this->mail->Password = 'PwM}YKUx24i1$]HB'; 
        $this->mail->SMTPKeepAlive = true;
        $this->mail->Mailer = "smtp";
        

    }

    public function enviarCorreo($destinatario, $asunto, $mensaje) {
        try {
            // Configuraciones del mensaje
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
}

