<?php

namespace App\Controller;

use App\Enum\OrderStatus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrdersController extends AbstractController
{
    #[Route('/orders', name: 'app_orders')]
    public function index(): Response
    {
        return $this->render('orders/index.html.twig', [
            'controller_name' => 'OrdersController',
        ]);
    }

    #[Route('/orders/{status}')]
    public function showByStatus(OrderStatus $status = OrderStatus::COMPLETED): Response
    {
        return new Response("Order Status: $status->value");
    }
}
