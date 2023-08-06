<?php 
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AppController;
use Controllers\EmpleadoController;
use Controllers\SexoController;
use Controllers\AreaController;
use Controllers\PuestoController;
$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);
$router->get('/empleados', [EmpleadoController::class,'index']);
$router->post('/API/empleados/guardar', [EmpleadoController::class,'guardarAPI']);
$router->get('/API/empleados/buscar', [EmpleadoController::class,'buscarAPI']);
$router->post('/API/empleados/modificar', [EmpleadoController::class,'modificarAPI']);
$router->post('/API/empleados/eliminar', [EmpleadoController::class,'eliminarAPI']);

$router->get('/sexos', [SexoController::class, 'index']);
$router->post('/API/sexos/guardar', [SexoController::class, 'guardarAPI']);
$router->get('/API/sexos/buscar', [SexoController::class, 'buscarAPI']);
$router->post('/API/sexos/modificar', [SexoController::class, 'modificarAPI']);
$router->post('/API/sexos/eliminar', [SexoController::class, 'eliminarAPI']);

$router->get('/areas', [AreaController::class, 'index']);
$router->post('/API/areas/guardar', [AreaController::class, 'guardarAPI']);
$router->get('/API/areas/buscar', [AreaController::class, 'buscarAPI']);
$router->post('/API/areas/modificar', [AreaController::class, 'modificarAPI']);
$router->post('/API/areas/eliminar', [AreaController::class, 'eliminarAPI']);

$router->get('/puestos', [PuestoController::class, 'index']);
$router->post('/API/puestos/guardar', [PuestoController::class, 'guardarAPI']);
$router->get('/API/puestos/buscar', [PuestoController::class, 'buscarAPI']);
$router->post('/API/puestos/modificar', [PuestoController::class, 'modificarAPI']);
$router->post('/API/puestos/eliminar', [PuestoController::class, 'eliminarAPI']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
