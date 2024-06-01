<?php
    if(isset($negocio)){
        ?>
        <div class="titulo_negocio_categoria" >
            <?php  
                echo "<h4>".$negocio -> getNombre(). "<h4> ";
            ?>
        </div>
        
        <?php
        echo '<div class="carousel_negocio_categoria">';

            // recojo las rutas de las fotos y las pinto
            $foto_principal = $negocio -> getFotoPrincipal();
            $ruta_img_principal = base_url() . "images/n/n_" . $negocio -> getCodNegocio() . "/img_negocio/" . $foto_principal;
                echo '<a class="fotoContainer_negocio_cat"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >';
                    echo '<img src="'. $ruta_img_principal .'" title="'. $negocio -> getNombre() .'"/>';
                    // echo '<div class="nombre_negocio_categoria">'. $negocio -> getCalle() . " (" . $negocio ->getCiudad(). ')</div>';
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
    } 
?>

    <div class="sliderInfoNegocio">

        <div class="containerIcono container_opiniones">
        <i class='far fa-heart icono-corazon'></i>
            <span id="">Like</span>
        </div>
        <div class="containerIcono container_opiniones">
            <i class="fas fa-comment iconosColor"></i>
            <span id="opiniones">Opiniones</span>
        </div>
        <div class="containerIcono container_mapa">
            <i class="fas fa-map-marked-alt iconosColor"></i>
            <span id="mapa">Mapa</span>
        </div>
        <div class="containerIcono container_llamar">
            <i class="fas fa-phone iconosColor"></i>
            <span id="llamar">Contacto</span>
        </div>

        <div class="containerIcono container_web">
            <i class="fas fa-globe"></i>
            <span id="web">Web</span>
        </div>
        <div class="containerIcono container_redesSociales">
            <i class="fas fa-share-alt iconosColor"></i>
            <span id="redesSociales">Redes</span>
        </div>

    </div>
    
    <div class="infoContainerNegocio">

        <div id="content_opiniones">
            <h4>
                Opiniones
            </h4>    
            <?php
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

                        echo '<div id="popup_' . $resena-> getCodResena() . '" class="popup">';
                            echo '<div id="contenido_popup_' . $resena-> getCodResena() . '" class="contenido_popup" >';
                                echo '<span class="boton_cerrar_' . $resena-> getCodResena() . '">&times;</span>';
                                echo '<div class="informacion_popup" id="informacion_popup_' . $resena-> getCodResena() . '" >';
                                    // echo $resena -> getFotos(); 
                                    
                                    $rutasimgs = $resena -> getFotos();
                                    $imagenes = explode(",", $rutasimgs);
                                    foreach($imagenes as $key => $valor){
                                        $rutaImagen = base_url().'/images/n/' . $valor;
                                        echo '<img class="imgs_resenas" src="' . $rutaImagen . '" alt="'. $negocio -> getNombre() .'" />';
                                    }
                                    
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';

                        echo '<div id="popup2_' . $resena-> getCodResena() . '" class="popup2">';
                            echo '<div id="contenido_popup2_' . $resena-> getCodResena() . '" class="contenido_popup2" >';
                                echo '<span class="boton_cerrar2_' . $resena-> getCodResena() . '" >&times;</span>';
                                echo '<div  id="informacion_popup2_' . $resena-> getCodResena() . '" >';
                                    echo $resena -> getOpinion(); 
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';

                    echo '</div>';

                }
            echo '</div>';

            ?>
        </div>
<script>
    $(document).ready(function () {
        $('.container_opiniones_info').slick({
            slidesToShow: 1, // fotos que se pintan a la vez
            centerMode:true,
            variableWidth: true,
            centerPadding: '0'
        });

        $('.carousel_negocio_categoria').slick({
            slidesToShow: 1, // fotos que se pintan a la vez
            centerMode:true,
            variableWidth: true,
            centerPadding: '0'
        });

        // -------------    Para los botones de las reseñas fotos y opinion     -------------------
        $(".btn_opinion1").click(function() {
            
                var id = $(this).attr('id');
                var $popup = $("#popup_" + id);
                var $boton_cerrar = $(".boton_cerrar_" + id);

                // $popup.css("display", "flex");

                $boton_cerrar.click(function() {
                $popup.css("display", "none");
                });

                $(window).click(function (evento) {
                    if ($(evento.target).is($popup)) {
                        $popup.css("display", "none");
                    }
                });
        });


        $(".btn_opinion2").click(function() {
            var id = $(this).attr('id');

            var $popup2 = $("#popup2_" + id );
            var $boton_cerrar2 = $(".boton_cerrar2_" + id);

            // $popup2.css("display", "flex");
            
            $boton_cerrar2.click(function () {
                $popup2.css("display", "none");
            });

            $(window).click(function (evento) {
                if ($(evento.target).is($popup2)) {
                    $popup2.css("display", "none");
                }
            });

        });

        // PINTAR EL Mapa  info_mapa
        var latitud = $("#latitud").val();
        var longitud = $("#longitud").val();
        var nombre_negocio_mapa = $('#nombre_necogio_mapa').val();

        var mapa = L.map('info_mapa').setView([latitud, longitud], 16);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapa);

        L.marker([latitud, longitud]).addTo(mapa)
            .bindPopup(nombre_negocio_mapa) 
            .openPopup();
        

    });
