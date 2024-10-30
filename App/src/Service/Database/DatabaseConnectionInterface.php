<?php

declare(strict_types=1);

namespace App\Service\Database;

interface DatabaseConnectionInterface
{
    public function getConnection(): \PDO;
}