    
    <?php 
        if (isset ($head_content)) echo $head_content;
    ?>

    <body>
        <header>
        <?php if (isset ($header_content)) echo $header_content; ?>
        </header>

    <main>
        <!-- vista inicio de la web -->
        <?php if (isset ($index_content)) echo $index_content; ?> 

        <!-- vista  para registrar un negocio -->
        <?php if (isset ($nuevo_negocio)) echo $nuevo_negocio; ?>

        <!-- vista para registrar un usuario -->
        <?php if (isset ($nuevo_usuario)) echo $nuevo_usuario; ?>

        <!-- vista para inicio de sesion -->
        <?php if (isset ($login)) echo $login; ?>

        <!-- cuando el negocio pulsa "generar resenas" -->
        <?php if (isset ($generarResenas)) echo $generarResenas; ?>

        <!-- cuando el usuario escanea el codigo qr -->
        <?php if (isset ($resena_content)) echo $resena_content; ?>

        <?php
        if (isset ($val))
            echo $val;
        ?>

        <br />

        <button id="ubicacion">Permiso para accder a tu Ubicación</button>
        <div id="resultadoLocation"></div>
        <div id="mapa" class="mapa"></div>
    </main>

</body>

</html>