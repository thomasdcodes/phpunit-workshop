<?php

namespace App\Tests\Controller;

use App\Domain\Bowlingbahn\Port\LoadAvailableBowlingbahnenPort;
use App\Adapter\In\Controller\ReservationController;
use App\Domain\Bowlingbahn\Port\ShowAvailableBowlingbahnenForTimeUseCase;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Twig\Environment;

class ReservationControllerTest extends TestCase
{
    public function testCanInit(): void
    {
        $useCaseStub = $this->createStub(ShowAvailableBowlingbahnenForTimeUseCase::class);
        $controller = new ReservationController($useCaseStub);

        $this->assertInstanceOf(ReservationController::class, $controller);
    }

    public function testCanCallShowReservation(): void
    {
        // Arrange
        $useCaseMock = $this->createMock(ShowAvailableBowlingbahnenForTimeUseCase::class);

        $twigMock = $this->createMock(Environment::class);

        $containerMock = $this->createMock(ContainerInterface::class);
        $containerMock->method('has')->with('twig')->willReturn(true);
        $containerMock->method('get')->with('twig')->willReturn($twigMock);

        $controller = new ReservationController($useCaseMock);
        $controller->setContainer($containerMock);

        // Expect
        $useCaseMock->expects($this->once())->method('showBowlingbahnen');
        $twigMock->expects($this->once())->method('render');

        // Act
        $controller->showReservations();
    }
}
