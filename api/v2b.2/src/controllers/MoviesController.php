<?php


//CAPA DE PRESENTACION

namespace App\controllers;
 
use App\services\impl\MoviesService;
use App\services\IMoviesService;
use Exception;
use App\factories\MoviesFactory;
 
class MoviesController {
 
    //private IMoviesService $service;
 
    /* function __construct() {
        $this->service = new MoviesService();
    } */
 
    public function all(){
        echo json_encode(MoviesFactory::getService()->all());
    }
 
    public function find($id){
        // echo "Detalle de la película con id $id";

        //Ampliación 1
        try{
            echo json_encode(MoviesFactory::getService()->find($id));  //Insertar el $id
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }
                    
}

?>