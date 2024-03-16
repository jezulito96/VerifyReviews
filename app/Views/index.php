<?php if(isset($cabecera)) echo $cabecera  ?>
<body>
    <h1>Proyecto de DAW</h1>
    

    <?php
        if(isset($listaCategorias)){
            foreach($listaCategorias as $indice => $valor){
                echo $valor['cod_categoria'] . " -> " . $valor['tipo_negocio']; 
            }
        }


        if(isset($qr)){
            // var_dump($qr);
            echo "<br>";
            if(isset($qr)){
                echo "<img src=". $qr . " alt='Código QR' class='codigoQr'>";
                // echo $qr;
            }
        }

        if(isset($_GET['clavePublica'])) ; 

    ?>
    <div id="resultado">Prueba --  </div>

    <button id="ubicacion">Permiso para accder a tu Ubicación</button>
    <div id="resultadoLocation"></div>
    <div id="mapa" class="mapa"></div>


    <!-- formulario para conseguir longitud y latitud -->
        <label for="calle">Calle:</label><br>
        <input type="text" id="calle" name="calle"><br>
        <label for="ciudad">Ciudad:</label><br>
        <input type="text" id="ciudad" name="ciudad"><br>
        <label for="pais">País:</label><br>
        <input type="text" id="pais" name="pais"><br><br>
        <button type="button" id="obtenerLozalizacion">Comprobar direccion</button>
</body>
</html>