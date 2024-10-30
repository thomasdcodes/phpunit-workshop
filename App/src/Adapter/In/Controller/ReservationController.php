<?php

declare(strict_types=1);

namespace App\Adapter\In\Controller;

use App\Domain\Bowlingbahn\Port\ShowAvailableBowlingbahnenForTimeUseCase;
use App\Tests\Controller\ReservationControllerTest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @see ReservationControllerTest
 */
class ReservationController extends AbstractController
{
    public function __construct(
        private ShowAvailableBowlingbahnenForTimeUseCase $loadAvailableBowlingbahnenUseCase,
    )
    {
    }

    #[Route(path: '/reservation', name: 'reservation')]
    public function showReservations(): Response
    {
        return $this->render('reservation/show.html.twig', [
            'bowlingbahnen' => $this->loadAvailableBowlingbahnenUseCase->showBowlingbahnen(new \DateTime()),
        ]);
    }
}