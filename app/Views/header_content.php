<div id="menuContainer">
    <?php   
        if(isset($jsonContent)){
            
            $jsonData = json_decode($jsonContent, true);

            if ($jsonData !== null) {
                // Iterar sobre las capas del JSON
                foreach ($jsonData['layers'] as $layer) {
                    // Verificar si la capa es la capa del menú
                    if ($layer['nm'] === 'menu') {
                        // Iterar sobre las formas de la capa
                        foreach ($layer['shapes'] as $shape) {
                            // Verificar si la forma es una imagen
                            if ($shape['ty'] === 4) {
                                // Imprimir la ruta de la imagen
                                echo '<img src="' . $shape['ks']['k'][0]['s']['i'][0] . '" alt="' . $shape['nm'] . '">';
                            }
                        }
                    }
                }
            } else {
                echo 'Error al decodificar el JSON.';
            }
        }else{
            echo "naddaaa";
        }

    ?>
</div>