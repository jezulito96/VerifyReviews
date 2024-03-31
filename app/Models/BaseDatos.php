<?php
namespace App\Models;

use CodeIgniter\Model;


class BaseDatos extends Model
{

    function getListaCategorias()
    {

        $orden = "SELECT cod_categoria, tipo_negocio FROM categoria";
        $listaCategorias = $this->db->query($orden);


        return $listaCategorias->getResultArray();
    }


    function getListaNegocios()
    {

        $orden = "SELECT * FROM categoria";
        $listaNegocios = $this->db->query($orden);


        return $listaNegocios->getResultArray();
    }

    function setNegocio($nombre, $email, $calle, $ciudad, $pais, $telefono_negocio, $fotos, $foto_principal, $coordenadas, $sitio_web, $cod_categoria, $nombre_titular, $telefono_titular, $activo, $confirma_correo,$cod_confirmacion)
    {

        $orden = "INSERT INTO negocio (nombre, email, calle, ciudad, pais, telefono_negocio, fotos, foto_principal, coordenadas, sitio_web, cod_categoria, nombre_titular, telefono_titular, activo, confirma_correo,cod_confirmacion) VALUES ('" . $nombre . "', '" . $email . "', '" . $calle . "', '" . $ciudad . "', '" . $pais . "', '" . $telefono_negocio . "', '" . $fotos . "', '" . $foto_principal . "', '" . $coordenadas . "', '" . $sitio_web . "', " . $cod_categoria . ", '" . $nombre_titular . "', '" . $telefono_titular . "', " . $activo . ", " . $confirma_correo . ", " . $cod_confirmacion . ")";

        $this->db->query($orden);

    }
}



//ejemplo con condicion
// $orden = "SELECT cod_categoria, tipo_negocio FROM categoria WHERE cod_categoria = :categoria:";
// $listaCategorias = $this -> db -> query($orden, [
//     'categoria' => 1
// ]);

?>