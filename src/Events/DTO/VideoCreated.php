<?php
declare(strict_types=1);

namespace App\Events\DTO;

final class VideoCreated
{
    private string $title;
    private int $duration;
    private int $id;

    public function __construct(int $id, string $title, int $duration)
    {
        $this->id = $id;
        $this->title = $title;
        $this->duration = $duration;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function getId(): int
    {
        return $this->id;
    }
}