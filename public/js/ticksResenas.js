$(document).ready(function () { 

    ////////////////////////  resenaContent ////////////////////////
    //////////////////////////  calificacion ticks////////////////////////

    var listaTicksPuntuacion = document.querySelectorAll(".imgPuntuacion");
    var tickVerde = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABcUlEQVR4nO3UvUoDQRAH8NVKFPwCFRuDycwVFnYWQiRkNpEgwcoH8AF8BdFObAS10047fYiAH5lJCCgigiIIgqBYBwtNTk4QLnsXuMQNWOQPV92wP3bYGaW6+Q8hxlUS2MudwVjHEF1KzJPglxZ0SfBNlyBvHclXJvuJ4d5DfN/Hhqt6rUIksGsgrmY8sYpk2EkSY60RgXfi6QlrSPZ6dkALPpq3IYEVZTMkcBBomeCxXYQhqxnrxk1eFoszo9aQTCU+RIzP5m3SjEuRD0meT42Q4JY3F81qNONRsGVwGBlJXcWGiaH80wbGaqbkaLMmzYnlEOQpJzAYGSLBQkPPGatpcej3v7datOCrMS91f01ECC4CT9WHacbT4GDCvmo12cv4uGa8DcOIcSc4L/jgrR/VTrz2kMBNyHyYeI0EF9pCWsIYt/+ERMFI4C5ViPVZgZpj8KnLzpyyncADYdy0jvhXjmZYJ8E15aqejkHdqJB8A0RHO5NtxEWKAAAAAElFTkSuQmCC";
    var tickGris = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABQ0lEQVR4nO3UvUoDQRSG4dFKFPwD9UosBG0UGxErL8AL8BYkdmIjqNW6zPsls6TRi7CxshQRFEEQBMU6WGiyspBIGEbZxAlY+ME0O7PnYQ67x5j//IVI2gKOrLUzA0NqtdoC8CEpB16stevRkSRJRoHbAuks4K1SqQxHhYDDbqS9TqMi1tpFSU0PeU3TdC4a4pwbA+7921hrN03MACeBlmWxkVWg5SFPaZpOR0OSJJmQ9OjfBlgrXaRer08Be8V/8d0ZwAValpZGJE1Kumy/2JC04p+pVqsbgZs8ZFk2XhoCzr0iDWC5s1+MFknPHtLqPlMWugi05AuTdBbYPza9xjk3C1yHMEkHged3xfgx/aTdnqtAUX81gaW+kF4wYP9XSBkMuJE0EgX6AXsH5k3sBD6Q3eiIN3J2gO08z4cGBv3HBPIJaDKqLtu70qIAAAAASUVORK5CYII=";
    var resultadoValoracion = $(".resultadoValoracion");
    var tituloResena = $("#textoTitulo");

    // valoracion ticks por defecto 3
    var valoracionTick = 3;
    resultadoValoracion.text("Normal");



    function pintarTicks(num) {
        for (i = 0; i <= num; i++) {
            $("#imgTick" + i).attr("src", tickVerde);
        };
        if (num != 5) {
            for (j = num + 1; j <= 5; j++) {
                $("#imgTick" + j).attr("src", tickGris);
            };
        }

    }

    $("#imgTick1").click(function () {
        pintarTicks(1);
        resultadoValoracion.text("Mala");
        valoracionTick = 1;
    });
    $("#imgTick2").click(function () {
        pintarTicks(2);
        resultadoValoracion.text("Pobre");
        valoracionTick = 2;
    });
    $("#imgTick3").click(function () {
        pintarTicks(3);
        resultadoValoracion.text("Normal");
        valoracionTick = 3;
    });
    $("#imgTick4").click(function () {
        pintarTicks(4);
        resultadoValoracion.text("Buena");
        valoracionTick = 4;
    });
    $("#imgTick5").click(function () {
        pintarTicks(5);
        resultadoValoracion.text("Excelente");
        valoracionTick = 5;
    });
    
    
    $('.textoTitulo').on('input', function() {
        var tamanoMaximo = $(this).attr('minlenght');
        var tamanoActual = $(this).val().length;
        var tamanoRestante = tamanoMaximo - tamanoActual;
        $('#infoInputs1').text('Mínimo ' + tamanoMaximo + ' caracteres (' + tamanoRestante + ' restantes)');
    });

    $('.textoTituloArea').on('input', function() {
        var tamanoMaximo = $(this).attr('minlenght');
        var tamanoActual = $(this).val().length;
        var tamanoRestante = tamanoMaximo - tamanoActual;
        $('#infoInputs2').text('Mínimo ' + tamanoMaximo + ' caracteres (' + tamanoRestante + ' restantes)');
    });

    // estilos para validación usuario

    // <!-- Para validar los campos introducidos antes de enviarlos a base datos -->
    $('#setResenaForm').submit(function(event) {
        event.preventDefault();
        
        //recojo datos
        var codNegocio = $("#cod_negocio");
        var valoracionFinal = valoracionTick;
        $("#setResenaForm").append("<input type='hidden' name='valoracionFinal' value='" + valoracionFinal +"' />");
        var txtTitulo = $(".textoTitulo").val();
        var txtDescripccion = $(".textoTituloArea").val();
        var fechaResena = $("#fechaResena").val();
        var nickname = $("#nickname").val();
        var qr_key = $("#qr_key").val();
        
        // console.log("cod " + codNegocio);
        // console.log("valoracion " + valoracionFinal);
        // console.log("titulo " + txtTitulo);
        // console.log("descripcion " + txtDescripccion);
        // console.log("fecha resena " + fechaResena);
        // console.log("nickname " + nickname);
        // console.log("qr_key " + qr_key);

        var error = "";
        var envioForm = true;

        if (txtTitulo.trim() === '' || txtTitulo.length <= 49) {
            error = "El campo del título debe tener al menos 50 caracateres";
            envioForm = false;
        } else if (txtDescripccion.trim() === '' || txtDescripccion.length <= 169) {
            envioForm = false;
            error = "El campo de la descripción debe tener al menos 170 caracateres";
        } else if (fechaResena.trim() === '') {
            envioForm = false;
        } else if (qr_key.trim() === '') {
            envioForm = false;
        } else if (nickname.trim() === '') {
            envioForm = false;
        }

        //compruebo que la fecha no pase de hoy
        if(envioForm == true){
            
            var fechaActual = new Date();
            var fechaSeleccionada = new Date(fechaResena);

            if (fechaSeleccionada > fechaActual) {
                envioForm = false;
                error = "La fecha que has seleccionado no es correcta";
            }

        }

        if(envioForm == true){
            this.submit();
        }else{
            $("#resultadoFormResena").text(error);
        }


    });

    // para decir que como maximo se pueden subir cinco fotos 
    $('#fotos').change(function() {
        var archivos = this.archivos;
        var maxArchivos = 5;

        // Verificar si se ha excedido el número máximo de archivos
        if (archivos.length > maxArchivos) {
            $("#resultadoFormResena").text(error);
            // Limpiar el valor del input de archivos para eliminar los archivos excedentes
            this.value = '';
        }
    });

});