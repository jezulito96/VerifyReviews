<div class="mi_negocio">

    <h1 style="padding-left:20px;">Mi negocio</h1>

    <h5>Valoración</h5>
    <?php
    if(isset($error)){
        echo $error;
    }else{
    
        if(isset($estadisticas)){
            echo '<div class="container_valoracion">';
                echo "<h6>Valoracion de tus clientes:</h6>" . "<h5>" . round($estadisticas['nota_media'],1) . " / 5</h5>";
            echo '</div>';
        
    ?>
    <h5>Ranking</h5>
    <?php 
        

            foreach($estadisticas['ranking'] as $i => $posicion){
                echo '<a href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" class="container_ranking">';

                    echo '<h1 class="bien">' . $i .'</h1>';
                    echo '<h5>'. $posicion['nombre'] .' </h5>';

                echo '</a>';
            }

        
    ?>


    <h5>Tus reseñas</h5>
    <?php
        }

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

</div>


<script>
    $(document).ready(function() {

        $('.mi_resena').on('click', function() {
            $(this).find('.mi_resena_container').toggle();
        });

    });
</script>