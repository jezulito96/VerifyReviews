<?php
    namespace App\Models;
    use CodeIgniter\Model;


    class BaseDatos extends Model{

        function getListaCategorias(){

            $orden = "SELECT cod_categoria, tipo_negocio FROM categoria WHERE cod_categoria = :categoria:";

            $listaCategorias = $this -> db -> query($orden, [
                // 'categoria' => 1
            ]);

            return $listaCategorias -> getResultArray();  
        }
    }

    

?>
