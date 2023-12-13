<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('inicio','UsuariosController::inicio'); //Obtener productos registrados

//Rutas Usuarios
$routes->get('usuarios','UsuariosController::index'); //Obtener usuarios registrados
$routes->get('usuarios/new','UsuariosController::new'); //Cargar vista para registrar un nuevo usuario
$routes->post('usuarios','UsuariosController::create'); //Crear un nuevo usuario
$routes->get('usuarios/(:num)','UsuariosController::show/$1'); //Mostrar datos de un usuario
$routes->get('usuarios/edit/(:num)','UsuariosController::edit/$1'); //Cargar vista para modificar datos de un usuario
$routes->put('usuarios/(:num)','UsuariosController::update/$1'); //Modificar los datos de un usuario
$routes->delete('usuarios/(:num)','UsuariosController::delete/$1'); //Eliminar un usuario
$routes->get('usuarios/login','UsuariosController::login'); //Mostrar datos de un usuario

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

// Ventas

$routes->get('compras','VentasController::Index'); // Obtener las compras registradas
//$routes->get('ventas/new','VentasController::new'); // Cargar la vista para realizar la venta
//$routes->post('ventas','VentasController::create'); // Crear una nueva venta
$routes->get('compras/(:num)','VentasController::show/$1');//Mostrar los datos de las compras
$routes->get('ventas/domicilio/(:num)','VentasController::domicilio/$1');//Mostrar el domicilio del cliente
$routes->get('ventas/diallega/(:num)','VentasController::diallega/$1');//Mostrar el dia que llega la mercacia
$routes->get('ventas/contadocredito/(:num)','VentasController::contadocredito/$1');//Selecciona si la compra sera de contado o credito
$routes->get('ventas/efectivopuntopago/(:num)','VentasController::efectivopuntopago/$1');//Selecciona el punto de pago
$routes->get('ventas/revisayconfirma/(:num)','VentasController::revisayconfirma/$1');//Confirmar e imprimir el ticket

//Proveedores (Roman)

$routes->get('proveedores','ProveedoresController::index'); //Obtener proveedores registrados
$routes->get('proveedores/new','ProveedoresController::new'); //Cargar vista para registrar un nuevo proveedor
$routes->post('proveedores','ProveedoresController::create'); //Crear un nuevo proveedor
$routes->get('proveedores/(:num)','ProveedoresController::show/$1'); //Mostrar datos de un proveedor
$routes->get('proveedores/edit/(:num)','ProveedoresController::edit/$1'); //Cargar vista para modificar datos de un proveedor
$routes->put('proveedores/(:num)','ProveedoresController::update/$1'); //Modificar los datos de un proveedor
$routes->delete('proveedores/(:num)','ProveedoresController::delete/$1'); //Eliminar un proveedor

//Rutas historial
$routes->get('productos','HistoryController::index'); //Obtener lista de productos comprados por el usuario
