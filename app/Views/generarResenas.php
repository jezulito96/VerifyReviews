<?php 
    // primero se muestra el formulario y cuando se envia 
    if(!isset($qrGenerados)){
?>
<h3>Genera reseñas para tus clientes</h3>
<p>
    Cada reseña será unica, de esta manera protegemos tu negocio. Nos aseguramos de que las reseñas que recibe tu negocio sean de tus clientes.
</p>
<div class="containerformGenerarResena">
    <form action="setGenerarResenas" method="post" class="formLogin">
        <input type="range" name="numResenas" step="5" max="20" min="5" required>
        <input type="submit" value="Generar codigos">
        
    </form>
</div>
<?php
    }else{
        echo $qrGenerados;
?><?php



    }


