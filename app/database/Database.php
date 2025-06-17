<?php

namespace App\Database;

class Database {

    public static function conectar () {
        $host = 'localhost';
        $port = '3306';
        $username = 'root';
        $password = '';
        $database = 'webapp';

        $conectionUrl = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";

        return new \PDO($conectionUrl, $username, $password);
    }
}