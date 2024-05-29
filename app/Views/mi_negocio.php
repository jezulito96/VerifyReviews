<h1>Mi negocio</h1>

<h3>Valoración</h3>
<?php

if(isset($error)){
    echo $error;
}else{
  
    if(isset($estadisticas)){
        echo $estadisticas;
    }
    
?>

<h3>Tus reseñas</h3>

<?php
    if(isset($lista_resenas)){
        echo "<ul>";
        foreach($lista_resenas as $i => $resena){

            echo "<li class='mi_resena'>";
                $fecha_completa = $resena -> getFechaServicio();
                $fecha = substr($fecha_completa, 0, 10);
                echo  $fecha . " - " .  $resena -> getNickname() ;

                echo '<div class="mi_resena_container" style="display:none;">Holaa</div>';

            echo "</li>";

        }
        echo "</ul>";
    }
}
?>

<script>
    $(document).ready(function() {

        $('.mi_resena').on('click', function() {
            $(this).find('.mi_resena_container').toggle();
        });

    });
</script>