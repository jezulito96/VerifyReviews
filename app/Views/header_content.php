<div id="menuContainer">
    <?php   
        
        $jsonFilePath = base_url() . 'imgs/imgMenu.json';

        // Verificar si el archivo existe
        if (file_exists($jsonFilePath)) {
            // Cargar el contenido del archivo JSON
            $jsonContent = file_get_contents($jsonFilePath);

            // Decodificar el contenido JSON
            $jsonData = json_decode($jsonContent, true);

            // Verificar si la decodificación fue exitosa
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
        } else {
            echo 'El archivo JSON no existe.';
        }

    ?>
</div>