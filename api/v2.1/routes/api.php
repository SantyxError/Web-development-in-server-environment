<?php

$router = new \Bramus\Router\Router();
 
 
$router->setNamespace('\App');
 
/**
 * Definimos nuestras rutas
 */
$router->get('/', function() { echo "Bienvenido a la API de películas"; });
$router->get('/peliculas', 'controllers\MoviesController@all');
$router->get('/peliculas/(\d+)', 'controllers\MoviesController@find');


// crear rutas con parámetros opcionales con la librería bramus/router
$router->get('peliculas/{id}', function($id){
	echo "Detalle de la película $id";
});



//Mostrar un mensaje de error cuando la ruta no existe.
$router->set404(function(){ echo "Error: Página no existe"; });

 
$router->run();

?>