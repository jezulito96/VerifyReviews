
      


    <!-- <h3>Categorías</h3> -->
    <section class="carousel_Categorias">
    <?php 
    if(isset($listaCategorias)){
        // foreach($listaCategorias as $i => $categoria){
            // carousel con flechas //

            // echo '
                
            //     <div class="fotoContainer">
                
            //     <img src="'. base_url()  . 'img/categorias/flechaAtras.png" class="flechaAtras">
        
            //         <a href="https://verifyreviews.es/verifyreviews/categoria?id='. $categoria -> getCodCategoria() .'" ><img src="'. base_url()  . 'img/categorias/catM-'. $categoria -> getCodCategoria()  . '.png" alt="'. $categoria -> getTipoNegocio()  . ' " title="'. $categoria -> getTipoNegocio()  . ' " class="imgCat"></a>
        
            //     <img src="'. base_url()  . 'img/categorias/flechaDelante.png" class="flechaDelante">
        
            //     <h4>'. $categoria -> getTipoNegocio()  . ' </h4>
                
            //     </div>
            
            // ';
            // buenaaa
            // echo '
            //     <div class="fotoContainer">
            //         <a href="https://verifyreviews.es/verifyreviews/categoria?id='. $categoria -> getCodCategoria() .'">
            //             <video class="videoCat" autoplay loop muted>
            //                 <source src="'. base_url()  . 'videos/catM_V-'. $categoria -> getCodCategoria()  . '.mp4" type="video/mp4">
            //                 Tu navegador no soporta la etiqueta de video.
            //             </video>
            //         </a>
            //         <h5 class="tituloCat">'. $categoria -> getTipoNegocio()  . ' </h5>
            //     </div>
            // ';
            echo '
                <div class="fotoContainer">
                    <a href="https://verifyreviews.es/verifyreviews/categoria?id=1">
                        <video class="videoCat" autoplay loop muted playsinline>
                            <source src="'. base_url()  . 'videos/catM_V-1.mp4" type="video/mp4">
                            <source src="'. base_url()  . 'videos/catM_V-1.webm" type="video/webm">
                            Tu navegador no soporta la etiqueta de video.
                        </video>
                    </a>
                    <h5 class="tituloCat">Restaurantes</h5>
                </div>
            ';
        // }
    }
    ?>
    </section>

    <h3>Top 3</h3>
    <section class="slick-carousel">
    <?php 
    if(isset($top3_categorias)){

        foreach($top3_categorias as $i => $categoria){
            print_r($top3_categorias[$i]);
        //     echo '
                
        //         <div class="fotoContainer">
                
        //         <img src="'. base_url()  . 'img/categorias/flechaAtras.png" class="flechaAtras">
        
        //             <img src="'. base_url()  . 'img/categorias/catM-'. $categoria -> getCodCategoria()  . '.png" alt="'. $categoria -> getTipoNegocio()  . ' " title="'. $categoria -> getTipoNegocio()  . ' " class="imgCat">
        
        //         <img src="'. base_url()  . 'img/categorias/flechaDelante.png" class="flechaDelante">
        
        //         <h4>'. $categoria -> getTipoNegocio()  . ' </h4>
                
        //         </div>
            
        //     ';
        }
    }
    ?>
    </section>

<script>
    $(document).ready(function(){
        $('.carousel_Categorias').slick({
            dots: true, // puntitos
            slidesToShow: 1, // fotos que se pintan a la vez
            // prevArrow:".flechaAtras",
            // nextArrow:".flechaDelante"
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