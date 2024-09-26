<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_articles')]
    public function index(ArticleRepository $articles): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles->findBy(
                [],
                ['created_at' => 'DESC'],
            )
        ]);
    }

    #[Route('/article/{id}', name: 'article_show', methods: ['GET'])]
    public function show(ArticleRepository $articles, $id): Response
    {
        return $this->render('article/show.html.twig', [
            'articles' => $articles->findOneBy(
                ['id' => $id],
            )
        ]);
    }
}
