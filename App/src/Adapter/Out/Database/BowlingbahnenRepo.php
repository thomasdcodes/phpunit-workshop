<?php

namespace App\Adapter\Out\Database;

use App\Domain\Bowlingbahn\Model\BowlingbahnenList;
use App\Domain\Bowlingbahn\Port\LoadAvailableBowlingbahnenPort;
use App\Service\Database\Bowlingbahn\BowlingbahnConnectionInterface;

class BowlingbahnenRepo implements LoadAvailableBowlingbahnenPort
{
    public function __construct(
        private BowlingbahnConnectionInterface $connection
    )
    {
    }

    public function loadBowlingbahnenByTime(\DateTimeInterface $time): BowlingbahnenList
    {
        $result = $this->connection->loadAll();
        return BowlingbahnenList::createByDBResult($result);
    }
}