<?php

namespace App\DAO\impl;
 
use App\DTO\MovieDTO;
use App\DAO\IMoviesDAO;
use Exception;
 
class MoviesStaticDAO implements IMoviesDAO {


 
    private $movies = [
        array(
            "id" => 1,
            "titulo" => "El padrino",
            "anyo" => 1972,
            "duracion" => 175
        ) ,
        array(
            "id" => 2,
            "titulo" => "El padrino 2",
            "anyo" => 1974,
            "duracion" => 200
        ) ,
        array(
            "id" => 3,
            "titulo" => "Senderos de gloria",
            "anyo" => 1957,
            "duracion" => 86
        ) ,
        array(
            "id" => 4,
            "titulo" => "Primera plana",
            "anyo" => 1974,
            "duracion" => 105
        )
    ];
 

 
    /**
     *
     * @param MovieDTO $movie
     *
     * @return bool
     */
    function create(MovieDTO $movie): bool {
        return false;
    }
     
    /**
     *
     * @return array
     */
    function read(): array {
        $result = array();
        
        foreach ($this->movies as $movie) {
            array_push($result, new MovieDTO(
                                        $movie['id'], 
                                        $movie['titulo'], 
                                        $movie['anyo'], 
                                        $movie['duracion']
                                )
            );
        }
 
        return $result;
    }
     
    /**
     *
     * @param int $id
     *
     * @return MovieDTO
     */
    function findById(int $id): MovieDTO {
        $result = null;

       
        foreach ($this->movies as $movie) {
             if($movie['id'] == $id) {
                $result = new MovieDTO($movie['id'], $movie['titulo'],$movie['anyo'],$movie['duracion']); //creamos objeto
            } 
            
        }
        
        if ($result == null){
            throw new Exception("Pelicula no encontrada.");
        }
     
            return $result;
    }
     
    /**
     *
     * @param int $id
     * @param MovieDTO $movie
     *
     * @return bool
     */
    function update(int $id, MovieDTO $movie): bool {
        return false;
    }
     
    /**
     *
     * @param int $id
     *
     * @return bool
     */
    function delete(int $id): bool {
        return false;
    }



}

?>