<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        $users = ['Lau', 'Raúl', 'Nami', 'Lila'];
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'names' => $users,
        ]);
    }
}
