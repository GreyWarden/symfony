<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftService;
use App\Services\VideoUploaderServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private GiftService $giftService;
    private VideoUploaderServiceInterface $videoUploaderService;

    public function __construct(GiftService $giftService, VideoUploaderServiceInterface $videoUploaderService)
    {
        $this->giftService = $giftService;
        $this->videoUploaderService = $videoUploaderService;
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'General Controlly',
            'users' => $users,
            'gifts' => $this->giftService->getGifts()
        ]);
    }
}
