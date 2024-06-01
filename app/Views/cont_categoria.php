<?php

    if(isset($lista_negocios)){
        foreach($lista_negocios as $i => $negocio){
            // echo "categoria: " . $negocio -> getCodCategoria() ." <br>";
            // echo "nombre Categoria: " . $negocio -> getNombreCategoria() ."<br>";
            // echo '<a href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >Info negocio</a><br>';
            ?>
            <div class="titulo_negocio_categoria" >
                <?php  
                    echo $negocio -> getNombre();
                ?>
            </div>
            
            <?php
            echo '<div class="carousel_negocio_categoria">';

                // recojo las rutas de las fotos y las pinto
                $foto_principal = $negocio -> getFotoPrincipal();
                $ruta_img_principal = base_url() . "images/n/n_" . $negocio -> getCodNegocio() . "/img_negocio/" . $foto_principal;
                    echo '<a class="fotoContainer_negocio_cat"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >';
                        echo '<img src="'. $ruta_img_principal .'" title="'. $negocio -> getNombre() .'"/>';
                        echo '<div class="nombre_negocio_categoria">'. $negocio -> getCalle() . " (" . $negocio ->getCiudad(). ')</div>';
                    echo '</a>';


                $rutasimgs = $negocio -> getFotosBD();
                $imagenes = explode(",", $rutasimgs);
                foreach($imagenes as $key => $valor){
                $rutaImagen = base_url().'/images/n/n_'.$negocio -> getCodNegocio().'/img_negocio/'.  $valor ;
                //    echo "<p color='red'>" .base_url(). $valor ."</p>";
                        echo '<a class="fotoContainer_negocio_cat"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >';
                            echo '<img src="' . $rutaImagen . '" alt="'. $negocio -> getNombre() .'" title="'. $negocio -> getNombre() .'"/>';
                        echo '</a>';
                }
                
            echo '</div>'; 


            // echo '<section class="container_top3">';
                    
            //     foreach($categoria['ranking'] as $negocio){

            //         $foto_principal = $negocio['foto_principal'];
            //         $ruta_img_principal = base_url() . "images/n/n_" . $negocio['cod_negocio'] . "/img_negocio/" . $foto_principal;
            //         echo '<a class="fotoContainerTop3"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio['cod_negocio'] . '" >';
            //             echo '<img src="'. $ruta_img_principal .'" title="'. $negocio['nombre'] .'"/>';
            //             echo '<div class="nombreNegocioTop">'. $negocio['nombre'] .'</div>';
            //         echo '</a>';

            //     }

            // echo '</section>';
        }
    }
    
?>
<script>
    $(document).ready(function(){
        $('.carousel_negocio_categoria').slick({
            slidesToShow: 1, // fotos que se pintan a la vez
            centerMode:true,
            variableWidth: true,
            centerPadding: '0'
        });
    });
</script>
