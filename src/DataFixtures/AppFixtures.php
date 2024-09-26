<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
              $article = new Article();
         $article
             ->setTitle($faker->words(5, true))
            ->setContent($faker->text(2000))
            ->setPremium($faker->boolean(70))
            ->setAuthor($faker->name());

         $manager->persist($article);
        }

        

       $manager->flush();
    }
}
