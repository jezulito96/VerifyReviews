<h1>Únete a nosotros</h1>
<h4>Rellena el formulario para recibir tus reseñas</h4>

<?php

    if(isset($error)){
        echo $error;
    }else{
?>
    <div class="containerNegocioForm">
        <?php
            if(isset($form_correcto)) echo $form_correcto;
        ?>
        <form action="setNegocio" method="post" id="formularioNegocio" enctype="multipart/form-data" >

            <label for="nombreNegocio">*Nombre del negocio:</label>
            <input type="text" id="nombreNegocio" name="nombreNegocio" required>

            <label for="contrasenaNegocio">*Contraseña:</label>
            <input type="password" id="contrasenaNegocio" name="contrasenaNegocio" required>

            <label for="contrasenaNegocio2">*Confirma la contraseña:</label>
            <input type="password2" id="contrasenaNegocio2" required>

            <label for="email">*Email:</label>
            <input type="email" id="email" name="email" pattern="/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/" required>

            <label for="calle">*Dirección:</label>
            <input type="text" id="calle" name="calle" placeholder="C/ Calle Juan Carlos, 15" required>

            <label for="ciudad">*Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" required>

            <label for="pais">*País:</label>
            <input type="text" id="pais" name="pais" required>

            <label for="telefonoNegocio">*Teléfono:</label>
            <input type="tel" id="telefonoNegocio" name="telefonoNegocio" required>

            <label for="fotos">Fotos:</label>
            <input type="file" id="fotos" name="fotos[]" accept="image/*" multiple >

            <label for="fotoPrincipal">*Fotos principal:</label>
            <input type="file" id="fotoPrincipal" name="fotoPrincipal" accept="image/*" required>

            <label for="sitio_web">Sitio Web:</label>
            <input type="url" id="sitio_web" name="sitio_web"
                pattern="/^https?:\/\/(?:www\.)?[\w-]+(\.[\w-]+)+[\w.,@?^=%&:/~+#-]*$/" required>
                
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <?php
                if (isset($listaCategorias)) {
                    foreach ($listaCategorias as $i => $cat) {
                        echo '<option value="' . $cat->getCodCategoria() . '">' . $cat->getTipoNegocio() . '</option>';
                    }
                }
                ?>
            </select>

            <label for="telefonoTitular">Teléfono del titular:</label>
            <input type="tel" id="telefonoTitular" name="telefonoTitular" required>

            <label for="nombreTitular">Nombre del titular:</label>
            <input type="text" id="nombreTitular" name="nombreTitular" required>

            <input type="submit" value="Registrarse" id="registroNegocio">
            <div id="error_direccion"></div>
        </form>
    </div>
<?php
    }
?>
<!-- Libreria para obtener lat y long a partir de la calle -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function () {
        // obtener lat y long a partir de calle, ciudad y pais
        
        $("#formularioNegocio").submit(function(event) {
            event.preventDefault();
            var todo_guay = false;
            
            var contrasena1 = $("#contrasenaNegocio").val();
            var contrasena2 = $("#contrasenaNegocio2").val();
            var pattern_contrasena = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,16}$/;
            if(contrasena1 == contrasena2){
                if(pattern_contrasena.test(contrasena1)){
                    todo_guay = true;
                }
            }

            var calle = $("#calle").val();
            var ciudad = $("#ciudad").val();
            var pais = $("#pais").val();

            var direccion = calle + ", " + ciudad + ", " + pais;
            var url = "https://nominatim.openstreetmap.org/search?format=json&q=" + encodeURIComponent(direccion);

            axios.get(url).then(function (response) {
                    var resultado = response.data[0];
                    if (resultado) {
                        var latitud = resultado.lat;
                        var longitud = resultado.lon;
                        $("<input>").attr({
                        type: "hidden",
                        id: "latitud",
                        name: "latitud",
                        value: latitud
                        }).appendTo("#formularioNegocio");

                        $("<input>").attr({
                        type: "hidden",
                        id: "longitud",
                        name: "longitud",
                        value: longitud
                        }).appendTo("#formularioNegocio");

                        if(todo_guay == true){
                            $('#formularioNegocio').unbind('submit').submit();
                        }
                        
                    } else {
                        $("#error_direccion").html("<p>Porfavor, introduzca correctamente la dirección del negocio</p>");
                    }
                })
                .catch(function (error) {
                    console.log("Error al obtener la latitud y longitud:", error);
                });
        });
    });
</script>