<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Message;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MessageFixtures extends Fixture
{
    public const MAX_MESSAGES = 5;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $ifree2 = 4;
        for ($i = 0; $i < self::MAX_MESSAGES; $i++) {
            $message = new Message();
            $message->setSubject($faker->sentence());
            $message->setSentdate($faker->dateTime());
            $message->setMessage($faker->paragraph(2));
            $message->setFromFreelancer($this->getReference('freelancer_' . $i));
            $message->setToFreelancer($this->getReference('freelancer_' . $ifree2));
            $message->setEmail($this->getReference('user_' . $ifree2));
            $ifree2--;
            $manager->persist($message);
            $this->addReference('message' . $i, $message);
        }
        $manager->flush();
    }
}
