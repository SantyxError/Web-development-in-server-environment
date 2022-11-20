<?php


//CAPA DE PRESENTACION

namespace App\controllers;
 
use App\services\impl\MoviesService;
use App\services\IMoviesService;
use Exception;
 

//CAPA DE PRESENTACIÓN (RECIBIMOS LOS DATOS DE NEGOCIO/SERVICIOS)
class MoviesController {
 
    private IMoviesService $service;
 
    function __construct() {
        $this->service = new MoviesService();
    }
 
    public function all(){
        echo json_encode($this->service->all());
    }
 
    public function find($id){
        // echo "Detalle de la película con id $id";

        //Ampliación 1
        try {
            echo json_encode($this->service->find($id));  //Insertar el $id
        } catch (Exception $e) {
            echo "No se ha encontrado la pelicula" . $e->getMessage;
        }
    }
                    
}

?>