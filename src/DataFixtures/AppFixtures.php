<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create("fr_FR");

        for ($i = 0; $i < 10; $i++) {
            $product = new Product();

            $product->setName($faker->word());
            $product->setDescription($faker->sentence(2, true));
            $product->setUrlImage($faker->imageUrl());
            $product->setPrice($faker->randomFloat(2, 0, 100));

            $manager->persist($product);
        }

        // for ($i = 0; $i < 10; $i++) {
        //     $user = new User();

        //     $lastname = $faker->lastName();
        //     $firstname = $faker->firstName();

        //     $user->setName($lastname);
        //     $user->setFirstname($firstname);
        //     $user->setEmail("$firstname.$lastname@" . $faker->safeEmailDomain());
        //     $user->setPassword($faker->password(6));
        //     $user->setRegistrationDate(new DateTimeImmutable($faker->date("Y-m-d")));

        //     $manager->persist($user);
        // }


        $manager->flush();
    }
}
