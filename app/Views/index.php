    
    <?php 
        if (isset ($head_content)) echo $head_content;
    ?>

    <body >

        <header id="header" class="header">

            <?php if (isset ($header_content)) echo $header_content; ?>
        
        </header>

        <main id="main" class="main">
            <p>
                <span style="font-weight: bold;">Aviso importante:</span><br>
                Esta página web ha sido creada exclusivamente con fines educativos. 
                Cualquier contenido presente en este sitio es para uso académico y no con propósitos comerciales o profesionales. Agradecemos tu comprensión y cooperación.
            </p>
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
            <?php if (isset ($cont_categoria)) echo $cont_categoria; ?>
            

            <!--  vista para la informacion de un negocio en concreto -->
            <?php if (isset ($info_negocio)) echo $info_negocio; ?>
            

            <!--  vista para que el usuario_registrado vea las resenas que ha escrito -->
            <?php if (isset ($mis_resenas_usuario)) echo $mis_resenas_usuario; ?>

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
        <!-- <div id="mapa" class="mapa"></div> -->



    </body>

</html>