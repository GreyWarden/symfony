<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftService;
use App\Services\VideoUploaderServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class DefaultController extends AbstractController
{
    private GiftService $giftService;
    private VideoUploaderServiceInterface $videoUploaderService;
    private FilesystemAdapter $cache;

    public function __construct(GiftService $giftService, VideoUploaderServiceInterface $videoUploaderService)
    {
        $this->giftService = $giftService;
        $this->videoUploaderService = $videoUploaderService;
        $this->cache = new FilesystemAdapter();
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        $posts = $this->cache->getItem('database.get_posts');
        if(!$posts->isHit()) {
            $postsFromDB = ['post1', 'post2', 'post3'];
            $posts->set(serialize($postsFromDB));
            $posts->expiresAfter(5);
            $this->cache->save($posts);
        }
        dump(unserialize($posts->get()));

        return $this->render('default/index.html.twig', [
            'controller_name' => 'General Controlly',
            'users' => $users,
            'gifts' => $this->giftService->getGifts()
        ]);
    }
}
