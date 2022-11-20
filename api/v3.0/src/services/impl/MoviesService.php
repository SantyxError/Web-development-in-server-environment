<?php

//CLASE CON LOS DATOS DE LAS PELICULAS


namespace App\services\impl;

use App\services\IMoviesService;
use App\DTO\MovieDTO;
use App\factories\MoviesFactory;




class MoviesService implements IMoviesService
{

    public function all(): array
    {
        return MoviesFactory::getDAO()->read();
    }

    function find($id): MovieDTO
    {
        return  MoviesFactory::getDAO()->findById($id);
    }

    static function insert(MovieDTO $movie): bool
    {
        return MoviesFactory::getDAO()->create($movie);
    }
}
