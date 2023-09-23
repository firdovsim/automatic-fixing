<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Twig\Loader\LoaderInterface;

class TemplateEngineController extends AbstractController
{
    private LoaderInterface $loader;

    public function __construct(private readonly Environment $twig)
    {
        $this->loader = $this->twig->getLoader();
    }

    #[Route('/template/engine', name: 'app_template_engine')]
    #[Template('template_engine/index.html.twig')]
    public function index(): array
    {
        return [
            'name' => 'Template Engine',
        ];
    }

    #[Route(path: '/template/engine/show', name: 'app_template_engine_show')]
    public function show(): Response
    {
        $template = $this->twig->render('template_engine/show.html.twig', [
            'name' => 'Show Engine',
        ]);

        return new Response($template);
    }

    #[Route(path: '/template/engine/check', name: 'app_template_engine_check')]
    public function check(): NotFoundHttpException|Response
    {
        if (! $this->loader->exists('template_engine/index.html.twig')) {
            return $this->createNotFoundException('Template does not exist');
        }

        dump('Nothing Special');

        $template = $this->twig->render('template_engine/index.html.twig', [
            'name' => 'Twig Loader',
        ]);

        return new Response($template);
    }
}
