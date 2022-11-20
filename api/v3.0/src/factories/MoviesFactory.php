<?php

namespace App\factories;

use App\DAO\impl\MoviesDBDAO;
use App\services\impl\MoviesService;



class MoviesFactory
{

    public static function getService()
    {
        return new MoviesService;
    }


    public static function getDAO()
    {
        return new MoviesDBDAO;
    }
}
