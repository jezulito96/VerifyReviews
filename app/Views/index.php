<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Libreria JQuery no funciona en local -->
    <?php //echo "<script type='text/javascript' src='". base_url() . "jquery/jquery.js' > </script>";  ?>

    <!-- Libreria jquery -->
    <?php echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>'; ?>

    <!-- Libreria jquery maps -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Librerias para pintar mapas con libreria leaftlet.js-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Prueba de jqury -->
    <?php echo "<script src='" . base_url() . "js/prueba.js' > </script>"; ?>

    <!-- Estilos de index -->
    <?php echo "<link rel='stylesheet' href='" . base_url() . "css/index.css' />"; ?>


    <!-- Recoger ubicacion usuario -->
    <?php //echo "<script src='". base_url() . "js/location.js' > </script>";  ?>
    <!-- https://leafletjs.com/reference.html#map-factory -->
    <script>
        $(document).ready(function () {

            $("#ubicacion").click(function () {
                if (navigator.geolocation) {
                    // le pido al usuario acceder a su localizacion
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var latitud = position.coords.latitude;
                        var longitud = position.coords.longitude;


                        $('#resultadoLocation').html('Tu ubicación actual es: Latitud ' + latitud + ' Longitud ' + longitud);

                        // si acepta se pinta el mapa
                        var map = L.map('mapa').setView([latitud, longitud], 15);

                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                        L.marker([latitud, longitud]).addTo(map)
                            .bindPopup('A pretty CSS popup.<br> Easily customizable.')
                            .openPopup();

                    }, function (error) {
                        switch (error.code) {
                            case error.PERMISSION_DENIED:
                                $('#resultadoLocation').html("El usuario denegó la solicitud de geolocalización.");
                                break;
                            case error.POSITION_UNAVAILABLE:
                                $('#resultadoLocation').html("La información de ubicación no está disponible.");
                                break;
                            case error.TIMEOUT:
                                $('#resultadoLocation').html("Se agotó el tiempo de espera para obtener la ubicación del usuario.");
                                break;
                            case error.UNKNOWN_ERROR:
                                $('#resultadoLocation').html("Ocurrió un error desconocido al intentar obtener la ubicación.");
                                break;
                        }
                    });
                } else {
                    $('#resultadoLocation').html("Tu navegador no soporta la geolocalización.");
                }
            });

        });
    </script>


    <!-- informacion de la web y autor-->
    <title>VerifyReviews</title>
    <meta name="description"
        content="Proyecto final del ciclo de grado superior de Desarrollo de Aplicaciones Web (Educativo)">
    <meta name="author" content="Jesús Gomollón Andrés">
    <meta name="date" content="2024-03-04">
    <style>
        .codigoQr {
            width: 300px;
            height: 300px;
        }

        .mapa {
            height: 400px;
            width: 400px;
        }
    </style>

    <!-- posicionamiento -->
    <!-- <meta name="keywords" content="Reseñas, verificadas, opiniones, comercio, opinion, negocio"> -->
    <!-- <link rel="canonical" href="https://verifyreviews.es">
    <meta name="robots" content="index, follow"> -->

</head>

<body>
    <h1>Proyecto de DAW</h1>


    <?php
    if (isset ($listaCategorias)) {
        foreach ($listaCategorias as $indice => $valor) {
            echo $valor['cod_categoria'] . " -> " . $valor['tipo_negocio'];
        }
    }


    if (isset ($qr)) {
        // var_dump($qr);
        echo "<br>";
        if (isset ($qr)) {
            echo "<img src=" . $qr . " alt='Código QR' class='codigoQr'>";
            // echo $qr;
        }
    }

    if (isset ($_GET['clavePublica']))
        ;

    ?>
    <div id="resultado">Prueba -- </div>

    <button id="ubicacion">Permiso para accder a tu Ubicación</button>
    <div id="resultadoLocation"></div>
    <div id="mapa" class="mapa"></div>
</body>

</html>