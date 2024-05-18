<?php

    if(isset($lista_negocios)){
        foreach($lista_negocios as $i => $negocio){
            // echo "categoria: " . $negocio -> getCodCategoria() ." <br>";
            // echo "nombre Categoria: " . $negocio -> getNombreCategoria() ."<br>";
            // echo '<a href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >Info negocio</a><br>';
            ?>
            <div class="containerTitulo" >
              <?php  echo "<h3 class='tituloNegocio'>" . $negocio -> getNombre()."<i class='far fa-heart icono-corazon'></i></h3>";?>
            </div>
            
            <?php
            echo '<div class="fotosContainerNegocio">';

                // recojo las rutas de las fotos y las pinto 
                $foto_principal = $negocio -> getFotoPrincipal();
                echo '<div class="fotoContainer" style="margin-left:15px;">';
                    echo '<a class="fotoContainer"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >';
                        echo '<img src="'. base_url(). $foto_principal .'" alt="'. $negocio -> getNombre() .'" title="'. $negocio -> getNombre() .'"/>';
                    echo '</a>';
                echo '</div>';


                $rutasimgs = $negocio -> getFotosBD();
                $imagenes = explode(",", $rutasimgs);
                foreach($imagenes as $key => $valor){
                   echo "<p color='red'>" .base_url(). $valor ."</p>";
                    echo '<div class="fotoContainer" >';
                        echo '<a class="fotoContainer"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >';
                            echo '<img src="'. base_url(). $valor .'" alt="'. $negocio -> getNombre() .'" title="'. $negocio -> getNombre() .'"/>';
                        echo '</a>';
                    echo '</div>';
                }
                
            echo '</div>'; 
        }
    }
    
    