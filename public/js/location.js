$("#location").click(function () { 
    if ("geolocation" in navigator){ 
        navigator.geolocation.getCurrentPosition(function(position){ 
                $("#resultadoLocation").append("Latitud : "+position.coords.latitude+" Longitud :"+ position.coords.longitude); });
    }else{
        console.log("maaal!");
    }
});