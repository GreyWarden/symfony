<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftService;
use App\Services\MyService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private GiftService $giftService;
    private SessionInterface $session;
    private LoggerInterface $logger;
    private MyService $service;

    public function __construct(
        GiftService $giftService,
        SessionInterface $session,
        LoggerInterface $logger,
        MyService $service
    ) {
        $this->giftService = $giftService;
        $this->session = $session;
        $this->logger = $logger;
        $this->service = $service;
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        $this->addFlash('notice', 'Cosas hechas!');
        $this->addFlash('warning', 'Cosas no hechas!');
        $this->session->set('name', 'hello there');

        if ($this->session->has('name')) {
            $this->logger->info($this->session->get('name'));
        }

        return $this->render('default/index.html.twig', [
            'controller_name' => 'General Controlly',
            'users' => $users,
            'gifts' => $this->giftService->getGifts()
        ]);
    }
}
