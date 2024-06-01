<?php
  if(isset($error)){
    echo '<h4 class="error">Error:</h4><br><p class="error">' . $error . '</p>';
  }elseif(isset($resena_enviada) && $resena_enviada == true){
    echo "<p class='bien' >La reseña ha sido enviada correctamente</p>";
    // var_dump($cod_resena);
  }elseif((isset($inicio_sesion_container) && $inicio_sesion_container == true) || isset($errorEmail)){
    // echo FCPATH;
?>
<!-- <form action="setLogin" method="post" id="formSetResena"> -->
  <div class="containerResenaLogin">

    <div id="containerSesion">
      <h4>
        Iniciar sesión
      </h4>
      <form action="setLogin" method="post">

        <input type="hidden" name="es_sesion_resena" value="sesion">
        <input type="hidden" name="qr_key" value="<?php echo $qr_key ;?>">
        
        <input class="inputs" type="email" name="email" id="email" placeholder="Email" required >
        <input class="inputs" type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required >

        <div class="botones_enviar_Resena">
          <input class="btn_enviar_Resena" type="submit" name="submit_sesion" id="submit_sesion" value="Iniciar sesión" >
          <input class="btn_enviar2_Resena" type="button" id="opcion2" value="Continuar sin iniciar sesión">
        </div>
      </form>
    </div>  

    <div id="containerNickname" class="invisible">
      <h4>
        Continuar sin iniciar sesión
      </h4>
      <form action="setLogin" method="post">

        <input type="hidden" name="es_sesion_resena" value="nickname">
        <input type="hidden" name="qr_key" value="<?php echo $qr_key ;?>">

        <input class="inputs" type="text" name="nickname" id="nickname" placeholder="Nickname" required />

        <div class="botones_enviar_Resena">
          <input class="btn_enviar_Resena" type="submit" name="submit_nickname" id="submit_nickname" value="Continuar" >
          <input class="btn_enviar2_Resena" type="button" id="opcion1" value="Iniciar sesion">
        </div>
        
    
      </form>
    </div>
    
  </div>
<!-- </form> -->

  <script>
      $(document).ready(function(){

        var opcion1 = $("#opcion1");
        var opcion2 = $("#opcion2");

        var containerSesion = $("#containerSesion");
        var containerNickname = $("#containerNickname");
        
        var submitSesion = $("submit_sesion");
        var submit_nickname = $("#submit_nickname");

        var formulario = $("#formSetResena");

        opcion2.click(function(){

          containerNickname.toggleClass("invisible");
          containerSesion.toggleClass("invisible");
          // containerNickname.removeClass("invisible");
          // containerNickname.addClass("visible");
          // containerSesion.addClass("invisible");
          // containerSesion.removeClass("invisible");

        });

        opcion1.click(function(){

          // containerNickname.removeClass("visible");
          // containerNickname.addClass("invisible");

          // containerSesion.addClass("invisible");
          // containerSesion.removeClass("invisible");

          containerNickname.toggleClass("invisible");
          containerSesion.toggleClass("invisible");

        });
      });
  </script>

<?php
    if(isset($errorEmail)){
      echo $errorEmail;
    }


  }elseif(isset($completar_formulario_resena) && $completar_formulario_resena == true) {
    $negocio = session() -> get("datos_negocio");
    $negocio = $negocio [0];
    // if(isset($qr_key))echo "sii hay clave";
    // else echo "no hay clavee";
    // echo "<pre>";
    // print_r($negocio);
    // echo "</pre>";

?>

<form action="setResena" method="post" id="setResenaForm" enctype="multipart/form-data">

  <input type="hidden" id="cod_negocio" name="cod_negocio" value="<?php echo $negocio['cod_negocio']; ?>" />
  <input type="hidden" id="qr_key" name="qr_key" value="<?php echo $qr_key ;?>" /> 
  <?php 
    if(session() -> get("sesionIniciada") == true){
      $usuario_en_sesion = session() -> get("usuario_en_sesion");
      echo '<input type="hidden" id="nickname" name="nickname" value="' . $usuario_en_sesion['nickname'] . '" /> ';
    }else{
      //  <!-- si la reseña la escribe un usuario sin  inciar sesion -->
      echo '<input type="hidden" id="nickname" name="nickname" value="' . $nickname . '" /> ';
      echo "<input type='hidden' name='usuario_sin_sesion' />";
    }

    
  ;?>

  

  <h3 class="tituloResenaContent">Escribe tu reseña</h3>

  <div class="resenaContainer" id="resenaContainer">

    <div class="negocio" id="negocio">

      <div class="fotoPerfilNegocio" id="fotoPerfilNegocio">
        <!-- cambiar url -->
        <img class="imagenNegocio" src="<?php echo base_url() . "images/n/n_" . $negocio['cod_negocio'] . "/img_negocio/" . $negocio['foto_principal'] ;?>" alt="Imagen negocio" title="Imagen negocio" />
      </div>

      <div class="datosNegocio" id="datosNegocio">

        <div class="nombreNegocio" id="nombreNegocio">
          <?php echo $negocio['nombre'] ;?>
        </div>

        <div class="direccionNegocio" id="direccionNegocio">
          <!-- Av. Valladolid, 106, 42005 Soria -->
          <?php echo $negocio['calle'] . ", " . $negocio['ciudad'] . ", " . $negocio['pais'];?>
        </div>

      </div>

      <div class="valoracion">
        <h3 class="tituloValoracion">
          ¿Cómo puntuar&iacute;as la experiencia?
        </h3>
        <div class="puntuacionValoracion">
          <!-- imagen --- https://iconos8.es/icon/set/tick/stickers  -->
          <img class="imgPuntuacion" id="imgTick1"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABcUlEQVR4nO3UvUoDQRAH8NVKFPwCFRuDycwVFnYWQiRkNpEgwcoH8AF8BdFObAS10047fYiAH5lJCCgigiIIgqBYBwtNTk4QLnsXuMQNWOQPV92wP3bYGaW6+Q8hxlUS2MudwVjHEF1KzJPglxZ0SfBNlyBvHclXJvuJ4d5DfN/Hhqt6rUIksGsgrmY8sYpk2EkSY60RgXfi6QlrSPZ6dkALPpq3IYEVZTMkcBBomeCxXYQhqxnrxk1eFoszo9aQTCU+RIzP5m3SjEuRD0meT42Q4JY3F81qNONRsGVwGBlJXcWGiaH80wbGaqbkaLMmzYnlEOQpJzAYGSLBQkPPGatpcej3v7datOCrMS91f01ECC4CT9WHacbT4GDCvmo12cv4uGa8DcOIcSc4L/jgrR/VTrz2kMBNyHyYeI0EF9pCWsIYt/+ERMFI4C5ViPVZgZpj8KnLzpyyncADYdy0jvhXjmZYJ8E15aqejkHdqJB8A0RHO5NtxEWKAAAAAElFTkSuQmCC">
          <img class="imgPuntuacion" id="imgTick2"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABcUlEQVR4nO3UvUoDQRAH8NVKFPwCFRuDycwVFnYWQiRkNpEgwcoH8AF8BdFObAS10047fYiAH5lJCCgigiIIgqBYBwtNTk4QLnsXuMQNWOQPV92wP3bYGaW6+Q8hxlUS2MudwVjHEF1KzJPglxZ0SfBNlyBvHclXJvuJ4d5DfN/Hhqt6rUIksGsgrmY8sYpk2EkSY60RgXfi6QlrSPZ6dkALPpq3IYEVZTMkcBBomeCxXYQhqxnrxk1eFoszo9aQTCU+RIzP5m3SjEuRD0meT42Q4JY3F81qNONRsGVwGBlJXcWGiaH80wbGaqbkaLMmzYnlEOQpJzAYGSLBQkPPGatpcej3v7datOCrMS91f01ECC4CT9WHacbT4GDCvmo12cv4uGa8DcOIcSc4L/jgrR/VTrz2kMBNyHyYeI0EF9pCWsIYt/+ERMFI4C5ViPVZgZpj8KnLzpyyncADYdy0jvhXjmZYJ8E15aqejkHdqJB8A0RHO5NtxEWKAAAAAElFTkSuQmCC">
          <img class="imgPuntuacion" id="imgTick3"
          src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABcUlEQVR4nO3UvUoDQRAH8NVKFPwCFRuDycwVFnYWQiRkNpEgwcoH8AF8BdFObAS10047fYiAH5lJCCgigiIIgqBYBwtNTk4QLnsXuMQNWOQPV92wP3bYGaW6+Q8hxlUS2MudwVjHEF1KzJPglxZ0SfBNlyBvHclXJvuJ4d5DfN/Hhqt6rUIksGsgrmY8sYpk2EkSY60RgXfi6QlrSPZ6dkALPpq3IYEVZTMkcBBomeCxXYQhqxnrxk1eFoszo9aQTCU+RIzP5m3SjEuRD0meT42Q4JY3F81qNONRsGVwGBlJXcWGiaH80wbGaqbkaLMmzYnlEOQpJzAYGSLBQkPPGatpcej3v7datOCrMS91f01ECC4CT9WHacbT4GDCvmo12cv4uGa8DcOIcSc4L/jgrR/VTrz2kMBNyHyYeI0EF9pCWsIYt/+ERMFI4C5ViPVZgZpj8KnLzpyyncADYdy0jvhXjmZYJ8E15aqejkHdqJB8A0RHO5NtxEWKAAAAAElFTkSuQmCC">
          <img class="imgPuntuacion" id="imgTick4"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABQ0lEQVR4nO3UvUoDQRSG4dFKFPwD9UosBG0UGxErL8AL8BYkdmIjqNW6zPsls6TRi7CxshQRFEEQBMU6WGiyspBIGEbZxAlY+ME0O7PnYQ67x5j//IVI2gKOrLUzA0NqtdoC8CEpB16stevRkSRJRoHbAuks4K1SqQxHhYDDbqS9TqMi1tpFSU0PeU3TdC4a4pwbA+7921hrN03MACeBlmWxkVWg5SFPaZpOR0OSJJmQ9OjfBlgrXaRer08Be8V/8d0ZwAValpZGJE1Kumy/2JC04p+pVqsbgZs8ZFk2XhoCzr0iDWC5s1+MFknPHtLqPlMWugi05AuTdBbYPza9xjk3C1yHMEkHged3xfgx/aTdnqtAUX81gaW+kF4wYP9XSBkMuJE0EgX6AXsH5k3sBD6Q3eiIN3J2gO08z4cGBv3HBPIJaDKqLtu70qIAAAAASUVORK5CYII=">
          <img class="imgPuntuacion" id="imgTick5"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABQ0lEQVR4nO3UvUoDQRSG4dFKFPwD9UosBG0UGxErL8AL8BYkdmIjqNW6zPsls6TRi7CxshQRFEEQBMU6WGiyspBIGEbZxAlY+ME0O7PnYQ67x5j//IVI2gKOrLUzA0NqtdoC8CEpB16stevRkSRJRoHbAuks4K1SqQxHhYDDbqS9TqMi1tpFSU0PeU3TdC4a4pwbA+7921hrN03MACeBlmWxkVWg5SFPaZpOR0OSJJmQ9OjfBlgrXaRer08Be8V/8d0ZwAValpZGJE1Kumy/2JC04p+pVqsbgZs8ZFk2XhoCzr0iDWC5s1+MFknPHtLqPlMWugi05AuTdBbYPza9xjk3C1yHMEkHged3xfgx/aTdnqtAUX81gaW+kF4wYP9XSBkMuJE0EgX6AXsH5k3sBD6Q3eiIN3J2gO08z4cGBv3HBPIJaDKqLtu70qIAAAAASUVORK5CYII=">
          <div class="resultadoValoracion">

          </div>
        </div>

      </div>

      <div class="moduloResena">
        <h3 class="titulos">
          T&iacute;tulo de su experiencia
        </h3>

        <div class="areaTexto">

          <input type="text" name="textoTitulo" class="textoTitulo" minlenght="50" maxlength="100" title="Título de la reseña" required placeholder="Velada perfecta en pareja ...">
          <div id="infoInputs1" class="infoInputs"></div>

        </div>

      </div>

      <div class="moduloResena">
        <h3 class="titulos">
          Describe tu experiencia
        </h3>

        <div class="areaTexto">

          <textarea class="textoTituloArea" name="textoTituloArea" minlenght="170" maxlength="500" required placeholder="Cuenta como fué tu experiencia para otros usuarios"></textarea>
          <div id="infoInputs2" class="infoInputs"></div>

        </div>

      </div>

      <div class="moduloResena">
        <h3 class="titulos">
          Añade alguna foto <span class="subtitulo">(opcional)</span>
        </h3>

        <div class="areaFile">

          <div class="file-select" id="fotos">
            <input type="file" id="fotos_resena" name="fotos_resena[]" accept="image/*" aria-label="Archivo" multiple>
          </div>

        </div>

      </div>

      <div class="moduloResena">
        <h3 class="titulos">
          Fecha de tu experiencia
        </h3>

        <div class="areaFecha">
          <input type="date" name="fechaResena" id="fechaResena" class="fechaResena" required placeholder="d/m/Y" min="2024-01-01">
        </div>

      </div>
    </div>
  </div>

  <div id="resultadoFormResena">
      <!-- Se insertarán posibles errores -->
  </div>
  
  
  <input type="submit" value="Enviar" />

</form>

<?php

  }

?>

<!-- script para pintar los ticks verdes de una nueva reseña -->
<?php echo "<script src='". base_url() . "js/ticksResenas.js' > </script>";        ?>






