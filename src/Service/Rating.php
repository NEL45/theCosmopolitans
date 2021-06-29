<?php

namespace App\Service;

use App\Entity\Client;
use App\Repository\ClientRepository;
use App\Repository\CommentRepository;

class Rating
{

    public function calculateAvarage(int $rating1, int $rating2, int $rating3, int $rating4): float
    {

        $avarage = ($rating1 + $rating2 + $rating3 + $rating4) / 4;

        return $avarage;
    }
}
