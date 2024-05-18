<?php
    if(isset($negocio)){
        ?>
        <div class="containerTitulo" >
            <?php  
                echo $negocio -> getNombre(). "<i class='far fa-heart icono-corazon'></i>";
            ?>
        </div>
        
        <?php

        echo '<div class="fotosContainerNegocio">';

            // recojo las rutas de las fotos y las pinto 
            $foto_principal = $negocio -> getFotoPrincipal();
            echo '<div class="fotoContainer" style="margin-left:15px;">';
                echo '<a class="fotoContainer"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >';
                    echo '<img src="'. base_url(). $foto_principal .'" alt="'. $negocio -> getNombre() .'" title="'. $negocio -> getNombre() .'"/>';
                echo '</a>';
            echo '</div>';


            $rutasimgs = $negocio -> getFotosBD();
            $imagenes = explode(",", $rutasimgs);
            foreach($imagenes as $key => $valor){
            $rutaImagen = base_url().'/images/n/n_'.$negocio -> getCodNegocio().'/img_negocio/'.  $valor ;
            //    echo "<p color='red'>" .base_url(). $valor ."</p>";
                echo '<div class="fotoContainer" >';
                    echo '<a class="fotoContainer"  href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >';
                        echo '<img src="' . $rutaImagen . '" alt="'. $negocio -> getNombre() .'" title="'. $negocio -> getNombre() .'"/>';
                    echo '</a>';
                echo '</div>';
            }
            
        echo '</div>';
    } 
?>

    <div class="sliderInfoNegocio">

        <div class="containerIcono container_opiniones">
            <i class="fas fa-comment iconosColor"></i>
            <span id="opiniones">Opiniones</span>
        </div>
        <div class="containerIcono container_mapa">
            <i class="fas fa-map-marked-alt iconosColor"></i>
            <span id="mapa">Mapa</span>
        </div>
        <div class="containerIcono container_llamar">
            <i class="fas fa-phone iconosColor"></i>
            <span id="llamar">Llamar</span>
        </div>

        <div class="containerIcono container_email">
            <i class="fas fa-envelope iconosColor"></i>
            <span id="email">Email</span>
        </div>
        <div class="containerIcono container_redesSociales">
            <i class="fas fa-share-alt iconosColor"></i>
            <span id="redesSociales">Redes</span>
        </div>

    </div>

    <div class="infoContainerNegocio">

        <div id="content_opiniones">
            <h3>
                Opiniones
            </h3>    
            <div id="info_opiniones">
 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu erat ornare, maximus arcu sit amet, lacinia eros. Vivamus porta sem lectus, et vulputate lectus malesuada sit amet. Ut imperdiet condimentum ornare. Aenean id porttitor lorem. In lectus ipsum, porta id eros eget, congue tempus purus. Duis ut maximus lorem, ut semper sapien. Etiam dignissim bibendum tellus, consequat aliquam justo. Duis arcu felis, placerat vitae molestie eu, efficitur eget nisl. Mauris scelerisque nec enim sed elementum. Nam quis volutpat enim.

Aenean at quam malesuada ipsum viverra tristique. Phasellus erat lacus, imperdiet vitae libero eget, efficitur eleifend enim. Aenean et tristique metus. Maecenas id tortor eu risus pretium ornare. Integer eu ornare lacus, sed maximus odio. Integer id magna metus. Sed elementum, lorem nec gravida viverra, libero massa elementum sapien, vitae maximus risus ante ac sem. In a efficitur magna. Phasellus feugiat libero ipsum. Aliquam interdum sollicitudin fermentum. Praesent sit amet nunc turpis. Nulla cursus non est vel scelerisque. Suspendisse accumsan massa eu aliquam ornare. Nullam vel orci faucibus, volutpat leo eget, varius sem. In vitae sagittis lacus, non commodo mi. Quisque velit risus, tincidunt a porttitor ac, imperdiet vel dui. 
            </div>
        </div>

        <div id="content_mapa">
            <h3>
                Mapa
            </h3>   
            <div id="info_opiniones">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu erat ornare, maximus arcu sit amet, lacinia eros. Vivamus porta sem lectus, et vulputate lectus malesuada sit amet. Ut imperdiet condimentum ornare. Aenean id porttitor lorem. In lectus ipsum, porta id eros eget, congue tempus purus. Duis ut maximus lorem, ut semper sapien. Etiam dignissim bibendum tellus, consequat aliquam justo. Duis arcu felis, placerat vitae molestie eu, efficitur eget nisl. Mauris scelerisque nec enim sed elementum. Nam quis volutpat enim.

