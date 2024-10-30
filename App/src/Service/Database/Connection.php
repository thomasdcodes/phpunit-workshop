<?php

namespace App\Service\Database;

class Connection implements DatabaseConnectionInterface
{
    public function getConnection(): \PDO
    {
        return new \PDO("mysql:host=db;dbname=db", "db", "db");
    }
}