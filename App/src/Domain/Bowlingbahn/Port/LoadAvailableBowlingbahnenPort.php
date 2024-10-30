<?php

namespace App\Domain\Bowlingbahn\Port;

use App\Domain\Bowlingbahn\Model\BowlingbahnenList;

interface LoadAvailableBowlingbahnenPort
{
    public function loadBowlingbahnenByTime(\DateTimeInterface $time): BowlingbahnenList;
}