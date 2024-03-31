<?php

namespace App\Controllers;
use App\Models\BaseDatos;
use App\Models\Master;
use App\Models\Emailmailer;
use App\Models\Qr;
use App\Models\Categoria;
use App\Models\Negocio;
use App\Models\Mapa;
use App\Models\Resena;
use App\Models\Usuario;
use App\Models\UsuarioRegistrado;
use App\Models\UsuarioSinRegistrar;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Output\QRImage;



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
        
        $maleta['val'] = $this->request->getGet('clavePublica');
        
        //vistas
        $maleta['head_content'] = view('head_content');
        $maleta['header_content'] = view('header_content');
        $maleta['resena_content'] = view('resena_content');
        return view('resena', $maleta);
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
        $email = new Emailmailer();
        $destinatario = $email;
        var_dump($email);
        $asunto = "VerifyReviews: Confirmación email";
        $mensaje = 'Por favor, haz clic en el siguiente enlace para confirmar tu correo electrónico: \n https://verifyreviews.es/verifyreviews/confirmarEmail.php?codigoConfirmacion=' . $codigoConfirmacion;

        if($email -> enviarCorreo($destinatario, $asunto, $mensaje)){
            echo "email enviado";
        }else{
            echo "email fail";
        }



        // añado el nuevo negocio a la base de datos
        // añado un nuevo objeto a la lista de negocios
        $baseDatos = new BaseDatos();
        $baseDatos -> setNegocio($nombre, $email, $calle, $ciudad, $pais, $telefono_negocio, $fotosBD, $foto_principal, $coordenadas, $sitio_web, $cod_categoria, $nombre_titular, $telefono_titular, $activo, $confirma_correo,$codigoConfirmacion);

        
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
}
