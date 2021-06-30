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
            $freelancer->setUser($this->getReference('user_' . $index, $freelancer));
            $freelancer->setFirstname($freelancerDetail['firstname']);
            $freelancer->setLastname($freelancerDetail['lastname']);
            $manager->persist($freelancer);
            $this->addReference('freelancer_' . $index, $freelancer);
        }

        $freelance = new Freelancer();
        $freelance ->setUser($this->getReference('jerry', $freelance));
        $freelance ->setFirstname('Ben');
        $freelance ->setLastname('Jerry');
        $manager->persist($freelance);
        
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
    
}
