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
    <?php //echo "<script type='text/javascript' src='". base_url() . "jquery/jquery.js' > </script>";        ?>

    <!-- Libreria jquery -->
    <?php echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>'; ?>

    <!-- Librerias Jquery UI -->
    <?php echo "<script type='text/javascript' src='" . base_url() . "jquery-ui/jquery-ui.js' > </script>"; ?>
    <?php echo "<link rel='stylesheet' href='" . base_url() . "jquery-ui/jquery-ui.css' />"; ?>

    <!-- Libreria jquery maps -->
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <!-- librerias para carusel en con jquery-->
    <?php echo '<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>'; ?>
    <?php echo '<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>' ?>
    <?php echo '<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>' ?>

    



    <!--/////////////////////////////////////////////// ESTILOS CSS ////////////////////////////////////// -->

    <!-- Estilos generales -->
    <?php echo "<link rel='stylesheet' href='" . base_url() . "css/general.css' />";
          // lista header
          echo '<script type="text/javascript" src="' . base_url()  . 'js/lista_header.js"></script>';
          
          echo "<link rel='stylesheet' href='" . base_url() . "css/codigosQr.css' />";

    // <!-- Estilos de index -->
    echo "<link rel='stylesheet' href='" . base_url() . "css/index.css' />";

    // Comprobación para detectar si el usuario accede desde un dispositivo móvil
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (
        strpos($user_agent, 'Mobile') !== false ||
        strpos($user_agent, 'Android') !== false ||
        strpos($user_agent, 'iPhone') !== false ||
        strpos($user_agent, 'iPad') !== false ||
        strpos($user_agent, 'iPod') !== false
    ) {
        // Móvil
        echo "<link rel='stylesheet' href='" . base_url() . "css/headerMovil.css' />";
        echo "<link rel='stylesheet' href='" . base_url() . "css/resenaContent.css' />";
        echo "<link rel='stylesheet' href='" . base_url() . "css/indexMovil.css' />";
    } else {
        // Escritorio
        echo "<link rel='stylesheet' href='" . base_url() . "css/headerEscritorio.css' />";
    }
    ?>

    <style>
        .mapa {
            height: 300px;
            width: 300px;
        }
        /* .qr-data {
            fill: yellow; 
        }

        .qr-timing-dark{
            fill:red;
        }

        .qr-finder{
            color:green;
        }

        .qr-darkmodule{
            fill:brown;
        } */

        /* Para el de los puntitos  */
        .qr-data-dark{
            fill:blue;
            /* stroke:yellow; */
        }
        /* Para el color de fondo de los cuadrados grandes de las esquinas */
        .qr-finder-dark{
            fill:red;
        }
        /* Para el color del cuadrado pequeño de la esquina inferior derecha*/
        .qr-alignment-dark{
            fill:yellow;
        }
        /* Para el color de UNOS POCOS puntitos */
        .qr-timing-dark{
            fill:green;
        }
        /* Para algunos puntitos al lado de los cuadrados grandes de las esquinas */
        .qr-format-dark{
            fill:lightblue;
        }
        /* Para los cuadrados pequeños dentro de los grandes de las esquinas */
        .qr-finder-dot{
            fill:red;
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

    


    <!-- Recoger ubicacion usuario si acepta obtener ubicacion-->
    <?php //echo "<script src='". base_url() . "js/location.js' > </script>";        ?>
    <!-- https://leafletjs.com/reference.html#map-factory -->
    <script>
        // $(document).ready(function () { 

        //     $("#ubicacion").click(function () {
        //         if (navigator.geolocation) {
        //             // le pido al usuario acceder a su localizacion
        //             navigator.geolocation.getCurrentPosition(function (position) {
        //                 $('#ubicacion').toggle();
        //                 var latitud = position.coords.latitude;
        //                 var longitud = position.coords.longitude;


        //                 $('#resultadoLocation').html('Tu ubicación actual es: Latitud ' + latitud + ' Longitud ' + longitud);

        //                 // si acepta se pinta el mapa
        //                 var mapa = L.map('mapa').setView([latitud, longitud], 16);

        //                 L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //                     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        //                 }).addTo(mapa);

        //                 L.marker([latitud, longitud]).addTo(mapa)
        //                     .bindPopup('Nombre negocio <br> Dirección.') 
        //                     .openPopup();

        //             }, function (error) {
        //                 switch (error.code) {
        //                     case error.PERMISSION_DENIED:
        //                         $('#resultadoLocation').html("El usuario denegó la solicitud de geolocalización.");
        //                         break;
        //                     case error.POSITION_UNAVAILABLE:
        //                         $('#resultadoLocation').html("La información de ubicación no está disponible.");
        //                         break;
        //                     case error.TIMEOUT:
        //                         $('#resultadoLocation').html("Se agotó el tiempo de espera para obtener la ubicación del usuario.");
        //                         break;
        //                     case error.UNKNOWN_ERROR:
        //                         $('#resultadoLocation').html("Ocurrió un error desconocido al intentar obtener la ubicación.");
        //                         break;
        //                 }
        //             });
        //         } else {
        //             $('#resultadoLocation').html("Tu navegador no soporta la geolocalización.");
        //         }
        //     });



            

        //     ////////////////////////  resenaContent ////////////////////////
        //     ////////////////////////  calificacion ticks////////////////////////

        //     var listaTicksPuntuacion = document.querySelectorAll(".imgPuntuacion");
        //     var tickVerde = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABcUlEQVR4nO3UvUoDQRAH8NVKFPwCFRuDycwVFnYWQiRkNpEgwcoH8AF8BdFObAS10047fYiAH5lJCCgigiIIgqBYBwtNTk4QLnsXuMQNWOQPV92wP3bYGaW6+Q8hxlUS2MudwVjHEF1KzJPglxZ0SfBNlyBvHclXJvuJ4d5DfN/Hhqt6rUIksGsgrmY8sYpk2EkSY60RgXfi6QlrSPZ6dkALPpq3IYEVZTMkcBBomeCxXYQhqxnrxk1eFoszo9aQTCU+RIzP5m3SjEuRD0meT42Q4JY3F81qNONRsGVwGBlJXcWGiaH80wbGaqbkaLMmzYnlEOQpJzAYGSLBQkPPGatpcej3v7datOCrMS91f01ECC4CT9WHacbT4GDCvmo12cv4uGa8DcOIcSc4L/jgrR/VTrz2kMBNyHyYeI0EF9pCWsIYt/+ERMFI4C5ViPVZgZpj8KnLzpyyncADYdy0jvhXjmZYJ8E15aqejkHdqJB8A0RHO5NtxEWKAAAAAElFTkSuQmCC";
        //     var tickGris = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABQ0lEQVR4nO3UvUoDQRSG4dFKFPwD9UosBG0UGxErL8AL8BYkdmIjqNW6zPsls6TRi7CxshQRFEEQBMU6WGiyspBIGEbZxAlY+ME0O7PnYQ67x5j//IVI2gKOrLUzA0NqtdoC8CEpB16stevRkSRJRoHbAuks4K1SqQxHhYDDbqS9TqMi1tpFSU0PeU3TdC4a4pwbA+7921hrN03MACeBlmWxkVWg5SFPaZpOR0OSJJmQ9OjfBlgrXaRer08Be8V/8d0ZwAValpZGJE1Kumy/2JC04p+pVqsbgZs8ZFk2XhoCzr0iDWC5s1+MFknPHtLqPlMWugi05AuTdBbYPza9xjk3C1yHMEkHged3xfgx/aTdnqtAUX81gaW+kF4wYP9XSBkMuJE0EgX6AXsH5k3sBD6Q3eiIN3J2gO08z4cGBv3HBPIJaDKqLtu70qIAAAAASUVORK5CYII=";
        //     var resultadoValoracion = $(".resultadoValoracion");

        //     function pintarTicks(num) {
        //         for (i = 0; i <= num; i++) {
        //             $("#imgTick" + i).attr("src", tickVerde);
        //         };
        //         if (num != 5) {
        //             for (j = num + 1; j <= 5; j++) {
        //                 $("#imgTick" + j).attr("src", tickGris);
        //             };
        //         }

        //     }

        //     $("#imgTick1").click(function () {
        //         pintarTicks(1);
        //         resultadoValoracion.text("Mala");
        //     });
        //     $("#imgTick2").click(function () {
        //         pintarTicks(2);
        //         resultadoValoracion.text("Pobre");
        //     });
        //     $("#imgTick3").click(function () {
        //         pintarTicks(3);
        //         resultadoValoracion.text("Normal");
        //     });
        //     $("#imgTick4").click(function () {
        //         pintarTicks(4);
        //         resultadoValoracion.text("Buena");
        //     });
        //     $("#imgTick5").click(function () {
        //         pintarTicks(5);
        //         resultadoValoracion.text("Excelente");
        //     });

        // });
    </script>

</head>