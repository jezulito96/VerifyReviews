<?php
namespace App\Models;

use CodeIgniter\Model;
use Predis\Connection\Parameters;


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


    // devuelve false si no coincide con Usuario o Negocio
    //devuelve 1 si coincide con usuario 
    //devuelve 2 si coincide con negocio 
    function comprobarEmail($email){
        $orden = "SELECT email FROM negocio WHERE email='" . $email . "'";
        $consulta = $this -> db -> query($orden);
        $numeroFilas = $consulta -> getNumRows();

        if($numeroFilas > 0 ){
            // email coincide con negocio 
            return 2;
        }else{
            $orden = "SELECT email FROM usuario_registrado WHERE email='" . $email . "'";
            $consulta = $this -> db -> query($orden);
            $numeroFilas = $consulta -> getNumRows();

            if($numeroFilas > 0 ){
                // email coincide con usuario
                return 1;
            }else{
                // email no coincide ni con usuario ni con negocio
                return 0;
            }
        }
    }

    public function getHashContrasena($email, $tipo){
        if($tipo == 1) $tipo = "usuario_registrado";
        if($tipo == 2) $tipo = "negocio";

        $orden = "SELECT contrasena FROM " . $tipo . " WHERE email='" . $email . "' ";
        $hash = $this->db->query($orden);
        $has_contrasena = $hash->getRow(); 
        
        $contrasena = $has_contrasena->contrasena;

        return $contrasena;
    }

    public function getUsuario($emailUsuario){
        $orden = "SELECT * FROM negocio WHERE email=?";
        $parametros = [$emailUsuario];
        $consulta = $this -> db -> query($orden, $parametros);
        $numeroFilas = $consulta -> getNumRows();

        if($numeroFilas > 0 ){
            // email coincide con negocio 

            return $consulta -> getResultArray() ;
        }else{
            $orden = "SELECT email FROM usuario_registrado WHERE email='" . $emailUsuario . "'";
            $consulta = $this -> db -> query($orden);
            $numeroFilas = $consulta -> getNumRows();

            // email coincide con usuario
            return $consulta -> getResultArray();
        }
    }
}



//ejemplo con condicion
// $orden = "SELECT cod_categoria, tipo_negocio FROM categoria WHERE cod_categoria = :categoria:";
// $listaCategorias = $this -> db -> query($orden, [
//     'categoria' => 1
// ]);
