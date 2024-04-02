
<h3>Login</h3>
<?php 
    // $sesion = session() -> get("sesionIniciada");
    // if(isset($sesion) && $sesion == 1 || isset($sesion) && $sesion == 2)  echo "Sesion iniciada";
?>
<div class="containerformLogin">
    <form action="setLogin" method="post" class="formLogin">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <input type="submit" value="Iniciar Sesión">
    </form>
</div>