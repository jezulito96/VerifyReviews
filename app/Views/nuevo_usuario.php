<h1>Unete a Verify Reviews</h1>
<div class='div_span'>
    <?php
        if(isset($formulario_correcto)){
            echo "<p class='bien'>". $formulario_correcto . "</p>";
        }else{
        if(isset($error)) echo "<p class='error'>". $error . "</p>";
    ?>
</div>
    <div class="containerUsuarioForm">
        <form action="setUsuario" method="post" id="formularioUsuario" enctype="multipart/form-data" >

            <!-- <label for="nombre">Nombre:</label> -->
            <input class="inputs" type="text" id="nombre" name="nombre" placeholder="Nombre" required>

            <!-- <label for="apellidos">Apellidos:</label> -->
            <input class="inputs" type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required>

            <!-- <label for="nickname">Nickname:</label> -->
            <input class="inputs" type="text" id="nickname" name="nickname" placeholder="Nickname" required>

            <!-- <label for="contrasenaUsuario">Contraseña</label> -->
            <input class="inputs" type="password" id="contrasenaUsuario" name="contrasenaUsuario" placeholder="Contraseña" required>
            
            <!-- <label for="contrasenaUsuario2">Confirmar contraseña</label> -->
            <input class="inputs" type="password" placeholder="Confirmar contraseña" id="contrasenaUsuario2" name="contrasenaUsuario2" required>
            <div id="resultado_contrasena" class="div_span"></div>

            <!-- <label for="fotoPerfil">Foto de Perfil:</label> -->
            <input class="inputs" type="file" id="fotoPerfil" name="fotoPerfil" placeholder="Foto de Perfil">

            <!-- <label for="ciudad">Ciudad:</label> -->
            <input class="inputs" type="text" id="ciudad" name="ciudad" placeholder="Ciudad" required>

            <!-- <label for="pais">País:</label> -->
            <input class="inputs" type="text" id="pais" name="pais" placeholder="País" required>

            <!-- <label for="fechaNacimiento">Fecha de Nacimiento:</label> -->
            <input class="inputs" type="date" id="fechaNacimiento" name="fechaNacimiento" placeholder="Fecha de Nacimiento" required>

            <!-- <label for="email">Email:</label> -->
            <input class="inputs" type="email" id="email" name="email" placeholder="Email" required>

            <!-- <label for="telefono">Teléfono:</label> -->
            <input class="inputs" type="tel" id="telefono" name="telefono" placeholder="Teléfono" >

            <input class="inputs" type="submit" value="Registrarse" id="registroUsuario">
            <div id="error_direccion" class="div_span"></div>
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
            var contrasena1 = $("#contrasenaUsuario").val();
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

            var resultado_contrasena = $('#resultado_contrasena');
            if (fuerza < 2) {
                resultado_contrasena.text("Seguridad: sencilla. " + cositas);
                resultado_contrasena.css('color', 'red');
            } else if (fuerza === 2) {
                resultado_contrasena.text("Seguridad: Media. " + cositas);
                resultado_contrasena.css('color', 'orange');
            } else if (fuerza === 3) {
                resultado_contrasena.text("Seguridad: Segura. " + cositas);
                resultado_contrasena.css('color', 'black');
            } else {
                resultado_contrasena.text("Seguridad: Muy segura. " + cositas);
                resultado_contrasena.css('color', 'green');
            }
        });
        
        // obtener lat y long a partir de calle, ciudad y pais
        $("#formularioUsuario").submit(function(event) {
            event.preventDefault();
            var todo_guay = false;
            console.log("entraaa");
            var contrasena1 = $("#contrasenaUsuario").val();
            var contrasena2 = $("#contrasenaUsuario2").val();
            
            if(contrasena1 == contrasena2){
                if(contrasena1.length > 8){
                    todo_guay = true;
                    console.log("entra 2");
                }
            }else{
                $("#error_direccion").html("Las contraseñas no coinciden");
            }

            var ciudad = $("#ciudad").val();
            var pais = $("#pais").val();

            var direccion = ciudad + ", " + pais;
            var url = "https://nominatim.openstreetmap.org/search?format=json&q=" + encodeURIComponent(direccion);

            axios.get(url)
                .then(function (response) {
                    var resultado = response.data[0];
                    if (resultado) {
                        var latitud = resultado.lat;
                        var longitud = resultado.lon;
                        $("<input>").attr({
                        type: "hidden",
                        id: "latitud",
                        name: "latitud",
                        value: latitud
                        }).appendTo("#formularioUsuario");

                        $("<input>").attr({
                        type: "hidden",
                        id: "longitud",
                        name: "longitud",
                        value: longitud
                        }).appendTo("#formularioUsuario");

                        $('#formularioUsuario').unbind('submit').submit();
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