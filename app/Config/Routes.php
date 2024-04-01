<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
*/
// pagina inicio inicio --> index_content.php
$routes->get('/', 'Home::index');

// pagina de escribir una reseña --> resena.php
$routes->get('/resena', 'Home::resena');



//pagina para añadir un nuevo negocio  
$routes->get('/nuevoNegocio', 'Home::nuevoNegocio');
$routes->post('/setNegocio', 'Home::setNegocio');

//pagina para añadir un nuevo usuario  
$routes->get('/nuevoUsuario', 'Home::nuevoUsuario');
$routes->post('/setUsuario', 'Home::setUsuario');

//confirmar email tanto de negocio como de usuario
$routes->get('/confirmarEmail', 'Home::confirmarEmail');
