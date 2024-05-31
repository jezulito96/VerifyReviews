<?php

namespace App\Controllers;
use Exception;
use ZipArchive;
use App\Models\Qr;
use App\Models\Pdf;
use App\Models\Mapa;
use App\Models\Master;
use App\Models\Resena;
use App\Models\Negocio;
use App\Models\Usuario;
use App\Models\BaseDatos;
use App\Models\Categoria;
use App\Models\Emailmailer;
use chillerlan\QRCode\QRCode;
use App\Models\UsuarioRegistrado;
use App\Controllers\BaseController;
use App\Models\UsuarioSinRegistrar;
use chillerlan\QRCode\Output\QRImage;
use CodeIgniter\Images\Handlers\ImageMagickHandler;



class Home extends BaseController{


    // public function index(): string {

    //     $baseDatos = new BaseDatos();

    //     // $maleta['listaCategorias'] = $baseDatos -> getListaCategorias();

    //     $qr = new Qr();

    //     $clavePublica = "holaaaa";

    //     $maleta['qr'] = $qr -> crear("http://verifyReviews.es/verifyreviews/resena?clavePublica=" . $clavePublica);
        
    //     //vistas
    //     $maleta['head_content'] = view('head_content');
    //     $maleta['header_content'] = view('header_content');
    //     // echo view('head_content');
    //     return view('index', $maleta);
    // }
    
