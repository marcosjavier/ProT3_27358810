<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('principal', 'Home::index');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('acercade', 'Home::acerca_de');
$routes->get('registro', 'Home::registro');
$routes->get('login', 'Home::login');
$routes->get('lista_usuarios', 'Home::listaUsuarios');

/*ruta a la lista de Usuarios*/
#$routes->get('lista_usuarios','UsuarioControler::listaUsuarios');

/*rutas del Registro de Usuarios*/
$routes->get('/registro', 'UsuarioController::create');
$routes->post('/enviarForm','UsuarioController::formValidation');
$routes->get('UsuarioController/edit/(:any)', 'UsuarioController::edit/$1');

/*rutas del login */
$routes->get('/login','LoginController');
$routes->post('/enviarlogin','LoginController::auth');
$routes->get('/panel','PanelController::index', ['filter' => 'auth']);
$routes->get('/logout','LoginController::logout');

