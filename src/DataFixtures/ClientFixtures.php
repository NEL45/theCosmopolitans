<?php

namespace App\DataFixtures;

use App\DataFixtures\LevelFixtures;
use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ClientFixtures extends Fixture implements DependentFixtureInterface
{
    public const CLIENT = [
        [
            'firstname' => 'Britney',
            'lastname' => 'Spears',
        ],
        [
            'firstname' => 'Angelina',
            'lastname' => 'Jolie',
        ],
        [
            'firstname' => 'Albert',
            'lastname' => 'Einstein',
        ],
        [
            'firstname' => 'Bill',
            'lastname' => 'Gates',
        ],
        [
            'firstname' => 'Donald',
            'lastname' => 'Trump',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CLIENT as $index => $clientDetails) {
            $client = new Client();
            $client->setUser($this->getReference('user_' . $index, $client));
            $client->setFirstname($clientDetails['firstname']);
            $client->setLastname($clientDetails['lastname']);
            $client->setLevel($this->getReference('level1'));
            $manager->persist($client);
            $this->addReference('client_' . $index, $client);
        }

        $client = new Client();
        $client->setUser($this->getReference('ducasse', $client));
        $client->setFirstname('Alain');
        $client->setLastname('Ducasse');
        $client->setLevel($this->getReference('level1'));
        $manager->persist($client);
       
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            LevelFixtures::class,
        ];
    }
}
