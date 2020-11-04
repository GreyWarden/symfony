<?php
declare(strict_types=1);

namespace App\Service;

final class GiftService
{
    private array $gifts;

    public function __construct()
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