Aenean at quam malesuada ipsum viverra tristique. Phasellus erat lacus, imperdiet vitae libero eget, efficitur eleifend enim. Aenean et tristique metus. Maecenas id tortor eu risus pretium ornare. Integer eu ornare lacus, sed maximus odio. Integer id magna metus. Sed elementum, lorem nec gravida viverra, libero massa elementum sapien, vitae maximus risus ante ac sem. In a efficitur magna. Phasellus feugiat libero ipsum. Aliquam interdum sollicitudin fermentum. Praesent sit amet nunc turpis. Nulla cursus non est vel scelerisque. Suspendisse accumsan massa eu aliquam ornare. Nullam vel orci faucibus, volutpat leo eget, varius sem. In vitae sagittis lacus, non commodo mi. Quisque velit risus, tincidunt a porttitor ac, imperdiet vel dui. 
            </div> 
        </div>

        <div id="content_opiniones">
            <h3>
                Llamar
            </h3>    
            <div id="info_opiniones">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu erat ornare, maximus arcu sit amet, lacinia eros. Vivamus porta sem lectus, et vulputate lectus malesuada sit amet. Ut imperdiet condimentum ornare. Aenean id porttitor lorem. In lectus ipsum, porta id eros eget, congue tempus purus. Duis ut maximus lorem, ut semper sapien. Etiam dignissim bibendum tellus, consequat aliquam justo. Duis arcu felis, placerat vitae molestie eu, efficitur eget nisl. Mauris scelerisque nec enim sed elementum. Nam quis volutpat enim.

Aenean at quam malesuada ipsum viverra tristique. Phasellus erat lacus, imperdiet vitae libero eget, efficitur eleifend enim. Aenean et tristique metus. Maecenas id tortor eu risus pretium ornare. Integer eu ornare lacus, sed maximus odio. Integer id magna metus. Sed elementum, lorem nec gravida viverra, libero massa elementum sapien, vitae maximus risus ante ac sem. In a efficitur magna. Phasellus feugiat libero ipsum. Aliquam interdum sollicitudin fermentum. Praesent sit amet nunc turpis. Nulla cursus non est vel scelerisque. Suspendisse accumsan massa eu aliquam ornare. Nullam vel orci faucibus, volutpat leo eget, varius sem. In vitae sagittis lacus, non commodo mi. Quisque velit risus, tincidunt a porttitor ac, imperdiet vel dui. 
            </div>
        </div>

        <div id="content_email">
            <h3>
                Email
            </h3>   
            <div id="info">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu erat ornare, maximus arcu sit amet, lacinia eros. Vivamus porta sem lectus, et vulputate lectus malesuada sit amet. Ut imperdiet condimentum ornare. Aenean id porttitor lorem. In lectus ipsum, porta id eros eget, congue tempus purus. Duis ut maximus lorem, ut semper sapien. Etiam dignissim bibendum tellus, consequat aliquam justo. Duis arcu felis, placerat vitae molestie eu, efficitur eget nisl. Mauris scelerisque nec enim sed elementum. Nam quis volutpat enim.

Aenean at quam malesuada ipsum viverra tristique. Phasellus erat lacus, imperdiet vitae libero eget, efficitur eleifend enim. Aenean et tristique metus. Maecenas id tortor eu risus pretium ornare. Integer eu ornare lacus, sed maximus odio. Integer id magna metus. Sed elementum, lorem nec gravida viverra, libero massa elementum sapien, vitae maximus risus ante ac sem. In a efficitur magna. Phasellus feugiat libero ipsum. Aliquam interdum sollicitudin fermentum. Praesent sit amet nunc turpis. Nulla cursus non est vel scelerisque. Suspendisse accumsan massa eu aliquam ornare. Nullam vel orci faucibus, volutpat leo eget, varius sem. In vitae sagittis lacus, non commodo mi. Quisque velit risus, tincidunt a porttitor ac, imperdiet vel dui. 
            </div> 
        </div>

        <div id="content_redesSociales">
            <div id="Facebook">
                <h3>
                    Facebook
                </h3>    
                <div id="info">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu erat ornare, maximus arcu sit amet, lacinia eros. Vivamus porta sem lectus, et vulputate lectus malesuada sit amet. Ut imperdiet condimentum ornare. Aenean id porttitor lorem. In lectus ipsum, porta id eros eget, congue tempus purus. Duis ut maximus lorem, ut semper sapien. Etiam dignissim bibendum tellus, consequat aliquam justo. Duis arcu felis, placerat vitae molestie eu, efficitur eget nisl. Mauris scelerisque nec enim sed elementum. Nam quis volutpat enim.