    public function index(): string {
        $master = Master::obtenerInstancia();
        $maleta_index['listaCategorias'] = $master -> getListaCategorias();
        $master -> getListaNegocios();
        $master -> getListaResenas();
        
        $maleta_index['top3_categorias'] = $master -> getEstadisticas();

        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content'); 
        // $maleta['filtros_busqueda'] = view('filtros_busqueda'); 
        $maleta['index_content'] = view('index_content', $maleta_index); 
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    public function resena(): string {

        // recojo la clave publica en hexadecimal
        $claveCifradaHex = $this->request->getGet('publicKey');

        // si no va con clave redirecciona a inicio
        if(!isset($claveCifradaHex) || empty($claveCifradaHex)) {
            header('location:https://www.verifyreviews.es');
        }elseif(session() ->get("sesionIniciada") == 2 || session() ->get("sesionIniciada") == "2"){
            header('location:https://www.verifyreviews.es');
        }

        // busco en DBla clave publica y el vector de inicializacion que correspone a la clave que he recogido
        $baseDatos = new BaseDatos();
        $clave_privada_hex = $baseDatos -> getClavePrivada($claveCifradaHex);
        $vector_inicializacion_hex = $baseDatos -> getVectorInicializacion($claveCifradaHex);

        // Convertir la clave cifrada de hexadecimal a binario
        $clavePublica = hex2bin($claveCifradaHex);
        $clave_privada = hex2bin($clave_privada_hex);
        $vector_inicializacion = hex2bin($vector_inicializacion_hex);

        if($clave_privada != false && $vector_inicializacion != false){
            
            $resultado_descifrado = openssl_decrypt($clavePublica, 'AES-256-CBC', $clave_privada, OPENSSL_RAW_DATA, $vector_inicializacion);

            if($resultado_descifrado == true){
                var_dump($resultado_descifrado);
                echo "<br><br>";
                $resultado_descifrado = $baseDatos -> comprobarEstado($claveCifradaHex);
                var_dump($resultado_descifrado);
            }

            if($resultado_descifrado == true){

                $cod_negocio = $this->request->getGet('id');
                $negocio = $baseDatos -> getNegocio($cod_negocio);
                session() -> set("datos_negocio", $negocio);

                // compruebo si el usuario tiene iniciada la sesion 
                if(session() -> get("sesion_iniciada") == true){
                    // si es true va directamente a resena_content para completar la reseña
                    $maleta_resenaContent['completar_formulario_resena'] = true;
                    $maleta_resenaContent['qr_key'] = $claveCifradaHex;
                }else{
                    // si es false va a resena_content para iniciar sesion o introducir Nickname
                    // pasa por login 
                    $maleta_resenaContent['inicio_sesion_container'] = true;
                    $maleta_resenaContent['qr_key'] = $claveCifradaHex;
                }

            }else{
                $maleta_resenaContent['error'] = "La reseña asociada a este codigo Qr ya se ha escrito";

            }
        }else{
            $maleta_resenaContent['error'] = "Se ha producido un error, por favor contacte con nosotros para solucionar el problema";
        }

        
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['resena_content'] = view('resena_content',$maleta_resenaContent);
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    public function setResena(){
        $master = Master::obtenerInstancia();

        if(!isset($_POST['qr_key'])){
            return redirect() -> to("https://verifyReviews.es");
        } 

        // recojo todos los datos
        $cod_negocio = $this -> request -> getPost("cod_negocio");
        $qr_key = $this -> request -> getPost("qr_key");
        $nickname = $this -> request -> getPost("nickname");
        $valoracion_final = $this -> request -> getPost("valoracionFinal");
        $txt_Titulo = $this -> request -> getPost("textoTitulo");
        $txt_descripccion = $this -> request -> getPost("textoTituloArea");
        $fecha_resena = $this -> request -> getPost("fechaResena");

        // echo "Código de Negocio: " . $cod_negocio . "<br>";
        // echo "QR Key: " . $qr_key . "<br>";
        // echo "Nickname: " . $nickname . "<br>";
        // echo "Valoración Final: " . $valoracion_final . "<br>";
        // echo "Título: " . $txt_Titulo . "<br>";
        // echo "Descripción: " . $txt_descripccion . "<br>";
        // echo "Fecha de Reseña: " . $fecha_resena . "<br>";

        // tengo que coger el nombre del negocio y el telefono_titular para buscar el directorio de carpetas
        // dentro de la carpeta del negocio crear la carpeta resenas si no esta creada 
        // dentro de la carpeta resena metes las fotos que recojo
        // $negocio = session() -> get("datos_negocio");
        // $negocio = $negocio [0];
        $directorioNegocio = "images/n/n_" . $cod_negocio . "/resenas";
        
        if(!is_dir($directorioNegocio)) {
            mkdir($directorioNegocio, 0777, true);
        }

        // campo fotos de la base de datos para guardar nombre del archivo y extension
        $fotosBD = "";

        // recojo el max cod de reseña
        $baseDatos = new BaseDatos();
        $cod_resena = $baseDatos -> getMaxResena();
        if($cod_resena == null || empty($cod_resena) || $cod_resena == false) {
            $cod_resena = 1;
        }else{
            $cod_resena = intval($cod_resena);
            $cod_resena += 1;
        }

        $maleta_resenaContent['cod_resena'] = $cod_resena;
        

        $directorioResena = "images/n/n_" . $cod_negocio . "/resenas/r_" . $cod_resena;
        if(!is_dir($directorioResena)) {
            mkdir($directorioResena, 0777, true);
        }
        
        
        
        // recibo las fotos y las guardo en la carpetas
        if (isset($_FILES['fotos_resena']) && !empty($_FILES['fotos_resena']['name'][0])) {
                $numFotos = count($_FILES['fotos_resena']['name']);

            for ($i = 0; $i < $numFotos; $i++) {
                //extraigo la extension del archivo
                $nombreAntiguo = $_FILES['fotos_resena']['name'][$i];
                $extension = pathinfo($nombreAntiguo, PATHINFO_EXTENSION);

                //recojo ubicacion temporal de la foto
                $tmpFoto = $_FILES['fotos_resena']['tmp_name'][$i]; 

                $destinoFotos =  $directorioResena . "/img" . ($i + 1) . "." . $extension;
                $nombre_foto_dir = "n_" . $cod_negocio . "/resenas/r_" . $cod_resena . "/img". ($i + 1) . "." . $extension;

                if($i == $numFotos -1){
                    $fotosBD .= $nombre_foto_dir;
                }else{
                    $fotosBD .= $nombre_foto_dir . ",";
                }
                        
                move_uploaded_file($tmpFoto, $destinoFotos);
                    
            }
        }

        // en tabla usu_si retocar el insert para meter el cod_max

        if(isset($_POST['usuario_sin_sesion'])){
            $id = $baseDatos ->getQr_id($qr_key);
            $baseDatos -> desactivarQr(intval($id));
            $max_cod = $baseDatos -> getMaxUsuario();
            
            //inserto reseña
            $baseDatos -> setResena_no_registrado($cod_resena,$cod_negocio,$max_cod,date("Y-m-d"),$fecha_resena,$valoracion_final,$txt_Titulo,$txt_descripccion,$fotosBD,$id,1, $nickname);

            //inserto cod y nickname en tabla usu no registrado
            $baseDatos -> setUsu_sin_registrar($max_cod, $nickname);

            $resultadoInsert = true;
            
        }else{
            $usuario = session() -> get("usuario_en_sesion");
            // se añade la reseña a base de datos a traves de master
            $resultadoInsert = $master -> setResena($cod_resena,$cod_negocio,$usuario['cod_usuario'],date("Y-m-d"),$fecha_resena,$valoracion_final,$txt_Titulo,$txt_descripccion,$fotosBD,$qr_key,1, $nickname);
        }

        
        if($resultadoInsert == true){
            $maleta_resenaContent['resena_enviada'] = true;
            $master -> setEstadisticas($cod_resena, $cod_negocio, $valoracion_final);
        }else{

            /////////// gestionar el error en resena_content
            echo "ha devuelto false";
            $maleta_resenaContent['resena_enviada'] = true;
        }
        



        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['resena_content'] = view('resena_content',$maleta_resenaContent);
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    public function nuevoNegocio(): string {
        $master = Master::obtenerInstancia();
        $nuevo_negocio['listaCategorias'] = $master->getListaCategorias();
        
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['nuevo_negocio'] = view('nuevo_negocio',$nuevo_negocio);
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    public function setNegocio() {
        $baseDatos = new BaseDatos();
        $nombre = $this->request->getPost('nombreNegocio');
        //comprobamos que el nombre del negocio ya existe
        $comprueba_negocio = $baseDatos -> comprobarNegocio($nombre);
        if($comprueba_negocio == true){
            $nuevo_negocio['error'] = "El nombre del negocio ya existe";
        
            //vistas
            $maleta['head_content'] = view('head_content');
            $maleta['header_content'] = view('header_content');
            $maleta['nuevo_negocio'] = view('nuevo_negocio',$nuevo_negocio);
            $maleta['vista_footer'] = view('vista_footer');
            return view('index', $maleta);
        }

        $contrasenaNegocio = $this->request->getPost('contrasenaNegocio');
        $email = $this->request->getPost('email');
        $calle = $this->request->getPost('calle');
        $ciudad = $this->request->getPost('ciudad');
        $pais = $this->request->getPost('pais');
        $telefono_negocio = intval(trim($this->request->getPost('telefonoNegocio')));
        $sitio_web = $this->request->getPost('sitio_web');
        $cod_categoria = $this->request->getPost('categoria');
        $nombre_titular = $this->request->getPost('nombreTitular');
        $telefono_titular = intval(trim($this->request->getPost('telefonoTitular')));
        echo "<br>" .$telefono_negocio . "<br>";
        echo "<br>" .$telefono_titular . "<br>";
        $activo = 1;
        $confirma_correo = 0;

        // recojo en una misma variable las coordenadas
        $latitud = $this->request->getPost('latitud');
        $longitud = $this->request->getPost('longitud');
        $coordenadas = $latitud . "," . $longitud;

        $cod_negocio = $baseDatos -> getMaxNegocio();
        if($cod_negocio == null || empty($cod_negocio) || $cod_negocio == false) {
            $cod_negocio = 1;
        }else{
            $cod_negocio = intval($cod_negocio);
            $cod_negocio += 1;
        }
        $directorioNegocio = FCPATH . "images/n/n_" . $cod_negocio;
        $nombreNegocio = "images/n_" . $cod_negocio . "/img_negocio";
        //compruebo si existe el nombre del negocio como carpeta en la carpeta de imagenes base()/images/nombreNegocio
        if(!is_dir($directorioNegocio)) {
            mkdir($directorioNegocio, 0777, true);

            // si existe se comprueba que esten las carpetas de negocio y de resenas
            //si no existen se crean 
            if(!is_dir($directorioNegocio . "/img_negocio")) mkdir($directorioNegocio . "/img_negocio/", 0777, true) ;
            if(!is_dir($directorioNegocio . "/resenas")) mkdir($directorioNegocio. "/resenas/", 0777, true) ;

        }
     

        // campo fotos de la base de datos para guardar nombre del archivo y extension
        $fotosBD = "";

        //recibo imagen principal
        $nombreAntiguoPrincipal = $_FILES['fotoPrincipal']['name'];
        $tmpFoto = $_FILES['fotoPrincipal']['tmp_name'];
        $extensionPrincipal = pathinfo($nombreAntiguoPrincipal, PATHINFO_EXTENSION);
        $foto_principal = "imgPrincipal." . $extensionPrincipal;
        move_uploaded_file($tmpFoto, $directorioNegocio . "/img_negocio/" . $foto_principal);

        // recibo imagenes
        if (isset($_FILES['fotos']) && !empty($_FILES['fotos']['name'][0])) {
            $numFotos = count($_FILES['fotos']['name']);

            for ($i = 0; $i < $numFotos; $i++) {
                //extraigo la extension del archivo
                $nombreAntiguo = $_FILES['fotos']['name'][$i];
                $extension = pathinfo($nombreAntiguo, PATHINFO_EXTENSION);

                //recojo ubicacion temporal de la foto
                $tmpFoto = $_FILES['fotos']['tmp_name'][$i]; 

                $nombre_foto = "img" . ($i + 1) . "." . $extension;
                $nombre_foto_dir = "img" . ($i + 1) . "." . $extension;

                if($i == $numFotos -1){
                    $fotosBD .= $nombre_foto;
                }else{
                    $fotosBD .= $nombre_foto . ",";
                }
                        
                move_uploaded_file($tmpFoto, $directorioNegocio . "/img_negocio/" . $nombre_foto_dir);
                   
            }
        }

        //enviar email de confirmacion
        $codigoConfirmacion = bin2hex(random_bytes(16));
        $email_confirmacion = new Emailmailer();
        $asunto = "VerifyReviews: Confirmación email";
        $mensaje = 'Bienvenido a Verify Reviews, estamos encantados de que ' . $nombre . ' sea parte de nuesta familia, por favor, haz clic en el siguiente enlace para confirmar tu correo electrónico:  https://verifyreviews.es/verifyreviews/confirmarEmail?codigoConfirmacion=' . $codigoConfirmacion . '&tipo=2';

        $email_confirmacion -> enviarCorreo($email, $asunto, $mensaje);



        // genero un codigo  para poder recordarle al usuario la contrasena si se olvida 
        $codigo_recordar_contrasena = bin2hex(random_bytes(16));


        //se encripta el hash de la contraseña para guardarla en base de datos 
        $hash_contrasena = password_hash($contrasenaNegocio, PASSWORD_DEFAULT);
        // luego se utilizara el siguiente manera: 
        /*
            - el usuario ingresa la contraseña 
            - se recoge la contraseña ($contrasena_recogida) y se utiliza el siguiente metodo 
            if (password_verify($contrasena_recogida, $hash_contrasena)) {
                // La contraseña es correcta
            } else {
                // La contraseña es incorrecta
            }
        */
        

        // añado el nuevo negocio a la base de datos
        // añado un nuevo objeto a la lista de negocios
        
        $baseDatos -> setNegocio($nombre,$hash_contrasena, $email, $calle, $ciudad, $pais, $telefono_negocio, $fotosBD, $foto_principal, $coordenadas, $sitio_web, $cod_categoria, $nombre_titular, $telefono_titular, $activo, $confirma_correo,$codigoConfirmacion,$codigo_recordar_contrasena);

        $cod_negocio = $baseDatos -> getMaxNegocio();
        // añado a la lista de negocios el nuevo objeto negocio
        $master = Master::obtenerInstancia();
        $master->setNegocio($cod_negocio, $nombre, $email, $calle, $ciudad, $pais, $telefono_negocio, $fotosBD, $foto_principal, $coordenadas, $sitio_web, $cod_categoria, $nombre_titular, $telefono_titular, $activo, $confirma_correo);

        $maleta_index['listaCategorias'] = $master->getListaCategorias();

        //si va todo bien vuelve al index
        $nuevo_negocio['form_correcto'] = "Enhorabuena, el registro ha sido correcto";
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['nuevo_negocio'] = view('nuevo_negocio',$nuevo_negocio);
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    public function confirmarEmail(){
        $codigoConfirmacion = "";
        if(isset($_GET['codigoConfirmacion']) && isset($_GET['tipo'])){
            $codigoConfirmacion = $_GET['codigoConfirmacion'];
            $tipo = $_GET['tipo'];
        }else{
            echo "no recibo codigo";
        }
        

        $baseDatos = new BaseDatos();
        if(!empty($codigoConfirmacion) && !empty($tipo)) {

            $confirmado =  $baseDatos -> comprobarCorreo($codigoConfirmacion,$tipo);

            if($confirmado){
                echo "el correo ha sido confirmado correctamente";
                $baseDatos -> confirmarCorreo($codigoConfirmacion,$tipo);

            }else{
                echo "el codigo de confirmacion no es correcto";
            }

        }else{
            echo "codigo confirmacion vacio";
        }
        

        $master = Master::obtenerInstancia();
        $maleta_index['listaCategorias'] = $master->getListaCategorias();
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['index_content'] = view('index_content', $maleta_index); 
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    public function nuevoUsuario(): string {
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['nuevo_usuario'] = view('nuevo_usuario');
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    public function setUsuario(){
        $baseDatos = new BaseDatos();
        $nombre = $this->request->getPost('nombre');
        $apellidos = $this->request->getPost('apellidos');
        $nickname = $this->request->getPost('nickname');
        $contrasena = $this->request->getPost('contrasenaUsuario');
        $ciudad = $this->request->getPost('ciudad');
        $pais = $this->request->getPost('pais');
        $fecha_nacimiento = $this->request->getPost('fechaNacimiento');
        $email = $this->request->getPost('email');
        $telefono = intval(trim($this->request->getPost('telefono')));

        $activo = 1;
        $confirma_correo = 0;

        $entra_error = false;
        $comprobando_usuario = $baseDatos -> comprobarUsuario($nickname);
        if($comprobando_usuario == true){
            $maleta_nuevo_usuario['error'] = "El nicknmame ya existe";
            $entra_error = true;
        }

        $comprobando_correo_usuario = $baseDatos -> comprobarcorreoUsuario($email);
        if($comprobando_correo_usuario == true){
            $maleta_nuevo_usuario['error'] = "El correo ya existe";
            $entra_error = true;
        }

        if($entra_error){
            //vistas
            $maleta_nuevo_usuario['formulario_correcto'] = "Registro completado";
            $maleta['head_content'] = view('head_content');
            $maleta['header_content'] = view('header_content');
            $maleta['nuevo_usuario'] = view('nuevo_usuario',$maleta_nuevo_usuario);
            $maleta['vista_footer'] = view('vista_footer');
            return view('index', $maleta);
        }

        // recojo en una misma variable las coordenadas
        $latitud = $this->request->getPost('latitud');
        $longitud = $this->request->getPost('longitud');
        $coordenadas = $latitud . "," . $longitud;

        $directorioUsuarios = FCPATH . "images/usuarios";
        //compruebo si existe la carpeta de usuarios en public/images y si no la creo 
        if(!is_dir($directorioUsuarios)) mkdir($directorioUsuarios, 0777, true);
     
        //recibo imagen de perfil de usuario y guardo el nombre en BD
        $nombreAntiguaPerfil = $_FILES['fotoPerfil']['name'];
        //si recibo imagen la recojo, sino le pongo la de por defecto
        if(empty($nombreAntiguaPerfil)){
            $foto_perfil = "default_user.png";
        }else{
            $tmpFoto = $_FILES['fotoPerfil']['tmp_name'];
            $extensionPerfil = pathinfo($nombreAntiguaPerfil, PATHINFO_EXTENSION);
            $foto_perfil = $nickname ."." . $extensionPerfil;
            move_uploaded_file($tmpFoto, $directorioUsuarios . "/"  . $foto_perfil);
        }

        //enviar email de confirmacion
        $codigoConfirmacion = bin2hex(random_bytes(16));
        $email_confirmacion = new Emailmailer();
        $asunto = "VerifyReviews: Confirmación email";
        $mensaje = '¡Hola! '. $nickname . 'por favor, haz clic en el siguiente enlace para confirmar tu correo electrónico:  https://verifyreviews.es/verifyreviews/confirmarEmail?codigoConfirmacion=' . $codigoConfirmacion . '&tipo=1';

        if($email_confirmacion -> enviarCorreo($email, $asunto, $mensaje));

        // genero un codigo  para poder recordarle al usuario la contrasena si se olvida 
        $codigo_recordar_contrasena = bin2hex(random_bytes(16));

        //se encripta el hash de la contraseña para guardarla en base de datos 
        $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        // luego se utilizara el siguiente manera: 
        /*
            - el usuario ingresa la contraseña 
            - se recoge la contraseña ($contrasena_recogida) y se utiliza el siguiente metodo 
            if (password_verify($contrasena_recogida, $hash_contrasena)) {
                // La contraseña es correcta
            } else {
                // La contraseña es incorrecta
            }
        */

        // añado el nuevo negocio a la base de datos
        // añado un nuevo objeto a la lista de negocios
        
        $max_cod = $baseDatos -> getMaxUsuario();
        $baseDatos -> setUsuario($max_cod,$nombre, $apellidos, $nickname, $foto_perfil, $hash_contrasena, $ciudad, $pais, $coordenadas, $fecha_nacimiento, $email, $telefono, $activo, $confirma_correo,$codigoConfirmacion,$codigo_recordar_contrasena);

        
        //vistas
        $maleta_nuevo_usuario['formulario_correcto'] = "Registro completado";
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['nuevo_usuario'] = view('nuevo_usuario',$maleta_nuevo_usuario);
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }


    public function vistaLogin(){
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['login'] = view('login');
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    public function setLogin(){
        // veo si $es_sesion_resena es true
        // esto quiere decir que el usuario escaneo un QR para poner una resena
        $es_sesion_resena = false;
        if(isset($_POST['es_sesion_resena'])){
            if(!isset($_POST['qr_key'])){
                // si no se recibe clave redirecciona a index
                return redirect() -> to("https://verifyReviews.es");
            }

            if($_POST['es_sesion_resena'] == "sesion"){
                echo "es_sesion_resena = true<br>";
                $maleta_resenaContent['completar_formulario_resena'] = true;
                $es_sesion_resena = true;

            }elseif($_POST['es_sesion_resena'] == "nickname"){
                $es_sesion_resena = true;
                $maleta_resenaContent['usuario_sin_sesion'] = true;
                $maleta_resenaContent['qr_key'] = $this->request->getPost('qr_key');
                $maleta_resenaContent['nickname'] = $this->request->getPost('nickname');
                $maleta_resenaContent['completar_formulario_resena'] = true;
                //vistas
                $maleta['head_content'] = view('head_content');
                $maleta['header_content'] = view('header_content');
                $maleta['resena_content'] = view('resena_content',$maleta_resenaContent);
                $maleta['vista_footer'] = view('vista_footer');
                return view('index', $maleta);
                // $maleta_resenaContent['qr_key'] = $this->request->getPost('qr_key');
                // $maleta_resenaContent['completar_formulario_resena'] = true;
                // //vistas
                // $maleta['head_content'] = view('head_content');
                // $maleta['header_content'] = view('header_content');
                // $maleta['resena_content'] = view('resena_content',$maleta_resenaContent);
                // return view('index', $maleta);
            }
        }

        $baseDatos = new BaseDatos();
        // verifico si el email o usuario/nickname introducido coinciden con un usuario registrado
        $emailUsuario = $this->request->getPost('email');
        $contrasenaUsuario = $this->request->getPost('contrasena');


        $resultadoEmail = false;
        $sesion_iniciada = false;
      
        $resultadoEmail = $baseDatos -> comprobarEmail($emailUsuario);
        
        if($resultadoEmail == 1 || $resultadoEmail == 2 ){
            // el email coincide 
            $hash_constrasena = $baseDatos -> getHashContrasena($emailUsuario,$resultadoEmail);
            if (password_verify($contrasenaUsuario, $hash_constrasena)) {
     
                // La contraseña es correcta
                $maleta_login['todoCorrecto'] = "Sesión iniciada";
                $sesion_iniciada = true;
                echo "todo correcto<br>";

            } else {
                // La contraseña es incorrecta
                // se devulve a la vista login con un error
                $maleta_login['errorEmail'] = "Email y/o contraseña incorrectos";
                $maleta_resenaContent['errorEmail'] = "Email y/o contraseña incorrectos";
                $maleta_resenaContent['completar_formulario_resena'] = false;
            }
        }else{
            // el email es incorrecto 
            // se devulve a la vista login con un error
            $maleta_login['errorEmail'] = "Email y/o contraseña incorrectos";
            $maleta_resenaContent['errorEmail'] = "Email y/o contraseña incorrectos";
            $maleta_resenaContent['completar_formulario_resena'] = false;
        }

        // va a resena_content
        if($es_sesion_resena == true){

            // meter en sesion el objeto del usuario para tener los datos a mano
           session() -> set("sesionIniciada", $resultadoEmail);
           
           //meto el objeto del usuario en sesion 
           $usuario_en_sesion = $baseDatos -> getUsuario($emailUsuario);
           session() -> set("usuario_en_sesion",$usuario_en_sesion[0]);
           session() -> set("sesion_iniciada",true);

            $maleta_resenaContent['qr_key'] = $this->request->getPost('qr_key');
       
            //vistas
            $maleta['head_content'] = view('head_content');
            $maleta['header_content'] = view('header_content');
            $maleta['resena_content'] = view('resena_content',$maleta_resenaContent);
            $maleta['vista_footer'] = view('vista_footer');
            return view('index', $maleta);
        }

        // formulario de resena_content
        if($sesion_iniciada == true ){
            // meter en sesion el objeto del usuario para tener los datos a mano
           session() -> set("sesionIniciada", $resultadoEmail);
           
           //meto el objeto del usuario en sesion 
           $usuario_en_sesion = $baseDatos -> getUsuario($emailUsuario);
           session() -> set("usuario_en_sesion",$usuario_en_sesion[0]);
           session() -> set("sesion_iniciada",true);
        }

        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['login'] = view('login',$maleta_login);
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    function cerrarSesion(){
        session() -> destroy();
        return redirect() -> to('https://www.verifyreviews.es');
    }

    public function vistaGenerarResenas(){  
        
        // vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['generarResenas'] = view('generarResenas');
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    public function setGenerarResenas(){

        $color = $this -> request -> getPost('estiloQr');
        $accion = $this -> request -> getPost('accionQr');
        $accion = intval($accion);
        $email = $this -> request -> getPost('emailQr');
        $numero = intval($this -> request -> getPost('numeroQr'));
        
        $maleta_generarResenas['resultadoEmail'] = false;
        $maleta_generarResenas['imagenQr'] = false;

        $usuario_en_sesion = session() -> get("usuario_en_sesion");
        // var_dump($usuario_en_sesion);


        if($accion == 1){
            $qr = new Qr($usuario_en_sesion['cod_negocio']);
            $qr -> setColor($color);
            $maleta_generarResenas['imagenQr'] = $qr -> crear($accion);

        }elseif($accion == 2){
            // se genera el qr
            $qr = new Qr($usuario_en_sesion['cod_negocio']);
            $qr -> setColor($color);
            $imagen_qr = $qr -> crear($accion);
            
            // se guarda el qr
            $imagen_base64 = substr($imagen_qr, strpos($imagen_qr, ',') + 1);
            $image_png = base64_decode($imagen_base64);
            $ruta_png = FCPATH . "otros/codigo_Qr.png";
            //guardar en public / otros/codigo_Qr.svg la imagen svg 
            if ($archivo = fopen($ruta_png, 'w')) {
                fwrite($archivo, $image_png);
                fclose($archivo);
                echo "se ha guardado  ";
            } else {
                echo " error al guardar la imagen SVG.";
            }
            
            // cambio de svg a 
            // $imagen = new \Imagick();
            // $imagen -> readImageBlob($imagen_qr);
            // $imagen->setImageResolution(600,600);
            // $imagen->resizeImage(200, 200, \Imagick::ALIGN_UNDEFINED, 1);
            // $imagen->setImageFormat('png');
            // $imagen->writeImage($ruta_png);
            // $imagen->clear();
            // $imagen->destroy(); 

            // se genera el email con el qr
            $mail = new Emailmailer();
            $resultado_email = $mail -> enviarImagen($email,$ruta_png);

            if($resultado_email){
                $maleta_generarResenas['resultadoEmail'] = "Email enviado correctamente";
            }
        }elseif($accion == 3){
            // se genera el qr
            $qr = new Qr($usuario_en_sesion['cod_negocio']);
            $imagen_qr = $qr -> crear(2);
            $imagen_base64 = substr($imagen_qr, strpos($imagen_qr, ',') + 1);

            // leo la imagen logoComida para pasarla a base 64
            $ruta_imagen = FCPATH . "otros/negocioComida.png";
            $archivo = fopen($ruta_imagen, 'r');
            $imagen_contenido = '';
            while (!feof($archivo)) {
                $imagen_contenido .= fread($archivo, 8192);
            }
            fclose($archivo);
            $imagen_logo_base64 = base64_encode($imagen_contenido);


            // se genera el pdf 
            $pdfGenerator = new Pdf();
            $pdfGenerator->crearPdf($imagen_base64, $imagen_logo_base64, 'PDF_Qr.pdf');

        }elseif($accion == 4) {
            $array_imagenes = array();

             for($i = 0; $i < $numero; $i++){
                // se genera el qr
                $qr = new Qr($usuario_en_sesion['cod_negocio']);
                $qr -> setColor($color);
                $imagen_qr = $qr -> crear(1);

                $imagen_base64 = base64_encode($imagen_qr);
                array_push($array_imagenes, $imagen_base64);
             }
             
            $nombre_zip = 'imagenes_QR.zip';

            $ubicacion_temporal = FCPATH . "otros/"; 

            $zip = new ZipArchive();
            if ($zip->open($ubicacion_temporal . '/' . $nombre_zip, ZipArchive::CREATE) === TRUE) {
                foreach ($array_imagenes as $index => $imagen_base64) {
                    $zip->addFromString("imagen_$index.svg", base64_decode($imagen_base64));
                }

                $zip->close();

                header('Content-Type: application/zip');
                header('Content-Disposition: attachment; filename="' . $nombre_zip . '"');
                readfile($ubicacion_temporal . '/' . $nombre_zip);

                unlink($ubicacion_temporal . '/' . $nombre_zip);
            } else {
                // Mensaje de error si no se puede crear el archivo ZIP
                echo "No se pudo crear el archivo ZIP.";
            }

        }

        // vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['generarResenas'] = view('generarResenas', $maleta_generarResenas);
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }


    public function vista_cat_negocio(){
        $master = master::obtenerInstancia();

        if(isset($_GET['id'])){
            $categoria = $_GET['id'];
           
            $maleta_cont_categorias['lista_negocios'] = $master -> negocios_categoria(intval($categoria));
            
        }else{
            echo "algo ha salido mal";
        }

        // vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['cont_categoria'] = view('cont_categoria', $maleta_cont_categorias);
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);

    }


    public function vista_info_negocio(){
        $master = master::obtenerInstancia();

        if(isset($_GET['id'])){
            $id_negocio= $_GET['id'];
           
            $maleta_info_negocio['negocio'] = $master -> getNegocio(intval($id_negocio));
            $maleta_info_negocio['lista_resenas'] = $master -> getListaResenas(intval($id_negocio));
            
        }else{
            echo "algo ha salido mal";
        }



        // vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['info_negocio'] = view('info_negocio', $maleta_info_negocio);
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    public function misResenas(){
        $master = master::obtenerInstancia();
        $usuario = session() -> get("usuario_en_sesion");

        $lista_resenas = $master -> getListaResenas(false, $usuario['cod_usuario']);

        if(sizeof($lista_resenas) > 0){
            $maleta_mis_resenas['lista_resenas'] = $lista_resenas;
        }else{
            $maleta_mis_resenas['error'] = "Aún no has escrito ninguna reseña, solo necesitas el codigo Qr que te ofrecen nuestros establecimientos. ¡Animate!";
        }

        // vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['mis_resenas_usuario'] = view('mis_resenas_usuario', $maleta_mis_resenas);
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    public function miNegocio(){
        $master = master::obtenerInstancia();
        $usuario = session() -> get("usuario_en_sesion");

        // estadisticas del negocio
        $maleta_mi_negocio['estadisticas'] = $master -> getEstadisticas($usuario['cod_negocio'],$usuario['cod_categoria']);
        

        $lista_resenas = $master -> getListaResenas( $usuario['cod_negocio'],false);

        if(sizeof($lista_resenas) > 0){
            $maleta_mi_negocio['lista_resenas'] = $lista_resenas;
        }else{
            $maleta_mi_negocio['error'] = "Aún no te han escrito ninguna reseña, genera codigos Qr y dáselos a tus clientes al ofrecerle tus servicios";
        }

        // vistas
        helper('mis_helpers');
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['mi_negocio'] = view('mi_negocio', $maleta_mi_negocio);
        $maleta['vista_footer'] = view('vista_footer');
        return view('index', $maleta);
    }

    public function filtro(){
        $master = master::obtenerInstancia();
        $filtrar = array();
        $se_filtra = false;

        if(isset($_POST['filtros']) ){
            $filtros = json_decode($_POST['filtros']);
            if(sizeof($filtros) > 0){
                $filtrar = $filtros;
                $se_filtra = true;
            }
            
        }else{
            $filtrar = false;
        }

        if(isset($_POST['texto']) && $_POST['texto'] != "false"){
            $se_filtra = true;
            $texto =  $this -> request -> getPost('texto');
        }else{
            $texto = false;
        }

        if($se_filtra){

            $resultado_busqueda = $master -> filtrar($texto,$filtrar);
            
            if($resultado_busqueda == false){
                $maleta_filtros['error'] = "No se han encontrado resultados de la búsqueda" ;
            }else{
                $maleta_filtros['resultado_busqueda'] = $resultado_busqueda;
            }
        }else{
            $maleta_filtros['error'] = "No se han encontrado resultados de la búsqueda" ;
        }


        return view('filtros_busqueda', $maleta_filtros);
    }
}
