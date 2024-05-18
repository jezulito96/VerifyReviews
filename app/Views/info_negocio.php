<?php


    if(isset($negocio)){
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
            $rutaImagen = base_url().'/images/n/n_'.$negocio -> getCodNegocio().'/img_negocio/'.  $valor ;
            //    echo "<p color='red'>" .base_url(). $valor ."</p>";
                echo '<div class="fotoContainer" >';
                    echo '<a class="fotoContainer"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >';
                        echo '<img src="' . $rutaImagen . '" alt="'. $negocio -> getNombre() .'" title="'. $negocio -> getNombre() .'"/>';
                    echo '</a>';
                echo '</div>';
            }
            
        echo '</div>';
    } 
?>

    <div class="sliderInfoNegocio">
        <div>
            <i class="fas fa-comment iconos-Color"></i>
            <span id="opiniones">Opiniones</span>
        </div>
        <div>
            <i class="fas fa-map-marked-alt iconos-Color"></i>
            <span id="mapa">Mapa</span>
        </div>
        <div>
            <i class="fas fa-phone iconos-Color"></i>
            <span id="llamar">Llamar</span>
        </div>

        <div>
            <i class="fas fa-envelope iconos-Color"></i>
            <span id="email">Email</span>
        </div>
        <div>
            <i class="fab fa-twitter iconos-Color"></i>
            <span id="redesSociales">Redes sociales</span>
        </div>

    </div>

    <div id="infoContainerNegocio">

        <div id="content_opiniones">
            <h3>
                Opiniones
            </h3>    
        </div>

        <div id="content_mapa">
            <h3>
                Mapa
            </h3>    
        </div>

        <div id="content_opiniones">
            <h3>
                Llamar
            </h3>    
        </div>

        <div id="content_email">
            <h3>
                Email
            </h3>    
        </div>

        <div id="content_redesSociales">
            <div id="Facebook">
                <h3>
                    Facebook
                </h3>    
            </div>

            <div id="x">
                <h3>
                    X
                </h3>    
            </div>

            <div id="instagram">
                <h3>
                    Instagram
                </h3>    
            </div>
        </div>


    </div>

<script>
    $(document).ready(function(){
        $('.sliderInfoNegocio i').click(function(){
            var targetId = $(this).data('target');
            $('html, body').animate({
                scrollTop: $('#' + targetId).offset().top
            }, 1000);
        });
    });
</script>