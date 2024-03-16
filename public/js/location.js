$(document).ready(function(){

    $(document).ready(function(){
        $("#ubicacion").click(function(){
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    
                    $('#resultadoLocation').html('Tu ubicación actual es: Latitud ' + latitude + ' Longitud ' + longitude);
                    
                    // Aquí puedes hacer una llamada AJAX para obtener información basada en la ubicación
                    // por ejemplo:
                    // $.get('tu_servicio_de_backend', {latitude: latitude, longitude: longitude}, function(data){
                    //     // Mostrar información en el DOM
                    // });
                }, function(error) {
                    switch(error.code) {
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
        
    
});
