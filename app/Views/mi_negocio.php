<h1>Mis negocio</h1>
<?php

    if(isset($error)){
        echo $error;
    }elseif(isset($lista_resenas)){
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

?>

<script>
    $(document).ready(function() {

        $('.mi_resena').on('click', function() {
            $(this).find('.mi_resena_container').toggle();
        });

    });
</script>