<?php
declare(strict_types=1);

namespace App\Controller;

use App\Events\DTO\VideoCreated;
use App\Events\VideoCreatedEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Routing\Annotation\Route;

final class VideoCreatorController extends AbstractController
{
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /** @Route("/video/create", name="create-video") */
    public function createVideo()
    {
        $this->eventDispatcher->dispatch(
            new VideoCreatedEvent(
                new VideoCreated(27, 'Title', 42)
            ),
            'video.created.event'
        );
    }
}