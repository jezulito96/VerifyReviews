
<h3>Login</h3>
<div class="containerformLogin">
    <div class="div_span">
        <?php 
            $sesion = session() -> get("sesionIniciada");
            if(isset($sesion) && $sesion == 1 || isset($sesion) && $sesion == 2) {
                $usuario = session() -> get('usuario_en_sesion');
                var_dump($nombreUsuario);
                echo '<p class="bien">Bienvenido, </p>';
            }elseif(isset($errorEmail)){
                echo '<p class="error">' . $errorEmail . '</p>';
            }
        ?>
    </div>
    <form action="setLogin" method="post" class="formLogin">
        <input type="email" name="email" placeholder="Email" required focus>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <input type="submit" value="Iniciar Sesión">
    </form>
</div>