<?php

namespace App\DataFixtures;

use App\Entity\History;
use App\DataFixtures\FreelancerFixtures;
use App\DataFixtures\ClientFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class HistoryFixtures extends Fixture implements DependentFixtureInterface
{
    public const MAX_HISTORY = 10;

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < self::MAX_HISTORY; $i++) {
            $history = new History();
            $history->setFreelancer($this->getReference('freelancer_' . rand(0, count(FreelancerFixtures::FREELANCERS) - 1)));
            $history->setClient($this->getReference('client_' . rand(0, count(ClientFixtures::CLIENT) - 1)));
            $history->setGig($this->getReference('gig_' . rand(0, count(GigFixtures::GIGS) - 1)));
            $history->setCreatedAt(\DateTime::createFromFormat('Y-m-d', "2021-06-01"));
            $manager->persist($history);
            $this->addReference('history_' . $i, $history);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            FreelancerFixtures::class,
            ClientFixtures::class,
            GigFixtures::class,
        ];
    }
}
