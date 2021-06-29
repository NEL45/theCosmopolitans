<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HistoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        

        $manager->flush();
    }
}
