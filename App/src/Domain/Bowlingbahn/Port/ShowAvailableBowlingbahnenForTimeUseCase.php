<?php

declare(strict_types=1);

namespace App\Domain\Bowlingbahn\Port;

use App\Domain\Bowlingbahn\Model\BowlingbahnenList;

interface ShowAvailableBowlingbahnenForTimeUseCase
{
    public function showBowlingbahnen(\DateTimeInterface $reservationDateTime): BowlingbahnenList;
}