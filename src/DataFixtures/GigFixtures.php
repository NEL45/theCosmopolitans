<?php

namespace App\DataFixtures;

use App\Entity\Gig;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GigFixtures extends Fixture
{
    public const GIGS = ['Website design', 'Web programming ', 'Logo Design', 'Mobile Apps', 'Video editing'];

    public function load(ObjectManager $manager)
    {
        foreach (self::GIGS as $index => $data) {
            $gig = new Gig();
            $gig->setName($data);
            $manager->persist($gig);
            $this->addReference('gig_' . $index, $gig);
        }

        $manager->flush();
    }
}
