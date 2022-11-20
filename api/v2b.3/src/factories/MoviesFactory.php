<?php

namespace App\factories;

use App\DAO\impl\MoviesJSONDAO;
use App\DAO\IMoviesDAO;
use App\services\IMoviesService;
use App\services\impl\MoviesService;
use App\DAO\impl\MoviesStaticDAO;


class MoviesFactory {

    public static function getService(){
        return new MoviesService();
    }

    public static function getDAO(){
        return new MoviesJSONDAO();
    }

}

?>