<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProcessController extends AbstractController
{
    #[Route('/process', name: 'app_process')]
    public function index(): Response
    {
        return $this->render('process/index.html.twig');
    }

    public function process(): void
    {
    }
}
