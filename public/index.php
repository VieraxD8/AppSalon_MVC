<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminControllers;
use Controllers\CitaControllers;
use Controllers\loginControllers;
use Controllers\APIcontrollers;
use Controllers\ServiciosControllers;
use MVC\Router;

$router = new Router();

//Iniciar Sesion

$router->get('/',[loginControllers::class, 'login']);
$router->post('/',[loginControllers::class, 'login']);
$router->get('/logout',[loginControllers::class, 'logout']);

//REcupara Password

$router->get('/olvide',[loginControllers::class, 'olvide']);
$router->post('/olvide',[loginControllers::class, 'olvide']);
$router->get('/recuperar',[loginControllers::class, 'recuperar']);
$router->post('/recuperar',[loginControllers::class, 'recuperar']);


//Crear Cuenta

$router->get('/crear-cuenta',[loginControllers::class, 'crear']);
$router->post('/crear-cuenta',[loginControllers::class, 'crear']);


//Confirmar cuenta

$router->get('/confirmar-cuenta', [loginControllers::class, 'confirmar']);
$router->get('/mensaje', [loginControllers::class, 'mensaje']);



//API de citas

 $router->get('/api/servicios', [APIcontrollers::class, 'index'] );
 $router->post('/api/citas', [APIcontrollers::class, 'guardar'] );
 $router->post('/api/eliminar', [APIcontrollers::class, 'eliminar']);



//Area privada

$router->get('/cita', [CitaControllers::class, 'index']);
$router->get('/admin', [AdminControllers::class, 'index']);


//Crud de servicios

$router->get('/servicios', [ServiciosControllers::class, 'index']);
$router->get('/servicios/crear', [ServiciosControllers::class, 'crear']);
$router->post('/servicios/crear', [ServiciosControllers::class, 'crear']);
$router->get('/servicios/actualizar', [ServiciosControllers::class, 'actualizar']);
$router->post('/servicios/actualizar', [ServiciosControllers::class, 'actualizar']);
$router->post('/servicios/eliminar', [ServiciosControllers::class, 'eliminar']);






// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();