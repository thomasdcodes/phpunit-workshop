<?php

namespace App\Service\Database\Bowlingbahn;

use App\Service\Database\Connection;
use PHPUnit\Framework\TestCase;

class BowlingbahnenConnectionTest extends TestCase
{
    private ?\PDO $pdo = null;
    private ?BowlingbahnenConnection $bowlingbahnenConnection = null;
    protected function setUp(): void
    {
        $connection = new Connection();
        $this->pdo = $connection->getConnection();
        $this->pdo->beginTransaction();
        $this->bowlingbahnenConnection = new BowlingbahnenConnection($connection);
    }

    protected function tearDown(): void
    {
        $this->pdo->rollBack();
        $this->pdo = null;
        $this->bowlingbahnenConnection = null;
    }

    public function testCanInit(): void
    {
        $this->assertInstanceOf(BowlingbahnenConnection::class, $this->bowlingbahnenConnection);
    }

    public function testCanLoadBowlingbahnen(): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO bowlingbahnen (name) VALUES(?)");
        $stmt->execute(['TestBahn10']);

        $resultArray = $this->bowlingbahnenConnection->loadAll();

        $this->assertGreaterThan(1, count($resultArray));
    }
}
