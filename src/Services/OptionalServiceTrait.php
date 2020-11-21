<?php
declare(strict_types=1);

namespace App\Services;

use Psr\Log\LoggerInterface;

trait OptionalServiceTrait
{
    /** @required  */
    public function setService(LoggerInterface $logger, MySecondService $secondService)
    {
        $logger->info('Service', [$secondService]);
    }
}