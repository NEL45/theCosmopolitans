<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Service\Rating;
use App\Entity\Client;
use App\Entity\History;
use App\Entity\Comment;
use App\Entity\User;

/**
 * @Route("/profile", name="profile_")
 */
class ProfileController extends AbstractController
{
     /**
     * @Route("/{client_id}", name="show")
     * @ParamConverter("client", class="App\Entity\Client", options={"mapping": {"client_id": "id"}})
     */
    public function show(Client $client, Rating $rating, Comment $comment): Response
    {
        $histories = $this->getDoctrine()
        ->getRepository(History::class)
        ->findBy([
            'client' => $client,
        ]);

        $comments = $this->getDoctrine()
        ->getRepository(Comment::class)
        ->findBy([
            'client' => $client,
        ]);

       

        return $this->render('profile/show.html.twig', [
            'histories' => $histories,
            'comments' => $comments,
            'client' => $client,
        ]);
    }
}
