<?php

//SERVICIO
// Aquí tenemos los datos de capa de persistencia.
// Definimos 2 funciones y lo que va a retornar

namespace App\services;

use App\DTO\impl\MovieDTO;


//Definimos la interfaz con metodos vacios.
interface IMoviesService
{
    public function all(): array; //obligatorio que retorne un array
    public function find($id): MovieDTO; //obligatorio que retorne un DTO
    public static function insert(MovieDTO $movie): bool; //obligatorio que retorne booleano
    public static function delete($id): bool; //obligatorio que retorne un bool
}
