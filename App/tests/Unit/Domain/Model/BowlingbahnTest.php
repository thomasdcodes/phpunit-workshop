<?php

declare(strict_types=1);

use App\Domain\Bowlingbahn\Model\Bowlingbahn;
use PHPUnit\Framework\TestCase;

class BowlingbahnTest extends TestCase
{
    public function testCanInit(): void
    {
        $bowlingbahn = new Bowlingbahn();

        $this->assertInstanceOf(Bowlingbahn::class, $bowlingbahn);
    }

    public function testCanSetAndGetName(): void
    {
        $bowlingbahn = new Bowlingbahn();

        $bowlingbahn->setName('Bahn 1');

        $this->assertEquals('Bahn 1', $bowlingbahn->getName());
    }
}