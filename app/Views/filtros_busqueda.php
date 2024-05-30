
<nav>
<div class="filtros_container">
    <button id="btn_filtros"><i class="fas fa-filter"></i> Filtros</button>
    <input type="text" placeholder="Buscar" id="buscar">
    <i class="fas fa-search" id="buscar-icono"></i>
</div>
<div id="container_filtros" style="display:none;">  
   
<div id="lista-filtros">
    <ul class="filtro">
        <li>
            <i class="fas fa-map-marker-alt"></i> Ciudad:
            <span class="valores">España</span>
        </li>
    </ul>
    <ul class="filtro">
        <li>
            <i class="fas fa-utensils"></i> Categoría:
            <span class="valores">Restaurantes, Peluquerías, Cafeterías, Talleres, Perfumería, Psicología, Moda</span>
        </li>
    </ul>
    <ul class="filtro">
        <li>
            <i class="fas fa-star"></i> Valoración:
            <span class="valores">1, 2, 3, 4, 5</span>
        </li>
    </ul>
</div>
</div>
    

</div>
<div class="resultados_busqueda" style="display:none;">

    <!-- se mostraran los resultados de la busqueda y los filtros -->
    <?php if(isset($hola)) echo $hola; ?>
    <div class="cerrar_busqueda" ><span>Cerrar búsqueda</span></div>    
</div>

</nav> 


<script>
$(document).ready(function() {
    $("#btn_filtros").click(function(){
        $("#container_filtros").toggle();
    });

    $('#buscar-icono').click(function() {
        $("#cerrar_busqueda").toggle();
        var query = $('#buscar').val();
        $.ajax({
            url: 'https://verifyreviews.es/verifyreviews/filtro',
            type: 'POST',
            data: { texto: query },
            success: function(response) {
                $('.resultados_busqueda').html(response).show();
            },
            error: function(xhr, status, error) {
                console.error('Error en la búsqueda:', error);
            }
        });
    });
});
$('.cerrar_busqueda').on('click', function() {
    $('.resultados_busqueda').slideUp();
});
</script>

