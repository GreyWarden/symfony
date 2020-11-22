<?php

namespace App\EventSubscriber;

use App\Events\VideoCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class VideoCreatedSubscriber implements EventSubscriberInterface
{
    public function onVideoCreatedEvent(VideoCreatedEvent $event): void
    {
        dump('Desde el subscriber');
        dump('Id: ' . $event->getId());
        dump('Title: ' . $event->getTitle());
        dump('Duration: ' . $event->getDuration());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'video.created.event' => 'onVideoCreatedEvent',
        ];
    }
}
