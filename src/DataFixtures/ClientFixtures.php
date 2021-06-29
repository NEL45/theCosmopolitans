<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ClientFixtures extends Fixture implements DependentFixtureInterface
{
    private const CLIENT = [
        [
            'firstname' => 'Britney',
            'lastname' => 'Spears',
            'email' => 'client1@gmail.com',
            'password' => '123456',
        ],
        [
            'firstname' => 'Angelina',
            'lastname' => 'Jolie',
            'email' => 'client2@gmail.com',
            'password' => '123456',
        ],
        [
            'firstname' => 'Albert',
            'lastname' => 'Einstein',
            'email' => 'client3@gmail.com',
            'password' => '123456',
        ],
        [
            'firstname' => 'Bill',
            'lastname' => 'Gates',
            'email' => 'client4@gmail.com',
            'password' => '123456',
        ],
        [
            'firstname' => 'Donald',
            'lastname' => 'Trump',
            'email' => 'client5@gmail.com',
            'password' => '123456',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CLIENT as $index => $clientDetails) {
            $client = new Client();
            $client->setFirstname($clientDetails['firstname']);
            $client->setLastname($clientDetails['lastname']);
            $client->setEmail($clientDetails['email']);
            $client->setPassword($clientDetails['password']);
           // $client->setLevel($this->getReference('level1'));
            $manager->persist($client);
            $this->addReference('client_' . $index, $client);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            LevelFixtures::class,
        ];
    }
}
