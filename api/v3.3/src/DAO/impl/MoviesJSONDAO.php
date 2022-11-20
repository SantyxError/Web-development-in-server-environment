<?php

namespace App\DAO\impl;

use App\DTO\impl\MovieDTO;
use App\DAO\IMoviesDAO;
use Exception;

class MoviesJSONDAO implements IMoviesDAO
{


    function create(MovieDTO $movie): bool
    {
        return false;
    }

    function read(): array
    {
        $result = array();
        $data = file_get_contents(base_path("src/data/peliculas.json"));
        $peliculas = json_decode($data, true);

        foreach ($peliculas as $movie) {
            array_push(
                $result,
                new MovieDTO(
                    $movie['id'],
                    $movie['titulo'],
                    $movie['anyo'],
                    $movie['duracion']
                )
            );
        }

        return $result;
    }


    function findById(int $id): MovieDTO
    {
        $result = null;
        $data = file_get_contents(base_path("src/data/peliculas.json"));
        $peliculas = json_decode($data, true);


        foreach ($peliculas as $movie) {
            if ($movie['id'] == $id) {
                $result = new MovieDTO($movie['id'], $movie['titulo'], $movie['anyo'], $movie['duracion']); //creamos objeto
            }
        }

        if ($result == null) {
            throw new Exception("Pelicula no encontrada.");
        }

        return $result;
    }


    function update(int $id, MovieDTO $movie): bool
    {
        return false;
    }


    function delete(int $id): bool
    {
        return false;
    }
}
