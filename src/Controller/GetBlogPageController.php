<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class GetBlogPageController extends AbstractController
{
    /**
     * @Route("/blog/{page?}", name="blog_list", requirements={"page"="\d+"})
     */
    public function getBlogPage(): Response
    {
        $cookie = new Cookie(
            'a_cookie',
            'hello there!',
            time() + (2 * 365 * 24 * 3600)
        );

        $response = new Response('Hello there');
        $response->headers->setCookie($cookie);
        return $response;
    }
}