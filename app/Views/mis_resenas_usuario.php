<h1>Mis reseñas</h1>
<?php

    if(isset($error)){
        echo $error;
    }elseif(isset($lista_resenas)){
        echo "<pre>";
        print_r($lista_resenas);
        echo "</pre>";
    }