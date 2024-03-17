<!DOCTYPE html>
<html lang="es">

<head>
    

    <!--/////////////////////////////////////////////// metas ////////////////////////////////////// -->
    <title>VerifyReviews</title>
    <meta name="description"
        content="Proyecto final del ciclo de grado superior de Desarrollo de Aplicaciones Web (Educativo)">
    <meta name="author" content="Jesús Gomollón Andrés">
    <meta name="date" content="2024-03-04">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- posicionamiento -->
    <!-- <meta name="keywords" content="Reseñas, verificadas, opiniones, comercio, opinion, negocio"> -->
    <!-- <link rel="canonical" href="https://verifyreviews.es">
    <meta name="robots" content="index, follow"> -->



    <!--/////////////////////////////////////////////// jquery ////////////////////////////////////// -->
    
    <!-- Libreria JQuery no funciona en local -->
    <?php //echo "<script type='text/javascript' src='". base_url() . "jquery/jquery.js' > </script>";       ?>

    <!-- Libreria jquery -->
    <?php echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>'; ?>

    <!-- Librerias Jquery UI -->
    <?php echo "<script type='text/javascript' src='" . base_url() . "jquery-ui/jquery-ui.js' > </script>"; ?>
    <?php echo "<link rel='stylesheet' href='" . base_url() . "jquery-ui/jquery-ui.css' />"; ?>

    <!-- Libreria jquery maps -->
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->



    <!--/////////////////////////////////////////////// ESTILOS CSS ////////////////////////////////////// -->

    <!-- Estilos generales -->
    <?php echo "<link rel='stylesheet' href='" . base_url() . "css/general.css' />"; 

    // <!-- Estilos de index -->
     echo "<link rel='stylesheet' href='" . base_url() . "css/index.css' />"; 
    //comprobar si el que accede es movil o escritorio
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($user_agent, 'Mobile') !== false || 
        strpos($user_agent, 'Android') !== false ||
        strpos($user_agent, 'iPhone') !== false ||
        strpos($user_agent, 'iPad') !== false ||
        strpos($user_agent, 'iPod') !== false
        ) {
        // escritorio
        echo "<link rel='stylesheet' href='" . base_url() . "css/headerEscritorio.css' />";
    } else {
        // movil
        echo "<link rel='stylesheet' href='" . base_url() . "css/headerMovil.css' />";
    }
    ?>

    <style>
        .codigoQr {
            width: 300px;
            height: 300px;
        }

        .mapa {
            height: 300px;
            width: 300px;
        }
    </style>



    <!--/////////////////////////////////////////////// GEOLOCALIZACIÓN ////////////////////////////////////// -->

    <!-- Librerias para pintar mapas con libreria leaftlet.js-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Prueba de jqury -->
    <?php echo "<script src='" . base_url() . "js/prueba.js' > </script>"; ?>

    <!-- Libreria para obtener lat y long a partir de la calle -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <!-- Recoger ubicacion usuario si acepta obtener ubicacion-->
    <?php //echo "<script src='". base_url() . "js/location.js' > </script>";       ?>
    <!-- https://leafletjs.com/reference.html#map-factory -->
    <script>
        $(document).ready(function () {

            $("#ubicacion").click(function () {
                if (navigator.geolocation) {
                    // le pido al usuario acceder a su localizacion
                    navigator.geolocation.getCurrentPosition(function (position) {
                        $('#ubicacion').toggle();
                        var latitud = position.coords.latitude;
                        var longitud = position.coords.longitude;


                        $('#resultadoLocation').html('Tu ubicación actual es: Latitud ' + latitud + ' Longitud ' + longitud);

                        // si acepta se pinta el mapa
                        var mapa = L.map('mapa').setView([latitud, longitud], 16);

                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(mapa);

                        L.marker([latitud, longitud]).addTo(mapa)
                            .bindPopup('Nombre negocio <br> Dirección.')
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

            // obtener lat y long a partir de calle, ciudad y pais
            $("#obtenerLocalizacion").click(function () {
                console.log("entra");
                var calle = $("#calle").val();
                var ciudad = $("#ciudad").val();
                var pais = $("#pais").val();

                var direccion = calle + ", " + ciudad + ", " + pais;
                var url = "https://nominatim.openstreetmap.org/search?format=json&q=" + encodeURIComponent(direccion);

                axios.get(url)
                    .then(function (response) {
                        var resultado = response.data[0];
                        if (resultado) {
                            var latitud = resultado.lat;
                            var longitud = resultado.lon;
                            console.log("Latitud: " + latitud);
                            console.log("Longitud: " + longitud);
                        } else {
                            console.log("No se encontró la dirección.");
                        }
                    })
                    .catch(function (error) {
                        console.log("Error al obtener la latitud y longitud:", error);
                    });
            });

            // menu desplegable
            var imgMenu = $(".imgMenu");
            var imgMenu2 = $(".imgMenu2");

            $(".menuContainer").click(function () {
            
                $(".listaMenu").toggle("blind", 700);
                imgMenu.toggle();
                imgMenu2.toggle();

            });
    });
    </script>

</head>