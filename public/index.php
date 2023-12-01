<?php 
require_once __DIR__ . '/../includes/app.php';
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedoresControllers;
use Controllers\PaginasControllers;
use Controllers\LoginControllers;

$router = new Router();

//Zona privada
//obtener las url "primero url asociada,luego un controller y luego el metodo
$router->get('/admin', [PropiedadController::class,'index']);
$router->get('/propiedades/crear',[PropiedadController::class,'create']);
$router->post('/propiedades/crear',[PropiedadController::class,'create']);
$router->get('/propiedades/actualizar',[PropiedadController::class,'update']);
$router->post('/propiedades/actualizar',[PropiedadController::class,'update']);
$router->post('/propiedades/eliminar',[PropiedadController::class,'delete']);

$router->get('/vendedores/crear',[VendedoresControllers::class,'create']);
$router->post('/vendedores/crear',[VendedoresControllers::class,'create']);
$router->get('/vendedores/actualizar',[VendedoresControllers::class,'update']);
$router->post('/vendedores/actualizar',[VendedoresControllers::class,'update']);
$router->post('/vendedores/eliminar',[VendedoresControllers::class,'delete']);

//ZONA PUBLICA
$router->get('/',[PaginasControllers::class,'index']);
$router->get('/nosotros',[PaginasControllers::class,'nosotros']);
$router->get('/propiedades',[PaginasControllers::class,'propiedades']);
$router->get('/propiedad',[PaginasControllers::class,'propiedad']);
$router->get('/blog',[PaginasControllers::class,'blog']);
$router->get('/entrada',[PaginasControllers::class,'entrada']);
$router->get('/contacto',[PaginasControllers::class,'contacto']);
$router->post('/contacto',[PaginasControllers::class,'contacto']);

//login y autentificacion
$router->get('/login',[LoginControllers::class,'login']);
$router->post('/login',[LoginControllers::class,'login']);
$router->get('/logout',[LoginControllers::class,'logout']);

//verifica las rutas y le asigna una variable
$router->comprobarRutas();