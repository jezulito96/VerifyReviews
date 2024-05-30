    
    <?php 
        if (isset ($head_content)) echo $head_content;
    ?>
    <body >

        <header id="header" class="header">

            <?php if (isset ($header_content)) echo $header_content; ?>
        
        </header>
        <nav>
            <div class="filtros_container">
                <button id="btn_filtros"><i class="fas fa-filter"></i> Filtros</button>
                <input type="text" placeholder="Buscar" id="buscar">
                <i class="fas fa-search" id="buscar-icono"></i>
            </div>
            <div id="container_filtros" style="display:none;">  
               
            <div id="lista-filtros">
                <ul class="filtro">
                    <li>
                        <i class="fas fa-map-marker-alt"></i> Ciudad:
                        <span class="valores">España</span>
                    </li>
                </ul>
                <ul class="filtro">
                    <li>
                        <i class="fas fa-utensils"></i> Categoría:
                        <span class="valores">Restaurantes, Peluquerías, Cafeterías, Talleres, Perfumería, Psicología, Moda</span>
                    </li>
                </ul>
                <ul class="filtro">
                    <li>
                        <i class="fas fa-star"></i> Valoración:
                        <span class="valores">1, 2, 3, 4, 5</span>
                    </li>
                </ul>
            </div>
            </div>
                

            </div>
            <div class="resultados_busqueda" style="display:none;">

                <!-- se mostraran los resultados de la busqueda y los filtros -->
                
                <div class="cerrar_busqueda" ><span>Cerrar búsqueda</span></div>    
            </div>
            
        </nav> 
            <?php //if(isset($filtros_busqueda)) echo $filtros_busqueda; ?>

        <script>
            $(document).ready(function() {
                $("#btn_filtros").click(function(){
                    $("#container_filtros").toggle();
                });

                $('#buscar-icono').click(function() {
                    $("#cerrar_busqueda").toggle();
                    var query = $('#buscar').val();
                    $.ajax({
                        url: 'https://verifyreviews.es/verifyreviews/filtro',
                        type: 'POST',
                        data: { texto: query },
                        success: function(response) {
                            $('.resultados_busqueda').html(response).show();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error en la búsqueda:', error);
                        }
                    });
                });
            });
            $('.cerrar_busqueda').on('click', function() {
                $('.resultados_busqueda').slideUp();
            });
        </script>

        <main id="main" class="main">
            <p>
                <span style="font-weight: bold;">Aviso importante:</span><br>
                Esta página web ha sido creada exclusivamente con fines educativos. 
                Cualquier contenido presente en este sitio es para uso académico y no con propósitos comerciales o profesionales. Agradecemos tu comprensión y cooperación.
            </p>
            <!-- vista inicio de la web -->
            <?php if (isset ($index_content)) echo $index_content; ?> 

            <!-- vista  para registrar un negocio -->
            <?php if (isset ($nuevo_negocio)) echo $nuevo_negocio; ?>

            <!-- vista para registrar un usuario -->
            <?php if (isset ($nuevo_usuario)) echo $nuevo_usuario; ?>

            <!-- vista para inicio de sesion -->
            <?php if (isset ($login)) echo $login; ?>

            <!-- cuando el negocio pulsa "generar resenas" -->
            <?php if (isset ($generarResenas)) echo $generarResenas; ?>

            <!-- cuando el usuario escanea el codigo qr -->
            <?php if (isset ($resena_content)) echo $resena_content; ?>

            <!--  vista para pintar los negocios que pertenecen a una categoria -->
            <?php if (isset ($cont_categoria)) echo $cont_categoria; ?>
            

            <!--  vista para la informacion de un negocio en concreto -->
            <?php if (isset ($info_negocio)) echo $info_negocio; ?>
            

            <!--  vista para que el usuario_registrado vea las resenas que ha escrito -->
            <?php if (isset ($mis_resenas_usuario)) echo $mis_resenas_usuario; ?>
            

            <!--  vista para que el negocio vea sus reseñas y sus valoraciones -->
            <?php if (isset ($mi_negocio)) echo $mi_negocio; ?>

            <?php
            if (isset ($val))
                echo $val;
            ?>

            <br />
        </main>

        <!--.--------------------------  PERMISOS DE UBICACION ----------------------- -->
        <!-- <div id="containerPermisosUbicacion">

            <h4>Queremos acceder a tu ubicacion</h4>
            <p>Podremos darte una mejor informarción sobre los comercios de tu zona</p>

            <div class="botonesUbicacion">
                <button id="aceptarUbicacion">Aceptar</button>
                <button id="degenarUbicacion">Denegar</button>
            </div>
            

        </div> -->
        <div id="resultadoLocation"></div>
        <!-- <div id="mapa" class="mapa"></div> -->

        <footer>
            <!--  vista para que el negocio vea sus reseñas y sus valoraciones -->
            <?php if (isset ($vista_footer)) echo $vista_footer; ?>
        </footer>

    </body>

</html>