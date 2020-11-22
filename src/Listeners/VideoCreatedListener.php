<?php
declare(strict_types=1);

namespace App\Listeners;

use App\Events\VideoCreatedEvent;
use Psr\Log\LoggerInterface;

final class VideoCreatedListener
{
    public function onVideoCreatedEvent(VideoCreatedEvent $event)
    {
        dump('Desde el listener');
        dump('Id: ' . $event->getId());
        dump('Title: ' . $event->getTitle());
        dump('Duration: ' . $event->getDuration());
    }
}