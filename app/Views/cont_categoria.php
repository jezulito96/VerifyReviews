<?php

    if(isset($lista_negocios)){
        foreach($lista_negocios as $i => $negocio){
            // echo "categoria: " . $negocio -> getCodCategoria() ." <br>";
            // echo "nombre Categoria: " . $negocio -> getNombreCategoria() ."<br>";
            // echo '<a href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >Info negocio</a><br>';
            echo "<h3>nombre negocio: " . $negocio -> getNombre()."</h3>";

            echo '<div class="fotosContainerNegocio">';

                // recojo las rutas de las fotos y las pinto 
                $foto_principal = $negocio -> getFotoPrincipal();
                // echo '<a class="fotoContainer"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >';
                echo '<div class="fotoContainer" >';
                    echo '<img src="'. base_url(). $foto_principal .'" alt="'. $negocio -> getNombre() .'" title="'. $negocio -> getNombre() .'"/>';
                // echo '</a>';
                echo '</div>';


                $rutasimgs = $negocio -> getFotoPrincipal();
                $imagenes = explode(",", $rutasimgs);
                foreach($imagenes as $key => $valor){
                    // echo '<a class="fotoContainer"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >';
                    echo '<div class="fotoContainer" >';
                        echo '<img src="'. base_url(). $valor .'" alt="'. $negocio -> getNombre() .'" title="'. $negocio -> getNombre() .'"/>';
                    // echo '</a>';
                    echo '</div>';
                }
                
            echo '</div>';
        }
    }
    
    