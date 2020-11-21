<?php
declare(strict_types=1);

namespace App\Services;

final class OnlineVideoUploaderService implements VideoUploaderServiceInterface
{
    public function __construct()
    {
        dump('Desde OnlineVideoUploaderService');
    }
}