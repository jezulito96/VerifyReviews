<?php
namespace App\Models;

use CodeIgniter\Model;


class BaseDatos extends Model{

    function getListaCategorias()    {

        $orden = "SELECT cod_categoria, tipo_negocio FROM categoria";
        $listaCategorias = $this->db->query($orden);


        return $listaCategorias->getResultArray();
    }


    function getListaNegocios()    {

        $orden = "SELECT * FROM categoria";
        $listaNegocios = $this->db->query($orden);


        return $listaNegocios->getResultArray();
    }

    function setNegocio($nombre, $email, $calle, $ciudad, $pais, $telefono_negocio, $fotos, $foto_principal, $coordenadas, $sitio_web, $cod_categoria, $nombre_titular, $telefono_titular, $activo, $confirma_correo) {
        $orden = "INSERT INTO negocio (nombre, email, calle, ciudad, pais, telefono_negocio, fotos, foto_principal, coordenadas, sitio_web, cod_categoria, nombre_titular, telefono_titular, activo, confirma_correo) VALUES (:nombre, :email, :calle, :ciudad, :pais, :telefono_negocio, :fotos, :foto_principal, :coordenadas, :sitio_web, :cod_categoria, :nombre_titular, :telefono_titular, :activo, :confirma_correo)";
    
        $this->db->query($orden, [
            'nombre' => $nombre,
            'email' => $email,
            'calle' => $calle,
            'ciudad' => $ciudad,
            'pais' => $pais,
            'telefono_negocio' => $telefono_negocio,
            'fotos' => $fotos,
            'foto_principal' => $foto_principal,
            'coordenadas' => $coordenadas,
            'sitio_web' => $sitio_web,
            'cod_categoria' => $cod_categoria,
            'nombre_titular' => $nombre_titular,
            'telefono_titular' => $telefono_titular,
            'activo' => $activo,
            'confirma_correo' => $confirma_correo
        ]);
    
    
}



//ejemplo con condicion
// $orden = "SELECT cod_categoria, tipo_negocio FROM categoria WHERE cod_categoria = :categoria:";
// $listaCategorias = $this -> db -> query($orden, [
//     'categoria' => 1
// ]);

?>