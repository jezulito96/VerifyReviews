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
            <input type="password" id="contrasenaNegocio2" required>

            <label for="email">*Email:</label>
            <input type="email" id="email" name="email"  required>
            <!-- pattern="/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/" -->
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
            <input type="url" id="sitio_web" name="sitio_web" required>
                
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
        
        $('input[type="password"]').on('input', function() {
        var contrasena1 = $("#contrasenaNegocio").val();
        var fuerza = 0;
        var cositas = "";
  
        // Check password length
        if (contrasena1.length < 8) {
            cositas += "Mínimo 8 caracteres. ";
        } else {
            fuerza += 1;
        }
  
        // Check for mixed case
        if (contrasena1.match(/[a-z]/) && contrasena1.match(/[A-Z]/)) {
            fuerza += 1;
        } else {
            cositas += "Usa mayúsculas y minúsculas. ";
        }
  
        // Check for numbers
        if (contrasena1.match(/\d/)) {
            fuerza += 1;
        } else {
            cositas += "Al menos un numero. ";
        }
  
        // Check for special characters
        if (contrasena1.match(/[^a-zA-Z\d]/)) {
            fuerza += 1;
        } else {
            cositas += "Al menos un caracter especial. ";
        }
  
        var contrasena1fuerzaElement = $('#error_direccion');
        if (fuerza < 2) {
            contrasena1fuerzaElement.text("Fácil. " + cositas);
            contrasena1fuerzaElement.css('color', 'red');
        } else if (fuerza === 2) {
            contrasena1fuerzaElement.text("Media. " + cositas);
            contrasena1fuerzaElement.css('color', 'orange');
        } else if (fuerza === 3) {
            contrasena1fuerzaElement.text("Dificil. " + cositas);
            contrasena1fuerzaElement.css('color', 'black');
        } else {
            contrasena1fuerzaElement.text("Muy dificil. " + cositas);
            contrasena1fuerzaElement.css('color', 'green');
        }
    });
        
        
        // obtener lat y long a partir de calle, ciudad y pais
        $("#formularioNegocio").submit(function(event) {
            event.preventDefault();
            var todo_guay = false;
            console.log("entraaa");
            var contrasena1 = $("#contrasenaNegocio").val();
            var contrasena2 = $("#contrasenaNegocio2").val();
            
            if(contrasena1 == contrasena2){
                if(contrasena1.length > 8){
                    todo_guay = true;
                    console.log("entra 2");
                }
            }else{
                $("#error_direccion").html("Las contraseñas no coinciden");
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
                        console.log("entra 3");
                        if(todo_guay == true){
                            console.log("entra 4");
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