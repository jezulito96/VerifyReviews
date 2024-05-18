<?php

    if(isset($lista_negocios)){
        foreach($lista_negocios as $i => $negocio){
            echo "categoria: " . $negocio -> getCodCategoria() ." <br>";
            echo "nombre Categoria: " . $negocio -> getNombreCategoria() ."<br><hr>";
        }
    }