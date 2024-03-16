<div id="menuContainer">
    <?php   
        echo "Header";

        if(file_exists(base_url() . 'img/imgMenu.json')){
            // si existe se carga
            $jsonContent = file_get_contents($jsonFilePath);

            $jsonData = json_decode($jsonContent, true);

            // si se ha parseado
            if ($jsonData !== null) {
                
                foreach ($jsonData['layers'] as $layer) {
                    if (isset($layer['nm']) && $layer['nm'] === 'menu') {
                        foreach ($layer['shapes'] as $shape) {
                            if (isset($shape['nm']) && $shape['nm'] === 'Path 1') {
                                // Imprimir la ruta de la imagen
                                echo '<img src="' . $shape['ks']['k'][0]['v'][0] . '" alt="Menu">';
                            }
                        }
                    }
                }

            } else {
                echo 'Error al parsear el JSON.';
            }
        }else{
            echo "el archivo no existe";
        }


        // Decodificar el contenido JSON
        $menuData = json_decode($jsonFile, true);

        // Iterar sobre los estados del menú en el JSON y construir el menú
        foreach ($menuData['layers'] as $estado) {
            // Imprimir el nombre del estado como un elemento del menú
            echo '<div>' . $estado['nm'] . '</div>';
        }
    ?>
</div>