<?php

namespace App\Adapter\Out\Database;

use App\Service\Database\Bowlingbahn\BowlingbahnConnectionInterface;
use PHPUnit\Framework\TestCase;

class BowlingbahnenRepoTest extends TestCase
{
    public function testCanInit(): void
    {
        $connectionStub = $this->createStub(BowlingbahnConnectionInterface::class);
        $bowlingbahnenRepo = new BowlingbahnenRepo($connectionStub);

        $this->assertInstanceOf(BowlingbahnenRepo::class, $bowlingbahnenRepo);
    }

    public function testCanCallGetBowlingbahnenByTime(): void
    {
        $testData = [
            ['id' => 1, 'name' => 'TestBahn 1'],
            ['id' => 2, 'name' => 'TestBahn 2'],
        ];

        $connectionMock = $this->createMock(BowlingbahnConnectionInterface::class);
        $connectionMock->expects($this->once())->method('loadAll')->willReturn($testData);

        $bowlingbahnenRepo = new BowlingbahnenRepo($connectionMock);
        $bowlingbahnList = $bowlingbahnenRepo->loadBowlingbahnenByTime(new \DateTimeImmutable());

        $this->assertCount(2, $bowlingbahnList->getBowlingbahnen());
    }
}
