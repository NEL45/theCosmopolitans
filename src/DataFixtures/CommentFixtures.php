<?php

namespace App\DataFixtures;

use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\FreelancerFixtures;
use App\DataFixtures\ClientFixtures;
use App\Entity\Comment;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public const MAX_COMMENTS = 10;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
      
        for ($i = 0; $i < self::MAX_COMMENTS; $i++) {
            $comment = new Comment();
            $comment->setFreelance($this->getReference('freelancer_' . rand(0, count(FreelancerFixtures::FREELANCERS) - 1)));
            $comment->setClient($this->getReference('client_' . rand(0, count(ClientFixtures::CLIENT) - 1)));
            $comment->setReactivity(rand(1,5));
            $comment->setExplanation(rand(1,5));
            $comment->setCourtesy(rand(1,5));
            $comment->setRecommandation(rand(1,5));
            $comment->setComment($faker->paragraph(2));
           
            $comment->setCreatedAt(\DateTime::createFromFormat('Y-m-d', "2021-06-01"));
            
            $manager->persist($comment);
            $this->addReference('comment' . $i, $comment);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            FreelancerFixtures::class,
            ClientFixtures::class,
        ];
    }
}
