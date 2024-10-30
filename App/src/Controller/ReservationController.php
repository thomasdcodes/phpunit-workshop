<?php

namespace App\Controller;

use App\Domain\Bowlingbahn\Port\LoadAvailableBowlingbahnenPort;
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
        private LoadAvailableBowlingbahnenPort $loadAvailableBowlingbahnenPort,
    )
    {
    }

    #[Route(path: '/reservation', name: 'reservation')]
    public function showReservations(): Response
    {
        return $this->render('reservation/show.html.twig', [
            'bowlingbahnen' => $this->loadAvailableBowlingbahnenPort->loadBowlingbahnenByTime(new \DateTime()),
        ]);
    }
}