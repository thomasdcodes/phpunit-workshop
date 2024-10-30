<?php

namespace App\Service\Database\Bowlingbahn;

use App\Domain\Bowlingbahn\Model\BowlingbahnenList;

interface BowlingbahnConnectionInterface
{
    public function loadAll(): array;
}