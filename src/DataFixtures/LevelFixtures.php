<?php

namespace App\DataFixtures;

use App\Entity\Level;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LevelFixtures extends Fixture
{
    public const LEVELS = ['Level 1', 'Level 2', 'Level 3'];

    public function load(ObjectManager $manager)
    {
        foreach (self::LEVELS as $index => $data) {
            $level = new Level();
            $level->setName($data);
            $manager->persist($level);
            $this->addReference('level_' . $index, $level);
        }

        $manager->flush();
    }
}
