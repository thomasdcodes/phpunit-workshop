<?php

declare(strict_types=1);

namespace App\Domain\Bowlingbahn\Service;

use App\Domain\Bowlingbahn\Model\BowlingbahnenList;
use App\Domain\Bowlingbahn\Port\LoadAvailableBowlingbahnenPort;
use PHPUnit\Framework\TestCase;

class ShowFreeBowlingbahnenForTimeServiceTest extends TestCase
{
    private ?LoadAvailableBowlingbahnenPort $loadingPort = null;
    private ?ShowAvailableBowlingbahnenForTimeService $showBowlingbahnenForTimeService = null;

    protected function setUp(): void
    {
        $this->loadingPort = $this->createStub(LoadAvailableBowlingbahnenPort::class);
        $this->showBowlingbahnenForTimeService = new ShowAvailableBowlingbahnenForTimeService($this->loadingPort);
    }

    protected function tearDown(): void
    {
        $this->loadingPort = null;
        $this->showBowlingbahnenForTimeService = null;
    }

    public function testCanInit(): void
    {
        $this->assertInstanceOf(ShowAvailableBowlingbahnenForTimeService::class, $this->showBowlingbahnenForTimeService);
    }

    public function testCanCallShowBowlingbahnen(): void
    {
        $bowlingbahnenList = $this->showBowlingbahnenForTimeService->showBowlingbahnen(new \DateTime());

        $this->assertInstanceOf(BowlingbahnenList::class, $bowlingbahnenList);
    }

    public function testShowBowlingbahnenCallsPort(): void
    {
        $loadingPort = $this->createMock(LoadAvailableBowlingbahnenPort::class);
        $loadingPort->expects($this->once())->method('loadBowlingbahnenByTime');

        $showBowlingbahnenForTimeService = new ShowAvailableBowlingbahnenForTimeService($loadingPort);

        $showBowlingbahnenForTimeService->showBowlingbahnen(new \DateTime());
    }

    public function testGetExceptionWithHistoryDate(): void
    {
        $loadingPort = $this->createStub(LoadAvailableBowlingbahnenPort::class);
        $showBowlingbahnenForTimeService = new ShowAvailableBowlingbahnenForTimeService($loadingPort);

        $this->expectException(\InvalidArgumentException::class);

        $showBowlingbahnenForTimeService->showBowlingbahnen(\DateTime::createFromFormat('Y-m-d', '2000-01-01'));
    }
}
