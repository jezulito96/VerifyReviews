<h1>Únete a nosotros</h1>
<h4>Rellena el formulario para recibir tus reseñas</h4>

<div class="containerNegocioForm">
    <form action="setNegocio" method="post">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" >

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" pattern="/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/" >

        <label for="calle">Calle:</label>
        <input type="text" id="calle" name="calle"  placeholder="C/ Calle Juan Carlos, 15">

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" >

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" >

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" pattern="/^\+(?:[0-9] ?){6,14}[0-9]$/">

        <!-- <label for="fotos">Fotos:</label>
        <input type="file" id="fotos" name="fotos" accept="image/*" multiple> -->

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

        <input type="submit" value="Registrarse" id="registroNegocio">
    </form>
</div>