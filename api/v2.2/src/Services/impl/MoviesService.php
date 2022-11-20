<?php

//CLASE CON LOS DATOS DE LAS PELICULAS


namespace App\services\impl;
 
use App\services\IMoviesService;
use App\DTO\MovieDTO;
use Exception;

class MoviesService implements IMoviesService {
 
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
 
 
    public function all(): array {
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
     * @param mixed $id
     *
     * @return \App\DTO\MovieDTO
    */
    function find($id): MovieDTO {
        //@TODO
        // $movies = this->read();
        // $movie = array_filter($movies, function($movie) 
       

       //Ampliacion 1
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




    
    }

?>