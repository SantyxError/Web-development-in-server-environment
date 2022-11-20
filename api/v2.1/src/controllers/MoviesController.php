<?php

namespace App\controllers;
 
use App\services\impl\MoviesService;
use App\services\IMoviesService;
 
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
        echo json_encode($this->service->find($id));  //Insertar el $id
    }
}

?>