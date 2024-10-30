<?php

namespace App\Tests\Controller;

use App\Controller\ReservationController;
use App\Domain\Bowlingbahn\Port\LoadAvailableBowlingbahnenPort;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Twig\Environment;

class ReservationControllerTest extends TestCase
{
    public function testCanInit(): void
    {
        $portStub = $this->createStub(LoadAvailableBowlingbahnenPort::class);
        $controller = new ReservationController($portStub);

        $this->assertInstanceOf(ReservationController::class, $controller);
    }

    public function testCanCallShowReservation(): void
    {
        // Arrange
        $portMock = $this->createMock(LoadAvailableBowlingbahnenPort::class);

        $twigMock = $this->createMock(Environment::class);

        $containerMock = $this->createMock(ContainerInterface::class);
        $containerMock->method('has')->with('twig')->willReturn(true);
        $containerMock->method('get')->with('twig')->willReturn($twigMock);

        $controller = new ReservationController($portMock);
        $controller->setContainer($containerMock);

        // Expect
        $portMock->expects($this->once())->method('loadBowlingbahnenByTime');
        $twigMock->expects($this->once())->method('render');

        // Act
        $controller->showReservations();
    }
}
