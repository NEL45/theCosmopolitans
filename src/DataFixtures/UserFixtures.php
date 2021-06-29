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
    public const USERS = 10;
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        // Création d’un utilisateur de type “user”
        $user = new User();
        $user->setEmail('thomas.dutronc@yahoo.fr');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'dutronc'
        ));

        $manager->persist($user);

        // Création d’un utilisateur de type “client”
        $client = new User();
        $client->setEmail('alain.ducasse@gmail.com');
        $client->setRoles(['ROLE_USER']);
        $client->setPassword($this->passwordEncoder->encodePassword(
            $client,
            'ducasse'
        ));
        $manager->persist($client);

        // Création d’un utilisateur de type “freelance”
        $freelance = new User();
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
