<?php
declare(strict_types=1);

namespace App\Service;

use Psr\Log\LoggerInterface;

final class GiftService
{
    private array $gifts;
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->gifts =  [
            'flowers',
            'car',
            'piano',
            'money',
            'flowers',
            'car',
            'piano',
            'money',
            'flowers',
            'car',
            'piano',
            'money'
        ];
        $this->logger = $logger;
        $this->logger->info('Gifts were randomized');
    }

    public function getGifts(): array
    {
        return $this->shuffleGifts();
    }

    private function shuffleGifts(): array
    {
        shuffle($this->gifts);
        return $this->gifts;
    }
}