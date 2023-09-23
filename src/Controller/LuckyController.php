<?php

namespace App\Controller;

use App\Generator\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    public function __construct(private readonly MessageGenerator $messageGenerator)
    {
    }

    public function number(): Response
    {
        $number = random_int(0, 100);

        dump($this->messageGenerator->getMessage());
        dump($this->getParameter('router.request_context.host'));

        return $this->render('@admin/lucky/index.html.twig', [
            'number' => $number,
        ]);
    }

    public function showNumber($id): Response
    {
        return new Response('Show number: '.$id);
    }

    #[Route('/lucky/number/again/{id}', priority: 0)]
    public function showCustomNumber($id): Response
    {
        return new Response('Show Number: '.$id);
    }

    #[Route('/lucky/number/again/42', name: 'app_lucky_universe', priority: 1)]
    public function showUniverse(Request $request): Response
    {
        $routeName = $request->attributes->get('_route');
        $routeParams = $request->attributes->get('_route_params');

        $all = $request->attributes->all();

        return new Response('Show number: Universe');
    }
}
