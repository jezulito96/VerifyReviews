<!-- <h1>Mis reseñas</h1>
<?php

    // if(isset($error)){
    //     echo $error;
    // }elseif(isset($lista_resenas)){
    //     echo "<ul>";
    //     foreach($lista_resenas as $i => $resena){

    //         echo "<li class='mi_resena'>";
    //             $fecha_completa = $resena -> getFechaServicio();
    //             $fecha = substr($fecha_completa, 0, 10);
    //             echo  $fecha . " - " .  $resena -> get_nombre_negocio() ;

    //             echo '<div class="mi_resena_container" style="display:none;">Holaa</div>';

    //         echo "</li>";

            
    //     }
    //     echo "</ul>";
    // }

?> -->
<div class="div_mis_resenas">
    <h3>Mis reseñas</h3>  
        <?php
        // $negocio = session() -> get("usuario_en_sesion");
        echo '<div class="container_opiniones_info">';
            foreach($lista_resenas as $i => $resena){
                    
                echo '<div class="info_opiniones" >';

                    echo '<div class="head_opinion">';
                        // imagen de usuario
                        echo '<div class="nick_opinion">';
                            echo '<img src="' . base_url() . 'images/usuarios/' . $resena -> get_foto_perfil_usuario() .  '" />';
                            // echo '<i class="fas fa-map-marked-alt iconosColor"></i>';
                            echo $resena -> getNickname();
                        echo '</div>';
                        
                        echo '<div class="resultado_opinion">';
                            // NOTA MEDIA DE LAS RESEÑAS DEL NEGOCIO

                            echo '<i class="fa-regular fa-square-check" style="color: #51a5d9;font-size:24px;"></i>';
                            // imagen de check del logo
                            echo '<div class="nota_media">4,2/5</div>';

                        echo '</div>';

                    echo '</div>';

                    $fecha = $resena -> getFechaServicio();
                    echo '<div class="fecha_opinion"><small>'. substr($fecha, 0, 10) . '</small></div>';
                    
                    echo '<div class="titulo_opinion">';
                        // TITULO DE LA RESEÑA
                        echo "<p>". $resena -> getTitulo() . "</p>"; 

                    echo '</div>';

                    echo '<div class="menu_opinion">';
                        // btn_imagenes    |  btn_ opinion
                        $es_disabled = "";
                        if($resena -> getFotos() != false){
                            $es_disabled = 'btn_opinion1';
                        }
                        echo '<div id="' . $resena-> getCodResena() . '" class="' . $es_disabled . '" >Imágenes</div>';
                        echo '<div id="' . $resena-> getCodResena() . '" class="btn_opinion2" >Opinión</div>';

                    echo '</div>';

                echo '</div>';
            }

        echo '</div>';

        foreach($lista_resenas as $i => $resena){
            echo '<div id="popup_' . $resena-> getCodResena() . '" class="popup">';
                echo '<div id="contenido_popup_' . $resena-> getCodResena() . '" class="contenido_popup" >';
                    echo '<span class="btn_cerrar boton_cerrar_' . $resena-> getCodResena() . '"><i class="fa-solid fa-xmark" style="margin:5px;"></i></span>';
                    echo '<div class="informacion_popup" id="informacion_popup_' . $resena-> getCodResena() . '" >';
                        // echo $resena -> getFotos(); 
                        
                        $rutasimgs = $resena -> getFotos();
                        $imagenes = explode(",", $rutasimgs);
                        foreach($imagenes as $key => $valor){
                            $rutaImagen = base_url().'/images/n/' . $valor;
                            echo '<img class="imgs_resenas" src="' . $rutaImagen . '" alt="'. $resena -> getCodNegocio() .'" />';
                        }
                        
                    echo '</div>';
                echo '</div>';
            echo '</div>';

            echo '<div id="popup2_' . $resena-> getCodResena() . '" class="popup2">';
                echo '<div id="contenido_popup2_' . $resena-> getCodResena() . '" class="contenido_popup2" >';
                    echo '<span class="btn_cerrar boton_cerrar2_' . $resena-> getCodResena() . '" ><i class="fa-solid fa-xmark" style="margin:5px;"></i></span>';
                    echo '<div  id="informacion_popup2_' . $resena-> getCodResena() . '" >';
                        echo '<p>' .$resena -> getOpinion() . '</p>'; 
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }

        ?>
</div>
<script>
    $(document).ready(function() {

        $('.mi_resena').on('click', function() {
            $(this).find('.mi_resena_container').toggle();
        });

    });
</script>