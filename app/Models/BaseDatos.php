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

    function setNegocio($nombre,$contrasena_negocio, $email, $calle, $ciudad, $pais, $telefono_negocio, $fotos, $foto_principal, $coordenadas, $sitio_web, $cod_categoria, $nombre_titular, $telefono_titular, $activo, $confirma_correo, $cod_confirmacion,$codigo_recordar_contrasena)
    {
        $orden = "INSERT INTO negocio (nombre, contrasena,  email, calle, ciudad, pais, telefono_negocio, fotos, foto_principal, coordenadas, sitio_web, cod_categoria, nombre_titular, telefono_titular, activo, confirma_correo, cod_confirmacion, cod_recordar_contrasena, fecha_creacion) VALUES ('" . $nombre .  "', '"  . $contrasena_negocio . "', '"  . $email . "', '" . $calle . "', '" . $ciudad . "', '" . $pais . "', '" . $telefono_negocio . "', '" . $fotos . "', '" . $foto_principal . "', '" . $coordenadas . "', '" . $sitio_web . "', " . $cod_categoria . ", '" . $nombre_titular . "', '" . $telefono_titular . "', '" . $activo . "', '" . $confirma_correo . "', '" . $cod_confirmacion . "','" . $codigo_recordar_contrasena . "', NOW())";


        $this->db->query($orden);

    }

    function comprobarCorreo($codigoConfirmacion,$tipo) {
        if($tipo == 1 || $tipo == "1"){
            $orden = "SELECT cod_confirmacion FROM usuario_registrado WHERE cod_confirmacion ='".  $codigoConfirmacion  ."'";
            $consulta = $this -> db -> query($orden);
            $numeroFilas = $consulta -> getNumRows();
    
            if($numeroFilas > 0 ){
                return true;
            }else{
                return false;
            }
        }else if($tipo == 2 || $tipo == "2"){
            $orden = "SELECT cod_confirmacion FROM negocio WHERE cod_confirmacion ='".  $codigoConfirmacion  ."'";
            $consulta = $this -> db -> query($orden);
            $numeroFilas = $consulta -> getNumRows();
    
            if($numeroFilas > 0 ){
                return true;
            }else{
                return false;
            }
        }else{
            // si no coincide el tipo
            return false;
        }
    }

    function confirmarCorreo($codigoConfirmacion,$tipo){
        if($tipo == 1 || $tipo == "1"){
            $orden = "UPDATE usuario SET confirma_correo = 1 WHERE cod_confirmacion ='".  $codigoConfirmacion  ."'";
            $this -> db -> query($orden);
        }else if($tipo == 2 || $tipo == "2"){
            $orden = "UPDATE negocio SET confirma_correo = 1 WHERE cod_confirmacion ='".  $codigoConfirmacion  ."'";
            $this -> db -> query($orden);
        }else{
            // si no coincide el tipo
            return false;
        }
    }

    function setUsuario($nombre, $apellidos, $nickname, $foto_perfil, $hash_contrasena, $ciudad, $pais, $coordenadas, $fecha_nacimiento, $email, $telefono, $activo, $confirma_correo,$codigoConfirmacion,$codigo_recordar_contrasena){
        $orden = "INSERT INTO usuario_registrado (nombre, apellidos, nickname, foto_perfil, contrasena, ciudad, pais, coordenadas, fecha_nacimiento, email, telefono, activo, confirma_correo, cod_confirmacion, cod_recordar_contrasena, fecha_creacion) VALUES ('$nombre', '$apellidos', '$nickname', '$foto_perfil', '$hash_contrasena', '$ciudad', '$pais', '$coordenadas', '$fecha_nacimiento', '$email', '$telefono', '$activo', '$confirma_correo', '$codigoConfirmacion', '$codigo_recordar_contrasena', NOW())";


        $this -> db -> query($orden);
    }

}



//ejemplo con condicion
// $orden = "SELECT cod_categoria, tipo_negocio FROM categoria WHERE cod_categoria = :categoria:";
// $listaCategorias = $this -> db -> query($orden, [
//     'categoria' => 1
// ]);

?>