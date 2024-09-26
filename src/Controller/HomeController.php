<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(ArticleRepository $articles): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'articles' => $articles->findBy(
                [],
                ['created_at' => 'DESC'],
                6
            )
        ]);
    }

    #[Route('/show', name: 'article_index', methods: ['GET'])]
    public function show(ArticleRepository $articles): Response
    {
        return $this->render('home/show.html.twig', [
            'allArticles' => $articles->findBy(
                [],
                ['created_at' => 'DESC'],
                6
            )
        ]);
    }
}