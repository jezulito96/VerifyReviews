<!-- <div class="espacioHeader"></div> -->
<div class="headerContainer">

    <div class="logoContainer">
        <div class="logo">
            <a href="https://verifyreviews.es">
                <?php echo '<img class="imgLogo" src="'.base_url() .'img/logoMovil.png" title="Verify Reviews" alt="Verify Reviews" />'; ?>
            </a>
        </div>

    </div>

    <div class="menuContainer">
        <!-- Logo de https://iconos8.es/icon/set/cruz-menu/family-office -->
        <img class="imgMenu"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAT0lEQVR4nO3WwQkAIAwDwIzezesWKuEO8jf4aBIAHpmSZEuS1w9QJK0/MiUBAPLBRTbj0zoatySpKTIlAQDywUU249M6GrckqSkyJQEg1x3OPOvHECpbTAAAAABJRU5ErkJggg==" />

        <!-- Logo de https://iconos8.es/icon/set/cruz-menu/family-office -->
        <img class="imgMenu2" style="display: none"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABKElEQVR4nO2YzU7CQBRGz+PogldAZYE/rJSCO3CJoLj0kX0A5SeAlDShhpAZ2tA6nU6+k3TXuZmT2+nce0EIIYQQQvhIA3guMV4LuMExl8AXsAGGJcRrAt/AzKVMKhHvn9+CMlfAz0G8GXCNA/r7TMQlyLSB+VGsLfCGIxKZtWEDoxIkPnBMzyLzmmPtLbAwrJ1SERGwMmxofGLNnW8S58h4K5HStchM/t6Ae4vEO57RAZaWP1BtJFIeLZnJypaXPBgyU9k98V8ytZIIRqST49Py9pAHddifTmy4Nr/fbo7b3ftbPQqhRInOqIBtla/z8j2rjB/l7EW8kOkbJJIu8aVgYxUDnzgimFb34mj4UHSS0qxq+HAok0gMqOk4KKgBnRBCCCGEIJMdXBTwCqWDRf4AAAAASUVORK5CYII=" />
    </div>

</div>
<!-- Lista que se desplegará al hacer clic en el botón -->
<ul class="listaMenu" style="display: none">
    <?php
        
        if(isset($sesionIniciada) && $sesionIniciada == 1) {

            echo '<li><a href="http://verifyReviews.es/verifyreviews/cerrarSesion">Cerrar sesion</a></li>';
            echo '<li>Escribe tu reseña</li>';
            echo '<li>Mis reseñas</li>';
            

        } else if(isset($sesionIniciada) && $sesionIniciada == 2){
            echo '<li><a href="http://verifyReviews.es/verifyreviews/cerrarSesion">Cerrar sesion</a></li>';
            echo '<li>Mis reseñas</li>';
            echo '<li><a href="http://verifyReviews.es/verifyreviews/generarResenas">Generar reseñas</a></li>';

        } else{

            echo '<li><a href="http://verifyReviews.es/verifyreviews/login">Iniciar sesion</a></li>';
            echo '<li><a href="http://verifyReviews.es/verifyreviews/nuevoNegocio">¿Eres un negocio?</a></li>';
            echo '<li><a href="http://verifyReviews.es/verifyreviews/nuevoUsuario">Registrate</a></li>';
            echo '<li>Escribe tu reseña</li>';

        }       
    ?>

</ul>

<nav>
    <div class="containerFiltro">
        <img class="imgFiltro" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB/klEQVR4nO2ZO0gcURSGv3U3ImGbbUQFxRQKSWHANBF8FDEQbGKjVWySTgsxVdAmpZ2pTBULsbMSC7GICBJioY1VwBQRhYiCaIwvfNwwcCbcRnd2d2b2jNwPplnu+c/591xm7z0LDt0sASYhz8pdRkzCnlvJu0AJJqiRHHrJBTHyTRZ8B7LoIyu1eTWu37WwGvghC78CVeihEliQ2jaB2nwB9cAvCZgDHlB+0sCs1LQNNAYNbAJ+S+AMUEH5SAFTUsse8LhQgRbgQASmRDBuUsBnqeEQaC1W6DlwLEKfiJ9xyX0CdJQq9gI4E8FR4mNMcl4Ar8ISfQ1civB7omdIcl0BfWGLvwGugRvgHdExYOV5G1WSQeub6o9Av9fq/AgRM2rt3Z4QdbuBc9H+QMxvk1OgMwS9NuvtOEHM7/dJSXwEPCtB66n1ezVJGfDMfJEC9oEnRWg0A7saThBp6wy0AzwqILYB2LLOdBkUnUp/AnUBYtSesh/KHbrQq+qqxntPrggjam+iJuCdX/1swDgjyjCuI8owriPKMK4jyjCuI8owriPKMK4jyjD3rSPtAdepZVkK9Mad00BNUo1kgGGZdXmF/gU+yoAiUUZ8aqQjN1KwNzF5mUQjPt44dcMqfF7+o0ycEX+7jVjb7U9Sjdy23RJrxKcLWAMW/3/iuIf8A6CVNVOPYxZnAAAAAElFTkSuQmCC">
    </div>
    <div class="containerBusqueda">
        <input type="search" placeholder="Buscar">
    </div>
</nav> 