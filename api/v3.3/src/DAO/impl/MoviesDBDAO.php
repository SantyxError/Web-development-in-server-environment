<?php

namespace App\DAO\impl;

use App\DAO\IMoviesDAO;
use App\DTO\impl\MovieDTO;
use App\db\orm\DB;
// use App\db\orm\QueryBuilder;

class MoviesDBDAO implements IMoviesDAO
{

    function create(MovieDTO $movie): bool
    {
        return DB::table('peliculas')->insert(['titulo' => $movie->titulo(), 'anyo' => $movie->anyo(), 'duracion' => $movie->duracion()]);
    }



    function read(): array
    {
        $result = array();
        // $sql = "SELECT * FROM peliculas";
        // $db_data = DB::select($sql);
        $db_data = DB::table('peliculas')->select('*')->get();
        foreach ($db_data as $movie) {
            $result[] = new MovieDTO(
                $movie->id,
                $movie->titulo,
                $movie->anyo,
                $movie->duracion
            );
        }
        return $result;
    }

    function findById(int $id): MovieDTO
    {
        $result = null;

        // $params = ["id" => $id];

        // $sql = "SELECT * FROM peliculas WHERE id = :id LIMIT 1";
        // $db_data = DB::selectOne($sql, $params);
        $db_data = DB::table('peliculas')->select('*')->find($id);
        $result = new MovieDTO(
            $db_data->id,
            $db_data->titulo,
            $db_data->anyo,
            $db_data->duracion
        );
        return $result;
    }

    function update(int $id, MovieDTO $movie): bool
    {
        return DB::table("peliculas")->update($id, ['titulo' => $movie->titulo(), 'anyo' => $movie->anyo(), 'duracion' => $movie->duracion()]);
    }

    function delete(int $id): bool
    {

        // $params = ["id" => $id];

        // $sql = "SELECT * FROM peliculas WHERE id = :id LIMIT 1";
        // $db_data = DB::selectOne($sql, $params);
        return DB::table('peliculas')->delete($id);
    }
}
