
<nav>
    <div class="containerFiltro">
        <img class="imgFiltro" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB/klEQVR4nO2ZO0gcURSGv3U3ImGbbUQFxRQKSWHANBF8FDEQbGKjVWySTgsxVdAmpZ2pTBULsbMSC7GICBJioY1VwBQRhYiCaIwvfNwwcCbcRnd2d2b2jNwPplnu+c/591xm7z0LDt0sASYhz8pdRkzCnlvJu0AJJqiRHHrJBTHyTRZ8B7LoIyu1eTWu37WwGvghC78CVeihEliQ2jaB2nwB9cAvCZgDHlB+0sCs1LQNNAYNbAJ+S+AMUEH5SAFTUsse8LhQgRbgQASmRDBuUsBnqeEQaC1W6DlwLEKfiJ9xyX0CdJQq9gI4E8FR4mNMcl4Ar8ISfQ1civB7omdIcl0BfWGLvwGugRvgHdExYOV5G1WSQeub6o9Av9fq/AgRM2rt3Z4QdbuBc9H+QMxvk1OgMwS9NuvtOEHM7/dJSXwEPCtB66n1ezVJGfDMfJEC9oEnRWg0A7saThBp6wy0AzwqILYB2LLOdBkUnUp/AnUBYtSesh/KHbrQq+qqxntPrggjam+iJuCdX/1swDgjyjCuI8owriPKMK4jyjCuI8owriPKMK4jyjD3rSPtAdepZVkK9Mad00BNUo1kgGGZdXmF/gU+yoAiUUZ8aqQjN1KwNzF5mUQjPt44dcMqfF7+o0ycEX+7jVjb7U9Sjdy23RJrxKcLWAMW/3/iuIf8A6CVNVOPYxZnAAAAAElFTkSuQmCC">
    </div>
    <div class="containerBusqueda">
        <input type="search" placeholder="Buscar">
    </div>
 </nav>       


<h3>Comercios:</h3>
    <section class="slick-carousel">
    <?php 
    if(isset($listaCategorias)){
        foreach($listaCategorias as $i => $categoria){
            echo '
                
                <div class="fotoContainer">
                
                <img src="'. base_url()  . 'img/categorias/flechaAtras.png" class="flechaAtras">
        
                    <img src="'. base_url()  . 'img/categorias/catM-'. $categoria -> getCodCategoria()  . '.jpg" alt="'. $categoria -> getTipoNegocio()  . ' " title="'. $categoria -> getTipoNegocio()  . ' " class="imgCat">
        
                <img src="'. base_url()  . 'img/categorias/flechaDelante.png" class="flechaDelante">
        
                <h4>'. $categoria -> getTipoNegocio()  . ' </h4>
                
                </div>
            
            ';
        }
    }
    ?>
    </section>

<script>
    $(document).ready(function(){
        $('.slick-carousel').slick({
            dots: true, // puntitos
            slidesToShow: 1, // fotos que se pintan a la vez
            prevArrow:".flechaAtras",
            nextArrow:".flechaDelante"
        });
    });
</script>

    <?php 
    // if (isset ($listaCategorias)) {
    //     foreach ($listaCategorias as $indice => $valor) {
    //         echo $valor['cod_categoria'] . " -> " . $valor['tipo_negocio'];
    //     }
    // }


    // if (isset ($qr)) {
    //     // var_dump($qr);
    //     echo "<br>";
    //     if (isset ($qr)) {
    //         echo "<img src=" . $qr . " alt='Código QR' class='codigoQr'>";
    //         // echo $qr;
    //     }
    // }

    // if (isset ($_GET['clavePublica']))
    //     ;

    // <!-- <div id="resultado">Prueba -- </div> -->

    // <!-- formulario para conseguir longitud y latitud -->
    // <!-- <label for="calle">Calle:</label><br>
    // <input type="text" id="calle" name="calle"><br>
    // <label for="ciudad">Ciudad:</label><br>
    // <input type="text" id="ciudad" name="ciudad"><br>
    // <label for="pais">País:</label><br>
    // <input type="text" id="pais" name="pais"><br><br>
    // <button type="button" id="obtenerLocalizacion">Comprobar direccion</button> -->

?>