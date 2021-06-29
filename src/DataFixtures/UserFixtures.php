<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Client;
use App\Entity\Freelancer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const MAX_USERS = 5;
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i <= self::MAX_USERS; $i++) {
            $user = new User();
            $user->setUsername($faker->name());
            $user->setEmail('email' . $i . '@gmail.com');
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'user'
            ));
            $manager->persist($user);
            $this->addReference('user_' . $i, $user);
        }


        // Création d’un utilisateur de type “user”
        $user = new User();
        $user->setUsername('user1234');
        $user->setEmail('thomas.dutronc@yahoo.fr');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'dutronc'
        ));

        $manager->persist($user);

        // Création d’un utilisateur de type “client”
        $client = new User();
        $client->setUsername('client1234');
        $client->setEmail('alain.ducasse@gmail.com');
        $client->setRoles(['ROLE_USER']);
        $client->setPassword($this->passwordEncoder->encodePassword(
            $client,
            'ducasse'
        ));
        $manager->persist($client);

        // Création d’un utilisateur de type “freelance”
        $freelance = new User();
        $freelance->setUsername('freelancer1234');
        $freelance->setEmail('ben.jerry@yahoo.fr');
        $freelance->setRoles(['ROLE_USER']);
        $freelance->setPassword($this->passwordEncoder->encodePassword(
            $freelance,
            'jerry'
        ));
        $manager->persist($freelance);
        $manager->flush();
    }
}
