
<?php

echo "llega a filtros";
if(isset($resultado_busqueda)){
    foreach($resultado_busqueda as $i => $negocio){
        echo "<br>" . $negocio -> getNombre() . "<br>";
    }

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