<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<script src='". base_url() . "jquery/jquery.js' > </script>"; ?>

    <!-- informacion de la web y autor-->
    <title>VerifyReviews</title>
    <meta name="description" content="Proyecto final del ciclo de grado superior de Desarrollo de Aplicaciones Web (Educativo)">
    <meta name="author" content="Jesús Gomollón Andrés">
    <meta name="date" content="2024-03-04">
    <style>
        .codigoQr{
            width: 300px;
            height: 300px;
        }
    </style>

    <!-- posicionamiento -->
    <!-- <meta name="keywords" content="Reseñas, verificadas, opiniones, comercio, opinion, negocio"> -->
    <!-- <link rel="canonical" href="https://verifyreviews.es">
    <meta name="robots" content="index, follow"> -->

</head>
<body>
    <h1>Escribe tus reseñas</h1>
    

    <?php
        if(isset($val)) echo $val;
    ?>

    <input type='file' title="Sube tus fotos" value='Subir foto'>
    <div id="resultado"> </div>
    <!-- <script>
        $("#resultado").append("HOLAAAA");
    </script> -->
</body>
</html>