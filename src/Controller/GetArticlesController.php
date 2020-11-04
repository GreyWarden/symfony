<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class GetArticlesController extends AbstractController
{
    /**
     * @Route(
     *     "/articles/{_locale}/{year}/{slug}/{category}",
     *     defaults={"category": "computers"},
     *     requirements={
     *          "_locale":"es|en",
     *          "category":"computers|rol",
     *          "year":"\d+"
     *     },
     * )
     */
    public function getArticles()
    {
        return new Response('Ruta chachi');
    }
}