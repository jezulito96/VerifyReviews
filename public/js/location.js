$(document).ready(function () {

    $("#ubicacion").click(function () {
        if (navigator.geolocation) {
            // le pido al usuario acceder a su localizacion
            navigator.geolocation.getCurrentPosition(function (position) {
                var latitud = position.coords.latitude;
                var longitud = position.coords.longitude;

                
                $('#resultadoLocation').html('Tu ubicación actual es: Latitud ' + latitud + ' Longitud ' + longitud);

                // si acepta se pinta el mapa
                var map = L.map('mapa').setView([51.505, -0.09], 13);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                
                L.marker([51.5, -0.09]).addTo(map)
                    .bindPopup('A pretty CSS popup.<br> Easily customizable.')
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