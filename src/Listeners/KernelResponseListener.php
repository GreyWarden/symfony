<?php
declare(strict_types=1);

namespace App\Listeners;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

final class KernelResponseListener
{
    public function onKernelResponse(ResponseEvent $event)
    {
        $newResponse = new Response('Hello there');
        $event->setResponse($newResponse);
    }
}