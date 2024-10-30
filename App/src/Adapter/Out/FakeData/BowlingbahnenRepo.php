<?php

namespace App\Adapter\Out\FakeData;

use App\Domain\Bowlingbahn\Model\Bowlingbahn;
use App\Domain\Bowlingbahn\Model\BowlingbahnenList;
use App\Domain\Bowlingbahn\Port\LoadAvailableBowlingbahnenPort;
use App\Service\Database\DatabaseConnectionInterface;

class BowlingbahnenRepo
{
    public function __construct(
        private DatabaseConnectionInterface $dbConnection
    )
    {
    }

    public function loadBowlingbahnenByTime(\DateTimeInterface $time): BowlingbahnenList
    {
        $bowlingbahn1 = (new Bowlingbahn())->setName('Bahn 1');
        $bowlingbahn2 = (new Bowlingbahn())->setName('Bahn 2');

        return (new BowlingbahnenList())
            ->addBowlingbahn($bowlingbahn1)
            ->addBowlingbahn($bowlingbahn2);
    }
}