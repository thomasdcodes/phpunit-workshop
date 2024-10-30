<?php

namespace App\Domain\Bowlingbahn\Service;

use App\Domain\Bowlingbahn\Model\BowlingbahnenList;
use App\Domain\Bowlingbahn\Port\LoadAvailableBowlingbahnenPort;
use App\Domain\Bowlingbahn\Port\ShowAvailableBowlingbahnenForTimeUseCase;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @see ShowFreeBowlingbahnenForTimeServiceTest
 */
class ShowAvailableBowlingbahnenForTimeService implements ShowAvailableBowlingbahnenForTimeUseCase
{

    public function __construct(
        private LoadAvailableBowlingbahnenPort $loadAvailableBowlingbahnenPort,
    )
    {
    }

    public function showBowlingbahnen(\DateTimeInterface $reservationDateTime): BowlingbahnenList
    {
        if ($reservationDateTime->getTimestamp() < (new \DateTime())->getTimestamp()) {
            throw new \InvalidArgumentException('Das Datum sollte nicht in der Vergangenheit liegen');
        }

        return $this->loadAvailableBowlingbahnenPort->loadBowlingbahnenByTime($reservationDateTime);
    }
}