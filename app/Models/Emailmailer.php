<?php

namespace App\Models;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Emailmailer {

    public function __construct($destinatario, $asunto, $mensaje) {
        $correo = new PHPMailer(true);
        // Configuración SMTP
        $correo->isSMTP();
        $correo->SMTPAuth = true; 
        $correo->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $correo->Host = 'smtp.hostinger.com'; 
        $correo->Port = 465; 
        $correo ->CharSet = 'UTF-8';
        $correo->Username = 'verifyReviews@verifyreviews.es'; 
        $correo->Password = 'PwM}YKUx24i1$]HB'; 
        $correo->SMTPKeepAlive = true;
        $correo->Mailer = "smtp";

        // Configuraciones del mensaje
        $correo->setFrom('verifyReviews@verifyreviews.es', 'VerifyReviews'); 
        $correo->addAddress($destinatario); 
        $correo->Subject = $asunto; 
        $correo->Body = $mensaje; 

        // Enviar el correo
        $correo->send();


    }

    public function enviarCorreo() {
        
    }
}

