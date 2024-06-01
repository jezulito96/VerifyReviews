
      


    <!-- <h3>Categorías</h3> -->
    <section class="carousel_Categorias">
    <?php 
    if(isset($listaCategorias)){
        foreach($listaCategorias as $i => $categoria){
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
                <div class="videoContainer">
                    <a href="https://verifyreviews.es/verifyreviews/categoria?id='. $categoria -> getCodCategoria() .'">
                        <video class="videoCat" autoplay loop muted playsinline>
                            <source src="'. base_url()  . 'img/categorias/catM_V-'. $categoria -> getCodCategoria()  . '.mp4" type="video/mp4">
                            <source src="'. base_url()  . 'img/categorias/catM_V-'. $categoria -> getCodCategoria()  . '.webm" type="video/webm">
                            Tu navegador no soporta la etiqueta de video.
                        </video>
                    </a>
                    <h5 class="tituloCat">'. $categoria -> getTipoNegocio()  . ' </h5>
                </div>
            ';
        }
    }
    ?>
    </section>
    
    
    
    <?php 
    if(isset($top3_categorias)){

        foreach($top3_categorias as $categoria){
            echo '<div class="titulo_top3" >
                    <img src="'. base_url()  . 'img/categorias/catM-'. $categoria['cod_categoria'] . '.png" title="'. $categoria['nombre_categoria'] . ' " class="imgCatTop3"><h4>Top 3 '. $categoria['nombre_categoria']  . '</h4>
                </div>
            ';
            
            echo '<section class="container_top3">';
                    
                foreach($categoria['ranking'] as $negocio){
                    echo '<div class="fotoContainerTop3">';

                        $foto_principal = $negocio['foto_principal'];
                        $ruta_img_principal = base_url() . "images/n/n_" . $negocio['cod_negocio'] . "/img_negocio/" . $foto_principal;
                        echo '<a class="fotoContainer"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio['cod_negocio'] . '" >';
                            echo '<img src="'. $ruta_img_principal .'" title="'. $negocio['nombre'] .'"/>';
                        echo '</a>';
                        // var_dump($negocio['cod_negocio']);

                    echo '</div>';
                }

            echo '</section>';
            
        }
    }
    ?>
    

<script>
    $(document).ready(function(){
        $('.carousel_Categorias').slick({
            dots: true, // puntitos
            slidesToShow: 1, // fotos que se pintan a la vez
            // prevArrow:".flechaAtras",
            // nextArrow:".flechaDelante"
        });

        $('.container_top3').slick({
            // dots: true, // puntitos
            slidesToShow: 1, // fotos que se pintan a la vez
            // centerMode:true,
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