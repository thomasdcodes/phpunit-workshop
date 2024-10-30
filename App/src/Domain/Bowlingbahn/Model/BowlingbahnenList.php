<?php

declare(strict_types=1);

namespace App\Domain\Bowlingbahn\Model;

/**
 * @see BowlingbahnenListTest
 */
class BowlingbahnenList
{
    private array $bowlingbahnen = [];

    public function addBowlingbahn(Bowlingbahn $bowlingbahn): BowlingbahnenList
    {
        if (!in_array($bowlingbahn, $this->bowlingbahnen, true)) {
            $this->bowlingbahnen[] = $bowlingbahn;
        }

        return $this;
    }

    public function getBowlingbahnen(): array
    {
        return $this->bowlingbahnen;
    }
}