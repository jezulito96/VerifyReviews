<?php


if(isset($todo_guay)){
?>

    <h2 class="bien">¡Email Confirmado!</h2>
    <img src="<?php echo base_url() . "img/email_confirm.jpg"; ?>" style="margin:0px auto;width:60vw" />
    <p style="padding:10px;margin-bottom:20px;">Gracias por confirmar tu dirección de correo electrónico. Ahora tienes acceso completo a todas nuestras funcionalidades.</p>
    <a style='margin-top:40px;margin-left:20px;' href='http://verifyReviews.es/verifyreviews/generarResenas' class='btn_enviar_largo' style='margin-left:20px'> 
        Ir al inicio
    </a>

<?php
}elseif(isset($error)){

}