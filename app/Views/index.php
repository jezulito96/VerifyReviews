<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php echo "<script type='text/javascript' src='". base_url() . "jquery/jquery.js' > </script>"; ?>
    
    <?php //echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>'; ?>
    <?php echo "<script src='". base_url() . "archivosJs/prueba.js' > </script>"; ?>
    <?php echo "<link rel='stylesheet' href='". base_url() . "css/index.css' />"; ?>

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
    <h1>Proyecto de DAW</h1>
    

    <?php
        if(isset($listaCategorias)){
            foreach($listaCategorias as $indice => $valor){
                echo $valor['cod_categoria'] . " -> " . $valor['tipo_negocio']; 
            }
        }


        if(isset($qr)){
            // var_dump($qr);
            echo "<br>";
            if(isset($qr)){
                echo "<img src=". $qr . " alt='Código QR' class='codigoQr'>";
                // echo $qr;
            }
        }

        if(isset($_GET['clavePublica'])) ; 

    ?>
    <div id="resultado">Prueba --  </div>
</body>
</html>