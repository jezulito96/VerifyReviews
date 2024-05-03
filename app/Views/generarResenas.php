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

        

        <label>Elige el estilo del Qr</label>
        <select name="estiloQr" id="estiloQr" >
            <option value="0">Verify Reviews</option>
            <option value="1">Tonos morados</option>
            <option value="2">Tonos verdes</option>
            <option value="3">Tonos grises</option>
            <option value="4">Tonos marrones</option>
            <option value="5">Tonos rosas</option>
            <option value="6">Tonos grises</option>
        </select>

        <!-- <label>Escoge un color para el codigo Qr</label>
        <select name="colorQr" id="colorQr" >
            <option value="150px">Pequeño</option>
            <option value="200px">Mediano</option>
            <option value="300px">Grande</option>
        </select> -->

        <!-- <input type="button" name="previsualizarQr" id="previsualizarQr" value="Previsualizar Qr" style="background:red;"/>  -->

        <div id="previsualizacion" class="previsualizacion">
            <img src="<?php echo base_url()?>img/preQr/default.webp" id="prevQr" class="prevQr">
                <!-- Aqui se mostrara la previsualizacion de las imagenes qr  -->
        </div>

        
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

        var preQr = $("·prevQr");

        click(function(){
            
        });
        
    });
</script>

