<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/pemilik-restoran', 'PemilikRestoranController::index');
$routes->get('/restoranAPI/?(:any)?', 'RestoranController::index/$1');
$routes->get('/restoranbyid/(:any)', 'RestoranController::restoranbyId/$1');
$routes->get('/makananAPI/(:any)', 'MakananController::index/$1');
$routes->get('/login', 'AuthController::index');
$routes->match(['get', 'post'], 'AuthController/loginAuth', 'AuthController::loginAuth');
$routes->get('/logout', 'AuthController::logout', ['filter' => 'authGuard']);

$routes->get('/', 'TransactionController::pemesanan', ['filter' => 'authGuard']);
$routes->get('/menulist', 'MenuListController::menu', ['filter' => 'authGuard']);
$routes->get('/addmenu', 'MenuListController::addmenu', ['filter' => 'authGuard']);
$routes->get('/editmenu/(:any)', 'MenuListController::editmenu/$1', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'MenuListController/insertMenu', 'MenuListController::insertMenu', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'MenuListController/deleteMenu/(:any)', 'MenuListController::deleteMenu/$1', ['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'MenuListController/updateMenu/(:any)', 'MenuListController::updateMenu/$1', ['filter' => 'authGuard']);
