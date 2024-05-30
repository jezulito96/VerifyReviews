
<?php
if(isset($hola)) echo $hola;
?>
<div class="cerrar_busqueda" ><span>Cerrar búsqueda</span></div>    
<script>
    $('.cerrar_busqueda').on('click', function() {
        $('.resultados_busqueda').slideUp();
    });
</script>