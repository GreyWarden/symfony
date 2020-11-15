<?php
declare(strict_types=1);

namespace App\Service;

use Psr\Log\LoggerInterface;

final class MySecondService
{
    public function __construct(LoggerInterface $logger)
    {
        $logger->info('Hello there desde el second service');
    }
}