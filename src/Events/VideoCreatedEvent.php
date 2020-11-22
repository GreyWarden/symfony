<?php
declare(strict_types=1);

namespace App\Events;

use App\Events\DTO\VideoCreated;
use Symfony\Contracts\EventDispatcher\Event;

final class VideoCreatedEvent extends Event
{
    private VideoCreated $videoCreated;

    public function __construct(VideoCreated $videoCreated)
    {
        $this->videoCreated = $videoCreated;
    }

    public function getTitle(): string
    {
        return $this->videoCreated->getTitle();
    }

    public function getDuration(): int
    {
        return $this->videoCreated->getDuration();
    }

    public function getId(): int
    {
        return $this->videoCreated->getId();
    }
}