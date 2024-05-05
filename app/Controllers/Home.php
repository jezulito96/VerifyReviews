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
        
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content'); 
        $maleta['index_content'] = view('index_content', $maleta_index); 
        return view('index', $maleta);
    }

    public function resena(): string {
        // recojo la clave publica en hexadecimal
        $claveCifradaHex = $this->request->getGet('publicKey');
        // Convertir la clave cifrada de hexadecimal a binario
        $clavePublica = hex2bin($claveCifradaHex);

        // busco en DBla clave publica y el vector de inicializacion que correspone a la clave que he recogido
        $baseDatos = new BaseDatos();
        $clave_privada = $baseDatos -> getClavePrivada($claveCifradaHex);
        $vector_inicializacion = $baseDatos -> getVectorInicializacion($claveCifradaHex);

        if($clave_privada != false && $vector_inicializacion != false){
            
            $resultado_descifrado = openssl_decrypt($clavePublica, 'AES-256-CBC', $clave_privada, OPENSSL_RAW_DATA, $vector_inicializacion);

            if($resultado_descifrado){
                $maleta_resenaContent['error'] = "La reseña asociada a este codigo Qr ya se ha escrito";
            }
        }else{
            $maleta_resenaContent['error'] = "Se ha producido un error, por favor contacte con nosotros para solucionar el problema";
        }



        
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        if(isset($maleta_resenaContent)){
            $maleta['resena_content'] = view('resena_content',$maleta_resenaContent);
        }else{
            $maleta['resena_content'] = view('resena_content');
        }
        
        return view('index', $maleta);
    }

    public function nuevoNegocio(): string {
        $master = Master::obtenerInstancia();
        $nuevo_negocio['listaCategorias'] = $master->getListaCategorias();


        
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['nuevo_negocio'] = view('nuevo_negocio',$nuevo_negocio);
        return view('index', $maleta);
    }

    public function setNegocio(): string {
        $nombre = $this->request->getPost('nombreNegocio');
        $contrasenaNegocio = $this->request->getPost('contrasenaNegocio');
        $email = $this->request->getPost('email');
        $calle = $this->request->getPost('calle');
        $ciudad = $this->request->getPost('ciudad');
        $pais = $this->request->getPost('pais');
        $telefono_negocio = $this->request->getPost('telefonoNegocio');
        $sitio_web = $this->request->getPost('sitio_web');
        $cod_categoria = $this->request->getPost('categoria');
        $nombre_titular = $this->request->getPost('nombreTitular');
        $telefono_titular = $this->request->getPost('telefonoTitular');
        $activo = 1;
        $confirma_correo = 0;

        // recojo en una misma variable las coordenadas
        $latitud = $this->request->getPost('latitud');
        $longitud = $this->request->getPost('longitud');
        $coordenadas = $latitud . "," . $longitud;


        $directorioNegocio = FCPATH . "images/" . strtolower($nombre);
        //compruebo si existe el nombre del negocio como carpeta en la carpeta de imagenes base()/images/nombreNegocio
        if(!is_dir($directorioNegocio)) {
            mkdir($directorioNegocio, 0777, true);

            // si existe se comprueba que esten las carpetas de negocio y de resenas
            //si no existen se crean 
            if(!is_dir($directorioNegocio . "/negocio")) mkdir($directorioNegocio . "/negocio/", 0777, true) ;
            if(!is_dir($directorioNegocio . "/resenas")) mkdir($directorioNegocio. "/resenas/", 0777, true) ;

        }
     

        // campo fotos de la base de datos para guardar nombre del archivo y extension
        $fotosBD = "";

        //recibo imagen principal
        $nombreAntiguoPrincipal = $_FILES['fotoPrincipal']['name'];
        $tmpFoto = $_FILES['fotoPrincipal']['tmp_name'];
        $extensionPrincipal = pathinfo($nombreAntiguoPrincipal, PATHINFO_EXTENSION);
        $foto_principal = "imgPrincipal." . $extensionPrincipal;
        move_uploaded_file($tmpFoto, $directorioNegocio . "/negocio/" . $foto_principal);

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

                if($i == $numFotos -1){
                    $fotosBD .= $nombre_foto;
                }else{
                    $fotosBD .= $nombre_foto . ",";
                }
                        
                move_uploaded_file($tmpFoto, $directorioNegocio . "/negocio/" . $nombre_foto);
                   
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
        $baseDatos = new BaseDatos();
        $baseDatos -> setNegocio($nombre,$hash_contrasena, $email, $calle, $ciudad, $pais, $telefono_negocio, $fotosBD, $foto_principal, $coordenadas, $sitio_web, $cod_categoria, $nombre_titular, $telefono_titular, $activo, $confirma_correo,$codigoConfirmacion,$codigo_recordar_contrasena);

        
        // añado a la lista de negocios el nuevo objeto negocio
        $master = Master::obtenerInstancia();
        $master->setNegocio($nombre, $email, $calle, $ciudad, $pais, $telefono_negocio, $fotosBD, $foto_principal, $coordenadas, $sitio_web, $cod_categoria, $nombre_titular, $telefono_titular, $activo, $confirma_correo);

        $maleta_index['listaCategorias'] = $master->getListaCategorias();

        //si va todo bien vuelve al index
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['index_content'] = view('index_content', $maleta_index); 
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
        return view('index', $maleta);
    }

    public function nuevoUsuario(): string {
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['nuevo_usuario'] = view('nuevo_usuario');
        return view('index', $maleta);
    }

    public function setUsuario(){
        $nombre = $this->request->getPost('nombre');
        $apellidos = $this->request->getPost('apellidos');
        $nickname = $this->request->getPost('nickname');
        $contrasena = $this->request->getPost('contrasenaUsuario');
        $ciudad = $this->request->getPost('ciudad');
        $pais = $this->request->getPost('pais');
        $fecha_nacimiento = $this->request->getPost('fechaNacimiento');
        $email = $this->request->getPost('email');
        $telefono = $this->request->getPost('telefono');

        $activo = 1;
        $confirma_correo = 0;

        // recojo en una misma variable las coordenadas
        $latitud = $this->request->getPost('latitud');
        $longitud = $this->request->getPost('longitud');
        $coordenadas = $latitud . "," . $longitud;


        $directorioUsuarios = FCPATH . "images/usuarios";
        //compruebo si existe la carpeta de usuarios en public/images y si no la creo 
        if(!is_dir($directorioUsuarios)) mkdir($directorioUsuarios, 0777, true);
     

        //recibo imagen de perfil de usuario y guardo el nombre en BD
        $nombreAntiguaPerfil = $_FILES['fotoPerfil']['name'];
        $tmpFoto = $_FILES['fotoPerfil']['tmp_name'];
        $extensionPerfil = pathinfo($nombreAntiguaPerfil, PATHINFO_EXTENSION);
        $foto_perfil = $nickname ."." . $extensionPerfil;
        move_uploaded_file($tmpFoto, $directorioUsuarios . "/"  . $foto_perfil);

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
        $baseDatos = new BaseDatos();
        $baseDatos -> setUsuario($nombre, $apellidos, $nickname, $foto_perfil, $hash_contrasena, $ciudad, $pais, $coordenadas, $fecha_nacimiento, $email, $telefono, $activo, $confirma_correo,$codigoConfirmacion,$codigo_recordar_contrasena);

        
        //vistas
        //si va todo bien vuelve al index
        $master = Master::obtenerInstancia();
        $maleta_index['listaCategorias'] = $master->getListaCategorias();
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['index_content'] = view('index_content', $maleta_index);
        return view('index', $maleta);
    }


    public function vistaLogin(){
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['login'] = view('login');
        return view('index', $maleta);
    }

    public function setLogin(){
        $baseDatos = new BaseDatos();
        // verifico si el email o usuario/nickname introducido coinciden con un usuario registrado
        $emailUsuario = $this->request->getPost('email');
        $contrasenaUsuario = $this->request->getPost('contrasena');

        $resultadoEmail = false;
        $coincideContrasena = false;

        /**
         * @param string $name
         */
        $resultadoEmail = $baseDatos -> comprobarEmail($emailUsuario);
        

        if($resultadoEmail == 1 || $resultadoEmail == 2){
            // el email coincide 

            $hash_constrasena = $baseDatos -> getHashContrasena($emailUsuario,$resultadoEmail);
            if (password_verify($contrasenaUsuario, $hash_constrasena)) {
                // meter en sesion el objeto del usuario para tener los fatos a mano
                session() -> set("sesionIniciada", $resultadoEmail);

                //meto el objeto del usuario en sesion 
                $usuario = $baseDatos -> getUsuario($emailUsuario);
                session() -> set("usuario_en_sesion",$usuario);

                // La contraseña es correcta
                $maleta_login['todoCorrecto'] = "Email y/o contraseña incorrectos";
                
            } else {
                // La contraseña es incorrecta
                // se devulve a la vista login con un error
                $maleta_login['errorEmail'] = "Email y/o contraseña incorrectos";
            }
        }else{
            // el email es incorrecto 
            // se devulve a la vista login con un error
            $maleta_login['errorEmail'] = "Email y/o contraseña incorrectos";
        }

        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['login'] = view('login',$maleta_login);
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

        if($accion == 1){
            $qr = new Qr();
            $qr -> setColor($color);
            $maleta_generarResenas['imagenQr'] = $qr -> crear($accion);

        }elseif($accion == 2){
            // se genera el qr
            $qr = new Qr();
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
            $qr = new Qr();
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
                $qr = new Qr();
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
        return view('index', $maleta);
    }
}