Aenean at quam malesuada ipsum viverra tristique. Phasellus erat lacus, imperdiet vitae libero eget, efficitur eleifend enim. Aenean et tristique metus. Maecenas id tortor eu risus pretium ornare. Integer eu ornare lacus, sed maximus odio. Integer id magna metus. Sed elementum, lorem nec gravida viverra, libero massa elementum sapien, vitae maximus risus ante ac sem. In a efficitur magna. Phasellus feugiat libero ipsum. Aliquam interdum sollicitudin fermentum. Praesent sit amet nunc turpis. Nulla cursus non est vel scelerisque. Suspendisse accumsan massa eu aliquam ornare. Nullam vel orci faucibus, volutpat leo eget, varius sem. In vitae sagittis lacus, non commodo mi. Quisque velit risus, tincidunt a porttitor ac, imperdiet vel dui. 
                </div>
            </div>

            <div id="x">
                <h3>
                    X
                </h3>   
                <div id="info">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu erat ornare, maximus arcu sit amet, lacinia eros. Vivamus porta sem lectus, et vulputate lectus malesuada sit amet. Ut imperdiet condimentum ornare. Aenean id porttitor lorem. In lectus ipsum, porta id eros eget, congue tempus purus. Duis ut maximus lorem, ut semper sapien. Etiam dignissim bibendum tellus, consequat aliquam justo. Duis arcu felis, placerat vitae molestie eu, efficitur eget nisl. Mauris scelerisque nec enim sed elementum. Nam quis volutpat enim.

Aenean at quam malesuada ipsum viverra tristique. Phasellus erat lacus, imperdiet vitae libero eget, efficitur eleifend enim. Aenean et tristique metus. Maecenas id tortor eu risus pretium ornare. Integer eu ornare lacus, sed maximus odio. Integer id magna metus. Sed elementum, lorem nec gravida viverra, libero massa elementum sapien, vitae maximus risus ante ac sem. In a efficitur magna. Phasellus feugiat libero ipsum. Aliquam interdum sollicitudin fermentum. Praesent sit amet nunc turpis. Nulla cursus non est vel scelerisque. Suspendisse accumsan massa eu aliquam ornare. Nullam vel orci faucibus, volutpat leo eget, varius sem. In vitae sagittis lacus, non commodo mi. Quisque velit risus, tincidunt a porttitor ac, imperdiet vel dui. 
                </div> 
            </div>

            <div id="instagram">
                <h3>
                    Instagram
                </h3> 
                <div id="info">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu erat ornare, maximus arcu sit amet, lacinia eros. Vivamus porta sem lectus, et vulputate lectus malesuada sit amet. Ut imperdiet condimentum ornare. Aenean id porttitor lorem. In lectus ipsum, porta id eros eget, congue tempus purus. Duis ut maximus lorem, ut semper sapien. Etiam dignissim bibendum tellus, consequat aliquam justo. Duis arcu felis, placerat vitae molestie eu, efficitur eget nisl. Mauris scelerisque nec enim sed elementum. Nam quis volutpat enim.

Aenean at quam malesuada ipsum viverra tristique. Phasellus erat lacus, imperdiet vitae libero eget, efficitur eleifend enim. Aenean et tristique metus. Maecenas id tortor eu risus pretium ornare. Integer eu ornare lacus, sed maximus odio. Integer id magna metus. Sed elementum, lorem nec gravida viverra, libero massa elementum sapien, vitae maximus risus ante ac sem. In a efficitur magna. Phasellus feugiat libero ipsum. Aliquam interdum sollicitudin fermentum. Praesent sit amet nunc turpis. Nulla cursus non est vel scelerisque. Suspendisse accumsan massa eu aliquam ornare. Nullam vel orci faucibus, volutpat leo eget, varius sem. In vitae sagittis lacus, non commodo mi. Quisque velit risus, tincidunt a porttitor ac, imperdiet vel dui. 
                </div>   
            </div>
            
        </div>


    </div>

    <div class="flechaArriba">
        <i class="fas fa-arrow-up"></i>
    </div>

<script>
    $(document).ready(function(){
        $('.container_opiniones').click(function(){
            $('html, body').animate({
                scrollTop: $('#content_opiniones').offset().top
            }, 1000);
        });

        $('.container_mapa').click(function(){
            $('html, body').animate({
                scrollTop: $('#content_mapa').offset().top
            }, 1000);
        });

        $('.container_llamar').click(function(){
            $('html, body').animate({
                scrollTop: $('#content_llamar').offset().top
            }, 1000);
        });

        $('.container_email').click(function(){
            $('html, body').animate({
                scrollTop: $('#content_email').offset().top
            }, 1000);
        });

        $('.container_redesSociales').click(function(){
            $('html, body').animate({
                scrollTop: $('#content_redesSociales').offset().top
            }, 1000);
        });

        $('.flechaArriba').click(function() {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
            return false;
        });
        
        // $('.flechaArriba').hide();
        $(window).scroll(function() {
            var alturaTotal = $(document).height();
            var alturaPantalla = $(window).height();
            var scroll = $(window).scrollTop();

            // console.log("altura total" + alturaTotal);
            // console.log("altura pant" + alturaPantalla);
            // console.log("scrol" + scroll);

            if (scroll + 100 <= alturaPantalla) {
                $('.flechaArriba').hide();
            } else {
                $('.flechaArriba').show();
            }
        });
    });
</script>