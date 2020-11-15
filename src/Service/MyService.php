<?php
declare(strict_types=1);

namespace App\Service;

use Psr\Log\LoggerInterface;

final class MyService
{
    public function __construct(LoggerInterface $logger, MySecondService $secondService)
    {
        $logger->info('Hello there desde el primer service');
    }
}