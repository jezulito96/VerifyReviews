<?php if (isset ($head_content)) echo $head_content ?>

    <body>
        <header>
        <?php if (isset ($header_content))  echo $header_content; ?>
    </header>

    

    <main>
        
        <?php if(isset($resena_content)) echo $resena_content ?>
    
        <?php
        if (isset ($val))
            echo $val;
        ?>

        <br />

        <button id="ubicacion">Permiso para accder a tu Ubicación</button>
        <div id="resultadoLocation"></div>
        <div id="mapa" class="mapa"></div>
    </main>




</body>

</html>