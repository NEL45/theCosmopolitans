<?php

namespace App\DataFixtures;

use App\Entity\Freelancer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FreelancerFixtures extends Fixture
{
    public const FREELANCERS = [
        [
            'firstname' => 'Séverine',
            'lastname' => 'Coute',
            'email' => 'freelancer1@gmail.com',
            'password' => '123456',
        ],
        [
            'firstname' => 'Gersey',
            'lastname' => 'Stelmach',
            'email' => 'freelancer2@gmail.com',
            'password' => '123456',
        ],
        [
            'firstname' => 'Thuy',
            'lastname' => 'Dieu',
            'email' => 'freelancer3@gmail.com',
            'password' => '123456',
        ],
        [
            'firstname' => 'Joel',
            'lastname' => 'Fillion',
            'email' => 'freelancer4@gmail.com',
            'password' => '123456',

        ],
        [
            'firstname' => 'Nicolas',
            'lastname' => 'Weickert',
            'email' => 'freelancer5@gmail.com',
            'password' => '123456',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::FREELANCERS as $index => $freelancerDetail) {
            $freelancer = new Freelancer();
            $freelancer->setFirstname($freelancerDetail['firstname']);
            $freelancer->setLastname($freelancerDetail['lastname']);
            $freelancer->setEmail($freelancerDetail['email']);
            $freelancer->setPassword($freelancerDetail['password']);
            $manager->persist($freelancer);
            $this->addReference('freelancer_' . $index, $freelancer);
        }
        $manager->flush();
    }
}
