<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Rutas Usuarios
$routes->get('usuarios','UserController::index'); //Obtener productos registrados
$routes->get('usuarios/new','UserController::new'); //Cargar vista para registrar un nuevo producto
$routes->post('usuarios','UserController::create'); //Crear un nuevo producto
$routes->get('usuarios/(:num)','UserController::show/$1'); //Mostrar datos de un producto
$routes->get('usuarios/edit/(:num)','UserController::edit/$1'); //Cargar vista para modificar datos de un producto
$routes->put('usuarios/(:num)','UserController::update/$1'); //Modificar los datos de un producto
$routes->delete('usuarios/(:num)','UserController::delete/$1'); //Eliminar un producto
$routes->get('usuarios/login','UserController::login'); //Mostrar datos de un producto

//Rutas Productos
$routes->get('productos','ProductController::index'); //Obtener productos registrados
$routes->get('productos/new','ProductController::new'); //Cargar vista para registrar un nuevo producto
$routes->post('productos','ProductController::create'); //Crear un nuevo producto
$routes->get('productos/(:num)','ProductController::show/$1'); //Mostrar datos de un producto
$routes->get('productos/edit/(:num)','ProductController::edit/$1'); //Cargar vista para modificar datos de un producto
$routes->put('productos/(:num)','ProductController::update/$1'); //Modificar los datos de un producto
$routes->delete('productos/(:num)','ProductController::delete/$1'); //Eliminar un producto
$routes->get('productos/search','ProductController::search_index'); //Obtener productos registrados

//Rutas carrito
$routes->get('carrito','CartController::index'); //Obtener productos registrados en el carrito por el usuario
$routes->delete('carrito/(:num)','CartController::delete/$1'); //Eliminar un producto

//Rutas historial
$routes->get('productos','HistoryController::index'); //Obtener lista de productos comprados por el usuario