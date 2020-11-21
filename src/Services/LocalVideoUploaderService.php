<?php
declare(strict_types=1);

namespace App\Services;

final class LocalVideoUploaderService implements VideoUploaderServiceInterface
{
    public function __construct()
    {
        dump('Desde LocalVideoUploaderService');
    }
}