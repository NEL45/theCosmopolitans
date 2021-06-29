<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ClientRepository;
use App\Repository\HistoryRepository;
use App\Entity\Client;

class ProfileClientController extends AbstractController
{
    /**
     * @Route("/profile/client", name="profile_client")
     */
    public function index(HistoryRepository $historyRepository): Response
    {
        return $this->render('profile_client/index.html.twig', [
            'histories' => $historyRepository->findAll(),
        ]);
    }
}
