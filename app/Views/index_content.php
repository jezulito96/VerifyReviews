
      


<h3>Categorías:</h3>
    <section class="slick-carousel">
    <?php 
    if(isset($listaCategorias)){
        foreach($listaCategorias as $i => $categoria){
            echo '
                
                <div class="fotoContainer">
                
                <img src="'. base_url()  . 'img/categorias/flechaAtras.png" class="flechaAtras">
        
                    <img src="'. base_url()  . 'img/categorias/catM-'. $categoria -> getCodCategoria()  . '.png" alt="'. $categoria -> getTipoNegocio()  . ' " title="'. $categoria -> getTipoNegocio()  . ' " class="imgCat">
        
                <img src="'. base_url()  . 'img/categorias/flechaDelante.png" class="flechaDelante">
        
                <h4>'. $categoria -> getTipoNegocio()  . ' </h4>
                
                </div>
            
            ';
        }
    }
    ?>
    </section>

    <section class="slick-carousel">
    <?php 
    if(isset($listaCategorias)){
        foreach($listaCategorias as $i => $categoria){
            echo '
                
                <div class="fotoContainer">
                
                <img src="'. base_url()  . 'img/categorias/flechaAtras.png" class="flechaAtras">
        
                    <img src="'. base_url()  . 'img/categorias/catM-'. $categoria -> getCodCategoria()  . '.png" alt="'. $categoria -> getTipoNegocio()  . ' " title="'. $categoria -> getTipoNegocio()  . ' " class="imgCat">
        
                <img src="'. base_url()  . 'img/categorias/flechaDelante.png" class="flechaDelante">
        
                <h4>'. $categoria -> getTipoNegocio()  . ' </h4>
                
                </div>
            
            ';
        }
    }
    ?>
    </section>


<script>
    $(document).ready(function(){
        $('.slick-carousel').slick({
            dots: true, // puntitos
            slidesToShow: 1, // fotos que se pintan a la vez
            prevArrow:".flechaAtras",
            nextArrow:".flechaDelante"
        });
    });
</script>

    <?php 
    // if (isset ($listaCategorias)) {
    //     foreach ($listaCategorias as $indice => $valor) {
    //         echo $valor['cod_categoria'] . " -> " . $valor['tipo_negocio'];
    //     }
    // }


    // if (isset ($qr)) {
    //     // var_dump($qr);
    //     echo "<br>";
    //     if (isset ($qr)) {
    //         echo "<img src=" . $qr . " alt='Código QR' class='codigoQr'>";
    //         // echo $qr;
    //     }
    // }

    // if (isset ($_GET['clavePublica']))
    //     ;

    // <!-- <div id="resultado">Prueba -- </div> -->

    // <!-- formulario para conseguir longitud y latitud -->
    // <!-- <label for="calle">Calle:</label><br>
    // <input type="text" id="calle" name="calle"><br>
    // <label for="ciudad">Ciudad:</label><br>
    // <input type="text" id="ciudad" name="ciudad"><br>
    // <label for="pais">País:</label><br>
    // <input type="text" id="pais" name="pais"><br><br>
    // <button type="button" id="obtenerLocalizacion">Comprobar direccion</button> -->

?>