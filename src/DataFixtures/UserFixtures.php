<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Generator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{   
    public const MAX_USERS = 10;
    private $passwordEncoder;
    private Generator $faker;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 1; $i <= self::MAX_USERS; $i++) {
            $user = new User();
            $user->setUsername($faker->name());
            $user->setEmail('email' .$i . '@gmail.com');
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'user'
            ));
            $manager->persist($user);
            $this->addReference('user_' . $i, $user);
        }

    }
}
