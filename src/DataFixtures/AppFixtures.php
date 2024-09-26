<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        // Créer 50 articles fictifs
        for ($i = 0; $i < 50; $i++) {
            $article = new Article();
            $article->setTitle($faker->sentence(5)); // Génère un titre aléatoire
            $article->setContent($faker->paragraph(5)); // Génère un contenu aléatoire
            $article->setAuthor($faker->name); // Génère un auteur aléatoire
            $article->setPremium($faker->boolean(20)) // 20% de chance que l'article soit premium
            ;
            $manager->persist($article);
        }

        $manager->flush();
    }
}
