<?php

namespace App;

use App\Generator\NotificationMessage;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Annotation\Route;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function __construct(string $environment, bool $debug)
    {
        parent::__construct($environment, $debug);
    }

    #[Route('/loading', name: 'app_loading', methods: ['GET', 'POST'])]
    public function loading(NotificationMessage $message): Response
    {
        $message->sendMessage();

        return new Response('Status: loading');
    }

    public function getBundles(): array
    {
        return parent::getBundles(); // TODO: Change the autogenerated stub
    }
}
