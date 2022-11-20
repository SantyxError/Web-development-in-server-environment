<?php

namespace App\db\impl;

use App\db\IPDOConnection;
use PDOException;
use PDO;
// use App\factories\DBFactory;



class MysqlPDO implements IPDOConnection
{

    public static function connect(): PDO
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=peliculas', 'root', '');
            $pdo->exec("set names utf8");
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Error al conectar con la bbdd: " . $e->getMessage();
        }
    }
}
