<?php

use App\Service\Database\Bowlingbahn\BowlingbahnenConnection;
use App\Service\Database\DatabaseConnectionInterface;
use PHPUnit\Framework\TestCase;

class BowlingbahnenConnectionTest extends TestCase
{
    public function testCanCallLoadAllWithValidResult(): void
    {
        $testData = [
            ['id' => 1, 'name' => ''],
            ['id' => 2, 'name' => ''],
        ];

        $pdoStatement = $this->createMock(\PdoStatement::class);
        $pdoStatement->expects($this->once())->method('fetchAll')->willReturn($testData);

        $pdoMock = $this->getMockBuilder(PDO::class)->disableOriginalConstructor()->getMock();
        $pdoMock->expects($this->once())->method('prepare')->willReturn($pdoStatement);

        $dbConnection = $this->createMock(DatabaseConnectionInterface::class);
        $dbConnection->expects($this->once())->method('getConnection')->willReturn($pdoMock);

        $bowlingbahnConnection = new BowlingbahnenConnection($dbConnection);

        $result = $bowlingbahnConnection->loadAll();

        $this->assertCount(2, $result);
        $this->assertIsArray($result);
    }
}
