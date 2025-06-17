<?php

namespace App\Model;

require_once __DIR__ . '/../database/DataBase.php';

class BaseModel
{
    protected $pdo;
    protected $tabelaname;

    function __construct()
    {
        $this->pdo = \App\Database\Database::conectar();
    }
}