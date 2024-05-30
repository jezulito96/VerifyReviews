
<?php

if(isset($resultado_busqueda)){
    echo '<div class="container_busquedas">';
        foreach($resultado_busqueda as $i => $negocio){
            echo '<a class="container_resultado" href=https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '">';

                echo '<div class="titulo_resultado">';

                    echo "<h4>" . $negocio -> getNombre() . "</h4>";

                echo '</div>';

                echo '<div class="foto_resultado">';
                
                    $foto_principal = $negocio -> getFotoPrincipal();
                    $ruta_img_principal = base_url() . "images/n/n_" . $negocio -> getCodNegocio() . "/img_negocio/" . $foto_principal;
                    echo '<img src="'. $ruta_img_principal .'" title="'. $negocio -> getNombre() .'"/>';

                echo '</div>';

            echo "</a>";
        }
    echo "</div>";
}elseif(isset($error)){
    echo $error;
}




?>
<div class="cerrar_busqueda" ><span>Cerrar búsqueda</span></div>    
<script>
     $("#btn_filtros").click(function(){
        $('.resultados_busqueda').slideUp();
        
    });
    $('.cerrar_busqueda').click(function() {
        $('.resultados_busqueda').slideUp();
    });
</script>