<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
*/
// pagina inicio inicio --> index_content.php
$routes->get('/', 'Home::index');

// verificar autenticidad del codigo QR para poder poner la resena en resena.php
$routes->get('/resena', 'Home::resena');

// pagina de escribir una reseña --> resena.php
$routes->post('/setResena', 'Home::setResena');

//pagina para añadir un nuevo negocio  
$routes->get('/nuevoNegocio', 'Home::nuevoNegocio');
$routes->post('/setNegocio', 'Home::setNegocio');

//pagina para añadir un nuevo usuario  
$routes->get('/nuevoUsuario', 'Home::nuevoUsuario');
$routes->post('/setUsuario', 'Home::setUsuario');

//confirmar email tanto de negocio como de usuario
$routes->get('/confirmarEmail', 'Home::confirmarEmail');

// vista de login
$routes->get('/login', 'Home::vistaLogin');
$routes->post('/setLogin', 'Home::setLogin');
// si meten directamente "https://verifyreviews.es/verifyreviews/setLogin" redirecciona a vista Login
$routes->get('/setLogin', 'Home::vistaLogin');


// cerrar sesion
$routes->get('/cerrarSesion', 'Home::cerrarSesion');

// vista de generar reseñas para negocios
$routes->get('/generarResenas', 'Home::vistaGenerarResenas');
$routes->post('/setGenerarResenas', 'Home::setGenerarResenas');


// vista para mostrar la lista de negocios de una categoria
$routes->get('/categorias', 'Home::vista_cat_negocio');
