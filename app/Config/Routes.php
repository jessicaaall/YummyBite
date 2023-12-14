<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index', ['filter' => 'authGuard']);
$routes->get('/pemilik-restoran', 'PemilikRestoranController::index');
$routes->get('/restoranAPI/?(:any)?', 'RestoranController::index/$1');
$routes->get('/restoranbyid/(:any)', 'RestoranController::restoranbyId/$1');
$routes->get('/makananAPI/(:any)', 'MakananController::index/$1');
$routes->get('/login', 'AuthController::index');
$routes->match(['get', 'post'], 'AuthController/loginAuth', 'AuthController::loginAuth');
$routes->get('/logout', 'AuthController::logout');
