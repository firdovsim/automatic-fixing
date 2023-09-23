<?php

namespace App\Controller;

use App\Service\SiteUpdateManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotificationController extends AbstractController
{
    public function __construct(protected readonly SiteUpdateManager $manager)
    {
    }

    #[Route('/notification', name: 'app_notification')]
    public function index(): Response
    {
        $this->manager->notifyEverybody();

        exit;

        return new Response('Notify Everybody');
    }
}
