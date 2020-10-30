<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        $gifts = [
            'flowers',
            'car',
            'piano',
            'money',
            'flowers',
            'car',
            'piano',
            'money',
            'flowers',
            'car',
            'piano',
            'money'
        ];

        shuffle($gifts);


        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'gifts' => $gifts
        ]);
    }
}
