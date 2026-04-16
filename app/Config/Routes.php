<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->post('/auth/procesar', 'Auth::procesar');
$routes->get('/salir', 'Auth::salir');
// Rutas protegidas por el filtro de sesión
$routes->group('', ['filter' => 'authFilter'], function($routes) {
    
    // Panel para Administradores (Rol 745)
    $routes->get('/admin/dashboard', 'Dashboard::admin');
    
    // Panel para Operadores (Rol 125)
    $routes->get('/operador/dashboard', 'Dashboard::operador');
    
    // Panel para Clientes (Rol 58)
    $routes->get('/cliente/dashboard', 'Dashboard::cliente');
});
// Ruta para procesar el alquiler. El (:num) es un comodín para el ID de la película.
$routes->get('/rentar/(:num)', 'Alquiler::procesar/$1', ['filter' => 'authFilter']);
$routes->get('/cliente/mis_alquileres', 'Dashboard::mis_alquileres', ['filter' => 'authFilter']);
// Rutas para el CRUD de Streaming
$routes->get('/admin/streaming', 'Streaming::index');
$routes->get('/admin/streaming/crear', 'Streaming::crear');
$routes->post('/admin/streaming/guardar', 'Streaming::guardar');

$routes->get('/admin/generos', 'Generos::index');
$routes->post('/admin/generos/guardar', 'Generos::guardar');
$routes->get('/admin/generos/eliminar/(:num)', 'Generos::eliminar/$1');

$routes->get('/admin/planes', 'Planes::index');
$routes->post('/admin/planes/guardar', 'Planes::guardar');
$routes->get('/admin/planes/eliminar/(:num)', 'Planes::eliminar/$1');

$routes->get('/admin/usuarios', 'Usuarios::index');
$routes->post('/admin/usuarios/cambiar_rol/(:num)', 'Usuarios::cambiar_rol/$1');

$routes->get('/admin/usuarios/crear', 'Usuarios::crear');
$routes->post('/admin/usuarios/guardar', 'Usuarios::guardar');

$routes->get('/admin/usuarios/eliminar/(:num)', 'Usuarios::eliminar/$1');