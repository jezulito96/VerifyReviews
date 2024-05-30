
<?php

echo "llega a filtros";
if(isset($resultado_busqueda)){
    print_r($resultado_busqueda);
}elseif(isset($error)){
    echo $error;
}




?>
<div class="cerrar_busqueda" ><span>Cerrar búsqueda</span></div>    
<script>
    $('.cerrar_busqueda').on('click', function() {
        $('.resultados_busqueda').slideUp();
    });
</script>