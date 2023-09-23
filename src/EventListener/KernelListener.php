<?php

namespace App\EventListener;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\KernelEvent;

#[AsEventListener]
final class KernelListener
{
    public function __construct(protected LoggerInterface $logger)
    {
    }

    public function __invoke(KernelEvent $event): void
    {
        $this->logger->debug('KernelListener');
    }
}
