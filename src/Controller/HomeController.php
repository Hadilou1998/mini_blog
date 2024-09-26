<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ArticleRepository $articles, UrlGeneratorInterface $urlGenerator): Response
    {
        $articleIndexRoute = $this->generateUrl('article_index');
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'articles' => $articles->findBy(
                [],
                ['created_at' => 'DESC'],
                6
            ),
            'articleIndexRoute' => $articleIndexRoute
        ]);
    }
}