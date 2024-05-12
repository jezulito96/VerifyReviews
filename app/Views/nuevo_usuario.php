<h1>Crea tu usuario</h1>
<h4>Rellena el formulario para ver tus antiguas reseñas</h4>

<div class="containerUsuarioForm">
    <form action="setUsuario" method="post" id="formularioUsuario" enctype="multipart/form-data" >

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos">

        <label for="nickname">Nickname:</label>
        <input type="text" id="nickname" name="nickname">

        <label for="contrasenaUsuario">Contraseña</label>
        <input type="password" id="contrasenaUsuario" name="contrasenaUsuario">

        <label for="fotoPerfil">Foto de Perfil:</label>
        <input type="file" id="fotoPerfil" name="fotoPerfil">

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad">

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais">

        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono">

        <input type="submit" value="Registrarse" id="registroUsuario">
    </form>
</div>
<!-- Libreria para obtener lat y long a partir de la calle -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function () {

        // obtener lat y long a partir de calle, ciudad y pais
        $("#formularioUsuario").submit(function(event) {
            event.preventDefault();
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
                        console.log("No se encontró la dirección.");
                    }
                })
                .catch(function (error) {
                    console.log("Error al obtener la latitud y longitud:", error);
                });
        });
    });
</script>