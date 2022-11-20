<?php

$router = new \Bramus\Router\Router();


$router->setNamespace('\App');

/**
 * Definimos nuestras rutas (ENDPOINTS)
 */
$router->get('/', function () {
    echo "Bienvenido a la API de películas";
});
$router->get('/peliculas', 'controllers\MoviesController@all'); //Llama al medoto "all()" del controlador, para que nos de todas las peliculas
$router->get('/peliculas/(\d+)', 'controllers\MoviesController@find'); //Llama al medoto "find()" del controlador, para buscar por id.
$router->post('/peliculas', 'controllers\MoviesController@insert');

// crear rutas con parámetros opcionales con la librería bramus/router
// $router->get('peliculas/{id}', function($id){
// 	echo "Detalle de la película $id";
// });



//Mostrar un mensaje de error cuando la ruta no existe.
$router->set404(function () {
    echo "Error: Página no existe";
});

// HTTPResponse_code(404);
// echo json_encode(['Message' => 'Recurso no encontrado']);






$router->run();
