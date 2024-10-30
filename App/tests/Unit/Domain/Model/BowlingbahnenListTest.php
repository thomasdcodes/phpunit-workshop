<?php

namespace App\Domain\Bowlingbahn\Model;

use PHPUnit\Framework\TestCase;

class BowlingbahnenListTest extends TestCase
{
    public function testCanInit()
    {
        $list = new BowlingbahnenList();

        $this->assertInstanceOf(BowlingbahnenList::class, $list);
    }

    public function testCanAddBowlingbahn(): void
    {
        $list = new BowlingbahnenList();
        $bowlingbahnStub = $this->createStub(Bowlingbahn::class);

        $list->addBowlingbahn($bowlingbahnStub);

        $this->assertCount(1, $list->getBowlingbahnen());
        $this->assertContains($bowlingbahnStub, $list->getBowlingbahnen());
    }

    public function testCanAddTwoBowlingbahnen(): void
    {
        $list = new BowlingbahnenList();
        $bowlingbahnStub = $this->createStub(Bowlingbahn::class);
        $bowlingbahnStub2 = $this->createStub(Bowlingbahn::class);

        $list->addBowlingbahn($bowlingbahnStub);
        $list->addBowlingbahn($bowlingbahnStub2);

        $this->assertCount(2, $list->getBowlingbahnen());
        $this->assertContains($bowlingbahnStub, $list->getBowlingbahnen());
        $this->assertContains($bowlingbahnStub2, $list->getBowlingbahnen());
    }
}
