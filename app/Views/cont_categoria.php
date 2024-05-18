<?php

    if(isset($lista_negocios)){
        foreach($lista_negocios as $i => $negocio){
            echo "categoria: " . $negocio -> getCodCategoria() ." <br>";
            echo "nombre Categoria: " . $negocio -> getNombreCategoria() ."<br>";
            echo "nombre negocio: " . $negocio -> getNombre()."<br><hr>";
            echo '<a href="https://verifyreviews.es/verifyreviews/negocio?id='. $negocio -> getCodNegocio() . '" >Info negocio</a>';
        }
    }