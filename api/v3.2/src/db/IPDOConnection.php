<?php

namespace App\db;

use PDO;

interface IPDOConnection
{


    public static function connect(): PDO;
}
