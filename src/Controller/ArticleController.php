<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route(path: '/load/articles', name: 'app_load_articles')]
    public function recentArticles(int $max = 3): Response
    {
        $articles = [
            ['id' => 1, 'name' => 'Ukraine News'],
            ['id' => 2, 'name' => 'Today in USA'],
            ['id' => 3, 'name' => 'Working Day'],
        ];

        return $this->render('article/_recent.html.twig', [
            'articles' => $articles,
        ]);
    }
}
