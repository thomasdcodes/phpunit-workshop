<?php

namespace App\Service\Database\Bowlingbahn;

use App\Service\Database\DatabaseConnectionInterface;

class BowlingbahnenConnection implements BowlingbahnConnectionInterface
{
    public function __construct(
        private DatabaseConnectionInterface $dbConnection
    )
    {
    }

    public function loadAll(): array
    {
        $connection = $this->dbConnection->getConnection();

        $stmt = $connection->prepare('SELECT * FROM bowlingbahnen');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}