<?php if(isset($cabecera)) echo $cabecera  ?>
<body>
    <h1>Escribe tus reseñas</h1>
    

    <?php
        if(isset($val)) echo $val;
    ?>

    <input type='file' title="Sube tus fotos" value='Subir foto'>

    <br/>

    <button id="ubicacion">Permiso para accder a tu Ubicación</button>
    <div id="resultadoLocation"></div>
    <div id="mapa" class="mapa"></div>
    
    
    
</body>
</html>