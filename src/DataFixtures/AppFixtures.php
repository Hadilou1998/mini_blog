<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Créer 50 articles fictifs
        $articles = [];

        for ($i = 0; $i < 50; $i++) {
            $articles = new Article();
            $articles->setTitle('Article ' . $i);
            $articles->setContent('Contenu de l\'article ' . $i);
            $articles->setPremium(false);
            $articles->setAuthor('Auteur ' . $i)
            ;
            $manager->persist($articles);
        }

        $manager->flush();
    }
}
