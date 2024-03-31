<?php

namespace App\Models;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

class Emailmailer {

    public function __construct($destinatario, $asunto, $mensaje) {
        $correo = new PHPMailer(true);

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
        $correo ->Timeout = 30;

        $correo->setFrom('verifyReviews@verifyreviews.es', 'VerifyReviews'); 
        $correo ->isHTML(false);
        $correo->addAddress($destinatario); 
        $correo->Subject = $asunto; 
        $correo->Body = $mensaje; 

        $correo->send();


    }

    public function enviarCorreo() {
        
    }
}

