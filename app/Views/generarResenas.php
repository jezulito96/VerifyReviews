<?php 
    // primero se muestra el formulario y cuando se envia 
    if(!isset($imagenQr)){
?>
<h3>Genera códigos Qr para que tus clientes puedan opinar sobre tu negocio</h3>
<p>
    Cada reseña será unica, de esta manera protegemos tu negocio. Nos aseguramos de que las reseñas que recibe tu negocio sean de tus clientes.
</p>
<div class="containerformGenerarResena">
    <form action="setGenerarResenas" method="post" class="formLogin">

        <label>¿Cuántas reseñas quieres generar?</label>
        <select name="numeroQr" id="numeroQr" >
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
        </select>

        <label>Escoge un color para el codigo Qr</label>
        <select name="colorQr" id="colorQr" >
            <option value="150px">Pequeño</option>
            <option value="200px">Mediano</option>
            <option value="300px">Grande</option>
        </select>

        <div id="previsualizacion" class="previsualizacion">
            <div id="prevQr" class="prevQr">

            </div>

            <div id="prevNegocio" class="prevNegocio">
                <?php if(isset($preNegocio)) echo $preNegocio; ?>
            </div>
        </div>

        <input type="button" name="previsualizarQr" id="previsualizarQr" value="Previsualizar Qr" /> 
        <input type="submit" name="generaQr" value="Generar codigos">
    </form>
</div>

<?php
    }else{
        
        echo $imagenQr;
        
?><?php
        


    }
?>
<script>
    $(document).ready(function(){
        var botonPrevisualizacion = $("#previsualizarQr");

        botonPrevisualizacion.click(function(){
            numeroQr = $("#numeroQr");
            colorQr = $("#colorQr");

            

        });
        
    });
</script>

