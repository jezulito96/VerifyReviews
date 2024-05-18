<?php

    if(isset($lista_negocios)){
        foreach($lista_negocios as $i => $negocio){
            // echo "categoria: " . $negocio -> getCodCategoria() ." <br>";
            // echo "nombre Categoria: " . $negocio -> getNombreCategoria() ."<br>";
            // echo '<a href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >Info negocio</a><br>';

            echo "<h3 class='tituloNegocio'>" . $negocio -> getNombre()."
                    <span class='check'>
                        <i class='fa-solid fa-check' style='color: #63E6BE;'></i>
                        <i class=''fa-solid fa-check' style='color: #3b789f;'></i>
                    </span>
                </h3>";
            

            echo '<div class="fotosContainerNegocio">';

                // recojo las rutas de las fotos y las pinto 
                $foto_principal = $negocio -> getFotoPrincipal();
                echo '<div class="fotoContainer" style="margin-left:15px;">';
                    echo '<a class="fotoContainer"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >';
                        echo '<img src="'. base_url(). $foto_principal .'" alt="'. $negocio -> getNombre() .'" title="'. $negocio -> getNombre() .'"/>';
                    echo '</a>';
                echo '</div>';


                $rutasimgs = $negocio -> getFotoPrincipal();
                $imagenes = explode(",", $rutasimgs);
                foreach($imagenes as $key => $valor){
                   
                    echo '<div class="fotoContainer" >';
                        echo '<a class="fotoContainer"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >';
                            echo '<img src="'. base_url(). $valor .'" alt="'. $negocio -> getNombre() .'" title="'. $negocio -> getNombre() .'"/>';
                        echo '</a>';
                    echo '</div>';
                }
                
            echo '</div>';
        }
    }
?>
<script>
    $(document).ready(function(){

        $('.check').click(function(){

            $('.toggle').find('i').toggle();

        });

    });
</script>