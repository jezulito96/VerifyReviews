$(document).ready(function () {

    // Al cargar la página, hacer visible el botón y aplicar el efecto de desenfoque
    $('#main').addClass('blur');
    $('#header').addClass('blur');
    $('#ubicacion').show();

    $("#aceptarUbicacion").click(function () {
        $("#containerPermisosUbicacion").hide();
        $('#main').removeClass('blur');
        $('#header').removeClass('blur');
    });   
    
    $("#aceptarUbicacion").click(function () {
        $("#containerPermisosUbicacion").hide();
        $('#main').removeClass('blur');
        $('#header').removeClass('blur');

        if (navigator.geolocation) {
            // le pido al usuario acceder a su localizacion
            navigator.geolocation.getCurrentPosition(function (position) {
                $('#ubicacion').toggle();
                var latitud = position.coords.latitude;
                var longitud = position.coords.longitude;


                $('#resultadoLocation').html('Tu ubicación actual es: Latitud ' + latitud + ' Longitud ' + longitud);

                // si acepta se pinta el mapa
                var mapa = L.map('mapa').setView([latitud, longitud], 16);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(mapa);

                L.marker([latitud, longitud]).addTo(mapa)
                    .bindPopup('Nombre negocio <br> Dirección.') 
                    .openPopup();

            }, function (error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        $('#resultadoLocation').html("El usuario denegó la solicitud de geolocalización.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        $('#resultadoLocation').html("La información de ubicación no está disponible.");
                        break;
                    case error.TIMEOUT:
                        $('#resultadoLocation').html("Se agotó el tiempo de espera para obtener la ubicación del usuario.");
                        break;
                    case error.UNKNOWN_ERROR:
                        $('#resultadoLocation').html("Ocurrió un error desconocido al intentar obtener la ubicación.");
                        break;
                }
            });
        } else {
            $('#resultadoLocation').html("Tu navegador no soporta la geolocalización.");
        }
    });

});