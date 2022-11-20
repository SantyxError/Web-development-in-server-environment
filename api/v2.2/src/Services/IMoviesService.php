<?php

//SERVICIO
// Aquí tenemos los datos de capa de persistencia.
// Definimos 2 funciones y lo que va a retornar

namespace App\services;
use App\DTO\MovieDTO;
 

//Definimos la interfaz con metodos vacios.
interface IMoviesService {
    public function all(): array; //obligatorio que retorne un array
    public function find($id): MovieDTO; //obligatorio que retorne un DTO
}

?>