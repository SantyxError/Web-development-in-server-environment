<?php


//USAMOS EL DTO PARA TRANSPORTAR DATOS ENTRE CAPAS. SON CLASES CON PROPIEDADES, Y SOLO TIENEN GETTERS. 
//ES UN FORMATO COMUN ENTRE TODOS LOS DATOS


namespace App\DTO\impl;

use App\DTO\IDTOCheck;
use JsonSerializable;

class MovieDTO implements JsonSerializable, IDTOCheck
{


    //ATRIBUTOS 
    /**
     * @param $id int 
     * @param $titulo string 
     * @param $anyo int 
     * @param $duracion int 
     */

    //CONSTRUCTOR
    function __construct(private ?int $id, private string $titulo, private int $anyo, private int $duracion)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->anyo = $anyo;
        $this->duracion = $duracion;
    }


    //GETTERS
    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function titulo(): string
    {
        return $this->titulo;
    }

    /**
     * @return int
     */
    public function anyo(): int
    {
        return $this->anyo;
    }

    /**
     * @return int
     */
    public function duracion(): int
    {
        return $this->duracion;
    }




    //ESTO TRANSFORMA A JSON NUESTRO DTO(EL OBJETO)
    /**
     * Specify data which should be serialized to JSON
     * Serializes the object to a value that can be serialized natively by json_encode().
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value of any type other than a resource .
     */
    function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'anyo' => $this->anyo,
            'duracion' => $this->duracion
        ];
    }


    public static function check(?int $id, array $data): MovieDTO
    {
        if (isset($data["titulo"]) && isset($data["anyo"]) && isset($data["duracion"])) {
            $movie = new MovieDTO($id, $data["titulo"], $data["anyo"], $data["duracion"]);
            return $movie;
        } else {
            throw new \Exception("Los campos son incorrectos o estan vacios", 400);
        }
    }
}
