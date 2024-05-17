    
    <?php 
        if (isset ($head_content)) echo $head_content;
    ?>

    <body >

        <header id="header" class="header">

            <?php if (isset ($header_content)) echo $header_content; ?>
        
        </header>

        <main id="main" class="main">
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

            <!--  vista para pintar los negocios que pertenecen a una categoria -->
            <?php if (isset ($cont_categorias)) echo $cont_categorias; ?>
            
            <?php
            if (isset ($val))
                echo $val;
            ?>

            <br />
        </main>

        <!--.--------------------------  PERMISOS DE UBICACION ----------------------- -->
        <!-- <div id="containerPermisosUbicacion">

            <h4>Queremos acceder a tu ubicacion</h4>
            <p>Podremos darte una mejor informarción sobre los comercios de tu zona</p>

            <div class="botonesUbicacion">
                <button id="aceptarUbicacion">Aceptar</button>
                <button id="degenarUbicacion">Denegar</button>
            </div>
            

        </div> -->
        <div id="resultadoLocation"></div>
        <div id="mapa" class="mapa"></div>



    </body>

</html>