<?php 
    // primero se muestra el formulario y cuando se envia 
    if(!isset($resultadoEmail) && !isset($imagenQr)){
?>
<h3>Genera códigos Qr para que tus clientes puedan opinar sobre tu negocio</h3>
<p>
    Cada reseña será unica, de esta manera protegemos tu negocio. Nos aseguramos de que las reseñas que recibe tu negocio sean de tus clientes.
</p>
<div class="containerformGenerarResena">
    <form action="setGenerarResenas" method="post" class="formLogin">

        <!-- Añadir info para el usuario -->
        <label>¿Como quieres generar los codigos?</label> 
        <select name="accionQr" id="accionQr" >
            <option value="1">Autom&aacute;tico</option>
            <option value="2">Email</option>
            <option value="3">PDF</option> 
            <option value="4">Imagenes</option>
        </select>

        <div id="estiloQrContainer" class="invisible">
            <label>Elige el estilo del Qr</label>
            <select name="estiloQr" id="estiloQr">
                <option value="0">Verify Reviews</option>
                <option value="1">Morado azulado</option>
                <option value="2">Tonos verdes</option>
                <option value="4">Tonos marrones</option>
                <option value="5">Tonos rosas</option>
                <option value="3">Tonos grises 1</option>
                <option value="6">Tonos grises 2</option>
            </select>
        </div>
        

        <div id="previsualizacionQr" class="previsualizacionQr" class="invisible">
            <img src="<?php echo base_url()?>img/preQr/verify.webp" id="prevQr" class="prevQr">
                <!-- Aqui se mostrara la previsualizacion de las imagenes qr  -->
        </div>


        <div id="containerEmailQr" class="invisible">
            <label>Correo electrónico del cliente </email>
            <input type="email" name="emailQr" class="emailQr" />
        </div>

        <div name="opcionesDescargaContainer" id="opcionesDescargaContainer" class="invisible">
            <label>Selecciona una opcion</label>
            <select name="opcionesDescarga" id="opcionesDescarga">
                <option value="1">Enviar al email</option>
                <option value="2">Descargar en zip</option>
            </select>
        </div>
        
        <input type="submit" name="generaQr" value="Generar codigos">
    </form>

</div>

<?php
    }else{
        
        if(isset($imagenQr) && $imagenQr != false) echo $imagenQr;
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
            $("#containerEmailQr").removeClass("visible");
            $("#opcionesDescargaContainer").removeClass("visible");

            $("#containerEmailQr").removeClass("invisible");
            $("#estiloQrContainer").removeClass("invisible");
            $("#containerEmailQr").removeClass("invisible");
            $("#opcionesDescargaContainer").removeClass("invisible");
        }
        
        $("#opcionesDescarga").change(function(){
            var opcion = $(this).opcion();
            console.log("acccion " + opcion);

            if(opcion == 1){
                $("#containerEmailQr").addClass("visible");
            }else if(opcion == 2){
                $("#containerEmailQr").addClass("invisible");
                $("#estiloQrContainer").addClass("visible");
            }
            
        });

        $("#accionQr").change(function(){
            var val = $(this).val();
            console.log("acccion " + val);

            borrarClases();

            if(val == 1){
                $("#containerEmailQr").addClass("visible");
                $("#estiloQrContainer").addClass("visible");
                $("#containerEmailQr").addClass("invisible");
                $("#opcionesDescargaContainer").addClass("invisible");
            }else if(val == 2){
                $("#containerEmailQr").addClass("invisible");
                $("#estiloQrContainer").addClass("invisible");
                $("#containerEmailQr").addClass("visible");
                $("#opcionesDescargaContainer").addClass("invisible");
            }else if(val == 3){
                $("#containerEmailQr").addClass("invisible");
                $("#estiloQrContainer").addClass("invisible");
                $("#containerEmailQr").addClass("visible");
                $("#opcionesDescargaContainer").addClass("invisible");
            }else if(val == 4){
                $("#containerEmailQr").addClass("invisible");
                $("#estiloQrContainer").addClass("invisible");
                $("#containerEmailQr").addClass("invisible");
                $("#opcionesDescargaContainer").addClass("visible");
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

