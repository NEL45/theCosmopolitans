<?php

namespace App\DataFixtures;

use App\Entity\Freelancer;
use App\DataFixtures\UserFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FreelancerFixtures extends Fixture implements DependentFixtureInterface
{
    public const FREELANCERS = [
        [
            'firstname' => 'Séverine',
            'lastname' => 'Coute',
        ],
        [
            'firstname' => 'Gersey',
            'lastname' => 'Stelmach',
        ],
        [
            'firstname' => 'Thuy',
            'lastname' => 'Dieu',
        ],
        [
            'firstname' => 'Joel',
            'lastname' => 'Fillion',
        ],
        [
            'firstname' => 'Nicolas',
            'lastname' => 'Weickert',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::FREELANCERS as $index => $freelancerDetail) {
            $freelancer = new Freelancer();
            $freelancer->setUser($this->getReference('user_'. rand(0,UserFixtures::MAX_USERS - 1)));
            $freelancer->setFirstname($freelancerDetail['firstname']);
            $freelancer->setLastname($freelancerDetail['lastname']);
            
            $manager->persist($freelancer);
            $this->addReference('freelancer_' . $index, $freelancer);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
    
}
