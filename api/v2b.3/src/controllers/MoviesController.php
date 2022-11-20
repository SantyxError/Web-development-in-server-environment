<?php


//CAPA DE PRESENTACION

namespace App\controllers;

use App\response\HTTP_response;
use Exception;
use App\factories\MoviesFactory;

class MoviesController
{

    //private IMoviesService $service;

    /* function __construct() {
        $this->service = new MoviesService();
    } */

    public function all()
    {
        HTTP_response::json(200, MoviesFactory::getService()->all());
    }

    public function find($id)
    {
        // echo "Detalle de la película con id $id";

        //Ampliación 1
        try {
            HTTP_response::json(200, MoviesFactory::getService()->find($id));  //Insertar el $id
        } catch (Exception $e) {
            HTTP_response::json(404, $e->getMessage());
        }
    }
}
