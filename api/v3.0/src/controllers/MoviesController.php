<?php


//CAPA DE PRESENTACION

namespace App\controllers;

use App\response\HTTPResponse;
use Exception;
use App\factories\MoviesFactory;
use App\DTO\MovieDTO;


class MoviesController
{

    //private IMoviesService $service;

    /* function __construct() {
        $this->service = new MoviesService();
    } */

    public function all()
    {
        HTTPResponse::json(200, MoviesFactory::getService()->all());
    }

    public function find($id)
    {
        // echo "Detalle de la película con id $id";

        //Ampliación 1
        try {
            HTTPResponse::json(200, MoviesFactory::getService()->find($id));  //Insertar el $id
        } catch (Exception $e) {
            HTTPResponse::json(404, $e->getMessage());
        }
    }

    public function insert()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $movie = new MovieDTO(null, $data['titulo'], $data['anyo'], $data['duracion']);
            MoviesFactory::getService()::insert($movie);
            HTTPResponse::json(201, "Recurso creado");
        } catch (\Exception $e) {
            HTTPResponse::json($e->getCode(), $e->getMessage());
        }
    }
}
