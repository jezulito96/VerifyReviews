
<h3>Login</h3>
<?php 
    $sesion = session() -> get("sesionIniciada");
    if($session == 1 || $sesion == 2)  echo "Sesion iniciada";
?>
<div class="containerformLogin">
    <form action="setLogin" method="post" class="formLogin">
        <input type="email" name="contrasena" placeholder="Email" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <input type="submit" value="Iniciar Sesión">
    </form>
</div>