    
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
               
                <div class="lista_filtros">

                    <div class="nombre_filtro"><i class="fas fa-map-marker-alt"></i>Ciudad</div>
                    <div class="filtros">
                        <button class="opciones_filtro" value="1_soria">Soria</button>
                        <button class="opciones_filtro" value="1_madrid">Madrid</button>
                        <button class="opciones_filtro" value="1_barcelona">Barcelona</button>
                        <button class="opciones_filtro" value="1_valencia">Valencia</button>
                    </div>

                    <div class="nombre_filtro"><i class="fas fa-map-marker-alt"></i>Categoria</div>
                    <div class="filtros">
                        <button class="opciones_filtro" value="2_1">Restaurantes</button>
                        <button class="opciones_filtro" value="2_2">Peluquerías</button>
                        <button class="opciones_filtro" value="2_3">Cafeterías</button>
                        <button class="opciones_filtro" value="2_4">Talleres</button>
                        <button class="opciones_filtro" value="2_5">Perfumerías</button>
                        <button class="opciones_filtro" value="2_6">Psicología</button>
                        <button class="opciones_filtro" value="2_7">Moda</button>
                    </div>

                    <div class="nombre_filtro"><i class="fas fa-map-marker-alt"></i>Valoración</div>
                    <div class="filtros">
                        <button class="opciones_filtro" value="3_1">
                            <i class="fas fa-check check_filtro"></i>
                        </button>
                        <button class="opciones_filtro" value="3_2">
                            <i class="fas fa-check check_filtro"></i>
                            <i class="fas fa-check check_filtro"></i>
                        </button>
                        <button class="opciones_filtro" value="3_3">
                            <i class="fas fa-check check_filtro"></i>
                            <i class="fas fa-check check_filtro"></i>
                            <i class="fas fa-check check_filtro"></i>
                        </button>
                        <button class="opciones_filtro" value="3_4">
                            <i class="fas fa-check check_filtro"></i>
                            <i class="fas fa-check check_filtro"></i>
                            <i class="fas fa-check check_filtro"></i>
                            <i class="fas fa-check check_filtro"></i>
                        </button>
                        <button class="opciones_filtro" value="3_5">
                            <i class="fas fa-check check_filtro"></i>
                            <i class="fas fa-check check_filtro"></i>
                            <i class="fas fa-check check_filtro"></i>
                            <i class="fas fa-check check_filtro"></i>
                            <i class="fas fa-check check_filtro"></i>
                        </button>
                    </div>

                </div>

            </div>
            <div class="resultados_busqueda" style="display:none;">

                <!-- se mostraran los resultados de la busqueda y los filtros -->
                
            </div>
            
        </nav> 
            

        <script>
            $(document).ready(function() {
                var info_filtros = [];
                    info_filtros[0] = "para que no este vacio";
                $('.opciones_filtro').click(function() {
                    const valor = $(this).val();
                    $(this).toggleClass("filtro_seleccionado");
                    const index = info_filtros.indexOf(valor);
                    if (index === -1) {
                        info_filtros.push(valor);
                    } else {
                        info_filtros.splice(index, 1);
                    }
                    console.log(info_filtros);
                });

                $("#btn_filtros").click(function(){
                    $("#container_filtros").toggle();
                });

                $('#buscar-icono').click(function() {
                    $("#cerrar_busqueda").toggle();
                    var query = $('#buscar').val();
                    $.ajax({
                        url: 'https://verifyreviews.es/verifyreviews/filtro',
                        type: 'POST',
                        data: { texto: query , filtros: JSON.stringify(info_filtros) },
                        success: function(response) {
                            $('.resultados_busqueda').html(response).show();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error en la búsqueda:', error);
                        }
                    });
                });
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