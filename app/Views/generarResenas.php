<!-- el form para enviar es setGenerarResenas -->
<?php
    $sesion = session() -> get("sesionIniciada");
    if(isset($sesion) && $sesion != 2 ||  !isset($sesion)) header('location: https://verifyreviews.es');
?>
<h3>Login</h3>
<div class="containerformGenerarResena">
    <form action="setGenerarResenas" method="post" class="formLogin">
        <input type="range" name="numResenas" step="5" max="20" min="5" required>
        <input type="submit" value="Generar codigos">
    </form>
</div>