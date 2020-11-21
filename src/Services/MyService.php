<?php
declare(strict_types=1);

namespace App\Services;

use Psr\Log\LoggerInterface;

final class MyService
{
    use OptionalServiceTrait;

    public function __construct(LoggerInterface $logger)
    {
        $logger->info('Hello there desde el primer service');
    }
}