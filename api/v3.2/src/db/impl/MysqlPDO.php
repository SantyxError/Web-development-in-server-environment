<?php

namespace App\db\impl;

use App\db\IPDOConnection;
use PDOException;
use PDO;

class MysqlPDO implements IPDOConnection
{

    public static function connect(): PDO
    {
        try {
            //$pdo = new PDO("mysql:host=localhost;dbname=peliculas;", 'root', '');
            $pdo = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);

            $pdo->exec("set names utf8");
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Error al conectar con la bbdd: " . $e->getMessage();
        }
    }
}
