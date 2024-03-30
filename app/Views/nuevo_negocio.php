<h1>Únete a nosotros</h1>
<h4>Rellena el formulario para recibir tus reseñas</h4>

<div class="containerNegocioForm">
    <form action="#" method="post">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" pattern="/^[A-Za-z\s]+$/" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" pattern="/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/" required>

        <label for="calle">Calle:</label>
        <input type="text" id="calle" name="calle" pattern="/^[A-Za-z0-9\s.,#-]+$/" placeholder="C/ Calle Juan Carlos, 15">

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" pattern="/^[A-Za-z0-9\s.,#-]{1,70}$/" required>

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" pattern="/^[A-Za-z\s]+$/">

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" pattern="/^\+(?:[0-9] ?){6,14}[0-9]$/">

        <label for="fotos">Fotos:</label>
        <input type="file" id="fotos" name="fotos" accept="image/*" multiple>

        <label for="sitio_web">Sitio Web:</label>
        <input type="url" id="sitio_web" name="sitio_web" pattern="/^https?:\/\/(?:www\.)?[\w-]+(\.[\w-]+)+[\w.,@?^=%&:/~+#-]*$/">

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria">
        <?php
            if(isset($listaCategorias)){
                foreach($listaCategorias as $i => $cat){
                    echo '<option value="'. strtolower($cat -> getTipoNegocio()) .'">'. $cat -> getTipoNegocio() .'</option>';
                }
            }
        ?>
        </select>

        <input type="submit" value="Enviar">
    </form>
</div>