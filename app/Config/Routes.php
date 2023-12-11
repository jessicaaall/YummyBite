<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index', ['filter' => 'authGuard']);
$routes->get('/pemilik-restoran', 'PemilikRestoranController::index');
$routes->get('/login', 'AuthController::index');
$routes->match(['get', 'post'], 'AuthController/loginAuth', 'AuthController::loginAuth');
$routes->get('/logout', 'AuthController::logout');