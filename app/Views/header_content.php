<div id="menuContainer">
    <?php   
        echo "Header";

        // Cargar el contenido del archivo JSON
        $jsonFile = file_get_contents(base_url() . 'img/imgMenu.json');

        // Decodificar el contenido JSON
        $menuData = json_decode($jsonFile, true);

        // Iterar sobre los estados del menú en el JSON y construir el menú
        foreach ($menuData['layers'] as $estado) {
            // Imprimir el nombre del estado como un elemento del menú
            echo '<div>' . $estado['nm'] . '</div>';
        }
    ?>
</div>