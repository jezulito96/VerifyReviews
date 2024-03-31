<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/resena', 'Home::resena');
$routes->get('/nuevoNegocio', 'Home::nuevoNegocio');
$routes->post('/setNegocio', 'Home::setNegocio');
$routes->get('/confirmarEmail', 'Home::confirmarEmail');
