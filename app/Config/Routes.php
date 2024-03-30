<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/resena', 'Home::resena');
$routes->get('/nuevoNegocio', 'Home::nuevoNegocio');
$routes->get('/setNegocio', 'Home::setNegocio');
