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



    <!--/////////////////////// LIBRERIAS NECESARIAS PARA DIFERENTES FUNCIONALIDADES (animaciones, mapas....) ////////////////////////////////////// -->

    
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

    <!-- Librerias para pintar mapas con libreria leaftlet.js-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>






    <!--/////////////////////////////////////////////// SCRIPTS JQuery ////////////////////////////////////// -->




        <!-- https://leafletjs.com/reference.html#map-factory -->
    <!-- Pinta el mapa dandole al boton de aceptar ubicacion -->
    <?php echo "<script src='". base_url() . "js/location.js' > </script>";        ?>


    <!-- Prueba de jqury -->
    <?php echo "<script src='" . base_url() . "js/prueba.js' > </script>"; ?>





    <!--/////////////////////////////////////////////// ESTILOS CSS ////////////////////////////////////// -->


    <!-- Estilos generales -->
    <?php 
    


    // Comprobación para detectar si el usuario accede desde un dispositivo móvil o desde escritorio
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (
        strpos($user_agent, 'Mobile') !== false ||
        strpos($user_agent, 'Android') !== false ||
        strpos($user_agent, 'iPhone') !== false ||
        strpos($user_agent, 'iPad') !== false ||
        strpos($user_agent, 'iPod') !== false
    ) {
        // Móvil
        echo "<link rel='stylesheet' href='" . base_url() . "css/estilo_movil.css' />";
        echo "<link rel='stylesheet' href='" . base_url() . "css/general_movil.css' />";
        define("DISPOSITIVO", "movil");
    } else {
        // Escritorio
        echo "<link rel='stylesheet' href='" . base_url() . "css/headerEscritorio.css' />";
        echo "<link rel='stylesheet' href='" . base_url() . "css/general_escritorio.css' />";
        define("DISPOSITIVO", "escritorio");
    }

    echo "<link rel='stylesheet' href='" . base_url() . "css/global.css' />";
    

    // lista header
    echo '<script type="text/javascript" src="' . base_url()  . 'js/lista_header.js"></script>';
    
    // <!-- Estilos de index -->
    echo "<link rel='stylesheet' href='" . base_url() . "css/index.css' />";

    // maravillosos iconode de cloudflare
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">';
    echo '<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">';
   
    ?>

    <!-- estilo del mapa que se genera con JQUERY y la libreria de OPENSTREETSMAPS -->
    <style>
        .mapa {
            height: 300px;
            width: 300px;
            z-index: 20;
        }
    </style>

</head>