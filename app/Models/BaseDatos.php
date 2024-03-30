<?php
    namespace App\Models;
    use CodeIgniter\Model;


    class BaseDatos extends Model{

        function getListaCategorias(){

            $orden = "SELECT cod_categoria, tipo_negocio FROM categoria";
            $listaCategorias = $this -> db -> query($orden);
          

            return $listaCategorias -> getResultArray();  
        }


        function getListaNegocios(){

            $orden = "SELECT * FROM categoria";
            $listaNegocios = $this -> db -> query($orden);
          

            return $listaNegocios -> getResultArray();  
        }
    }



    //ejemplo con condicion
    // $orden = "SELECT cod_categoria, tipo_negocio FROM categoria WHERE cod_categoria = :categoria:";
    // $listaCategorias = $this -> db -> query($orden, [
    //     'categoria' => 1
    // ]);

?>
