<?php 
    // primero se muestra el formulario y cuando se envia 
    if(!isset($resultadoEmail) && !isset($imagenQr)){
?>


<div class="containerformGenerarResena">
    <h3>Genera tus Qr</h3>
    <p class="bien">Solo tus clientes puedan opinar sobre tu negocio</p>
    <small class="info_generar_resenas">
        Cada reseña será unica, de esta manera protegemos tu negocio. Nos aseguramos de que las reseñas que recibe tu negocio sean de tus clientes.
    </small>
    <form action="setGenerarResenas" method="post" class="formLogin">

        <!-- Añadir info para el usuario -->
        <h5>¿Cómo quieres generar Qr?</h5> 
        <select class="inputs" name="accionQr" id="accionQr" >
            <option value="1">Autom&aacute;tico</option>
            <option value="2">Email</option>
            <option value="3">PDF</option> 
            <option value="4">Imágenes zip</option>
        </select>

        <div id="estiloQrContainer" >
            <h5>Elige el estilo del Qr</h5>
            <select class="inputs" name="estiloQr" id="estiloQr">
                <option value="0">Verify Reviews</option>
                <option value="1">Morado azulado</option>
                <option value="2">Tonos verdes</option>
                <option value="4">Tonos marrones</option>
                <option value="5">Tonos naranjas</option>
                <option value="3">Tonos grises 1</option>
                <option value="6">Tonos grises 2</option>
            </select>
        </div>
        

        <div id="previsualizacionQr" class="previsualizacionQr" class="invisible">
            <img src="<?php echo base_url()?>img/preQr/verify.webp" id="prevQr" class="prevQr">
                <!-- Aqui se mostrara la previsualizacion de las imagenes qr  -->
        </div>


        <div id="containerEmailQr" class="invisible">
            <h5>Correo electrónico del cliente</h5>
            <input class="inputs emailQr" type="email" placeholder="Correo electrónico" name="emailQr"  >
        </div>

        <div id="numeroQrContainer" class="invisible">
            <h5>¿Cuántos códigos quieres generar?</h5>
            <select class="inputs" name="numeroQr" id="numeroQr">
                <option value="3">3</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="40">40</option>
            </select>
        </div>
        
        <input class="btn_enviar_largo" type="submit" name="generaQr" value="Generar">
    </form>

</div>

<?php
    }else{
        
        if(isset($imagenQr) && $imagenQr != false) echo "<div class='qrcode-container'>" . $imagenQr ."</div>";

        if(isset($resultadoEmail) && $resultadoEmail != false) echo $resultadoEmail;

?><?php
        


    }
?>
<script>
    $(document).ready(function(){

        var preQr = $("#prevQr");

        function borrarClases(){
            $("#containerEmailQr").removeClass("visible");
            $("#estiloQrContainer").removeClass("visible");
            $("#previsualizacionQr").removeClass("visible");
            $("#numeroQrContainer").removeClass("visible");

            $("#containerEmailQr").removeClass("invisible");
            $("#estiloQrContainer").removeClass("invisible");
            $("#previsualizacionQr").removeClass("invisible");
            $("#numeroQrContainer").removeClass("invisible");
        }
        
        $("#accionQr").change(function(){
            var val = $(this).val();
            // console.log("acccion " + val);

            borrarClases();

            if(val == 1){
                $("#previsualizacionQr").addClass("visible");
                $("#estiloQrContainer").addClass("visible");
                $("#containerEmailQr").addClass("invisible");
                $("#numeroQrContainer").addClass("invisible");
            }else if(val == 2){
                $("#previsualizacionQr").addClass("invisible");
                $("#estiloQrContainer").addClass("invisible");
                $("#containerEmailQr").addClass("visible");
                $("#numeroQrContainer").addClass("invisible");
            }else if(val == 3){
                $("#previsualizacionQr").addClass("invisible");
                $("#estiloQrContainer").addClass("invisible");
                $("#containerEmailQr").addClass("invisible");
                $("#numeroQrContainer").addClass("invisible");
            }else if(val == 4){
                $("#previsualizacionQr").addClass("invisible");
                $("#estiloQrContainer").addClass("invisible");
                $("#containerEmailQr").addClass("invisible");
                $("#numeroQrContainer").addClass("visible");
            }
            
        });

        $("#estiloQr").change(function(){
            var valorSeleccionado = $(this).val();
            console.log(valorSeleccionado);
            
            var cambioSrc;
            switch (valorSeleccionado) {
                case "1":
                    console.log("entra");
                    cambioSrc = "<?php echo base_url()?>img/preQr/morados.webp";
                    break;
                case "2":
                    console.log("entra");
                    cambioSrc = "<?php echo base_url()?>img/preQr/verdes.webp";
                    break;
                case "4":
                    console.log("entra");
                    cambioSrc = "<?php echo base_url()?>img/preQr/marrones.webp";
                    break;
                case "5":
                    console.log("entra");
                    cambioSrc = "<?php echo base_url()?>img/preQr/rosas.webp";
                    break;
                case "3":
                    console.log("entra");
                    cambioSrc = "<?php echo base_url()?>img/preQr/grises.webp";
                    break;
                case "6":
                    console.log("entra");
                    cambioSrc = "<?php echo base_url()?>img/preQr/grises2.webp";
                    break;
                default:
                    cambioSrc = "<?php echo base_url()?>img/preQr/verify.webp";
            }
            console.log(cambioSrc);
            preQr.attr('src', cambioSrc);
        });


    });
</script>

