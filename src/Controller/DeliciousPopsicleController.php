<?php

namespace App\Controller;

use App\Entity\DeliciousPopsicle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeliciousPopsicleController extends AbstractController
{
    #[Route('/delicious/popsicle', name: 'app_delicious_popsicle')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $deliciousPopsicle = new DeliciousPopsicle();
        $deliciousPopsicle->setName('Pizza Time');
        $deliciousPopsicle->setType('italian');

        $entityManager->persist($deliciousPopsicle);
        $entityManager->flush();

        return $this->render('delicious_popsicle/index.html.twig', [
            'controller_name' => 'DeliciousPopsicleController',
        ]);
    }
}
