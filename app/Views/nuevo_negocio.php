<h1>Únete a nosotros</h1>
<h4>Rellena el formulario para recibir tus reseñas</h4>

<div class="containerNegocioForm">
    <form action="setNegocio" method="post" id="formularioNegocio">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" pattern="/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/">

        <label for="calle">Calle:</label>
        <input type="text" id="calle" name="calle" placeholder="C/ Calle Juan Carlos, 15">

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad">

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais">

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" pattern="/^\+(?:[0-9] ?){6,14}[0-9]$/">

        <!-- <label for="fotos">Fotos:</label>
        <input type="file" id="fotos" name="fotos" accept="image/*" multiple> -->

        <label for="sitio_web">Sitio Web:</label>
        <input type="url" id="sitio_web" name="sitio_web"
            pattern="/^https?:\/\/(?:www\.)?[\w-]+(\.[\w-]+)+[\w.,@?^=%&:/~+#-]*$/">

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria">
            <?php
            if (isset($listaCategorias)) {
                foreach ($listaCategorias as $i => $cat) {
                    echo '<option value="' . strtolower($cat->getTipoNegocio()) . '">' . $cat->getTipoNegocio() . '</option>';
                }
            }
            ?>
        </select>

        <input type="submit" value="Registrarse" id="registroNegocio">
    </form>
</div>
<!-- Libreria para obtener lat y long a partir de la calle -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function () {

        // obtener lat y long a partir de calle, ciudad y pais
        $("#formularioNegocio").submit(function(event) {
            event.preventDefault();
            console.log("entra");
            var calle = $("#calle").val();
            var ciudad = $("#ciudad").val();
            var pais = $("#pais").val();

            var direccion = calle + ", " + ciudad + ", " + pais;
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
                        }).appendTo("#formularioNegocio");

                        $("<input>").attr({
                        type: "hidden",
                        id: "longitud",
                        name: "longitud",
                        value: longitud
                        }).appendTo("#formularioNegocio");

                        $('#formularioNegocio').unbind('submit').submit();
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