</script>
        
        <div class="div_llamar">
            <h4>
                    Contacto
            </h4>
            <div id="content_llamar">
                <div class="icono_llamar">
                    <i class="fas fa-phone"></i>
                </div>
                    
                <div id="telefono_llamar">
                        <a href="tel:<?php echo $negocio -> getTelefonoNegocio(); ?>" ><?php echo $negocio -> getTelefonoNegocio(); ?></a>
                </div>
            </div>
        </div>

        <div class="div_web">
            <h4>
                    Sitio web
            </h4>
            <div id="content_web">
                <div class="icono_web">
                    <i class="fas fa-globe"></i>
                </div>
                    
                <div id="info_web">
                    <a href="<?php echo $negocio -> getSitioWeb() ?>">Visita su Web</a>
                </div>
            </div>
        </div>

        <div class="div_redes">

            <h4>
                    Redes sociales
            </h4>
            <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" id="content_redes">
                <div class="icono_redes_sociales">
                    <i class="fa-brands fa-square-x-twitter"></i>
                </div>
                    
                <div class="info_redes_sociales">
                    X
                </div>
            </a>

            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" id="content_redes">
                <div class="icono_redes_sociales">
                    <i class="fa-brands fa-square-facebook"></i>
                </div>
                    
                <div class="info_redes_sociales">
                    Facebook
                </div>
            </a>
            
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" id="content_redes">
                <div class="icono_redes_sociales">
                    <i class="fab fa-instagram iconosColor"></i>
                </div>
                    
                <div class="info_redes_sociales">
                    Instagram
                </div>
            </a>

        </div>



    </div>



    <div id="content_mapa">
        <h4>
                Localización
        </h4>
        <div class="head_mapa">
            <div class="icono_mapa">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="calle_mapa">
                <?php echo $negocio -> getCalle() . ", " . $negocio -> getCiudad() . ", " . $negocio -> getPais(); ?> 
            </div>
        </div>

        <div id="info_mapa" class="info_mapa" >
            <?php
                $coordenadas = $negocio -> getCoordenadas();
                if($coordenadas == null ||  empty($coordenadas)){
                    echo "Upss hemos tenido un problema con el mapa, en estos  momentos no es posible dar la ubicacion,perdone las molestias";
                }else{
                    $coord = explode(",", $coordenadas);

                    echo '<input type="hidden" value="'. $coord[0] . '" id="latitud" />';
                    echo '<input type="hidden" value="'. $coord[1] . '" id="longitud" />';
                    echo '<input type="hidden" value="'. $negocio -> getNombre() . '" id="nombre_necogio_mapa" />';

                }

            ?>
            
        </div> 
    </div>
        
<script>
    $(document).ready(function(){
        $('.container_opiniones').click(function(){
            $('html, body').animate({
                scrollTop: $('#content_opiniones').offset().top
            }, 1000);
        });

        $('.container_mapa').click(function(){
            $('html, body').animate({
                scrollTop: $('#content_mapa').offset().top
            }, 1000);
        });

        $('.container_llamar').click(function(){
            $('html, body').animate({
                scrollTop: $('.div_llamar').offset().top
            }, 1000);
        });

        $('.container_web').click(function(){
            $('html, body').animate({
                scrollTop: $('.div_web').offset().top
            }, 1000);
        });

        $('.container_redesSociales').click(function(){
            $('html, body').animate({
                scrollTop: $('.div_redes').offset().top
            }, 1000);
        });

        


        
    });
</script>