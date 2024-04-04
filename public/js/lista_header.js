$(document).ready(function(){

    // menu desplegable
    var imgMenu = $(".imgMenu");
    var imgMenu2 = $(".imgMenu2");
    var imgLogo = $(".imgLogo");
    var cont = 1;
    $(".menuContainer").click(function () {

        if (cont == 1) {
            cont++;
            $(".listaMenu").toggle("blind", 500);
            imgMenu.toggle("clip", 500);
            imgLogo.toggle();
            setTimeout(function () {
                imgMenu2.toggle();
            }, 500);
        } else {
            cont = 1;
            $(".listaMenu").toggle("blind", 500);
            imgMenu2.toggle("clip", 500);
            setTimeout(function () {
                imgMenu.toggle();
                imgLogo.toggle();
            }, 500);
        }
    });

});