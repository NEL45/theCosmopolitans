<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
     * @Route("/{username}", name="show")
     * @ParamConverter("user", class="App\Entity\User"),
     * options={"mapping": {"username": "username"}})
     */
    public function show(History $history, Comment $comment, Client $client, User $user): Response
    {
        $histories = $this->getDoctrine()
        ->getRepository(History::class)
        ->findBy([
            'user' => $user,
        ]);

        $comments = $this->getDoctrine()
        ->getRepository(Comment::class)
        ->findBy([
            'user' => $user,
        ]);

        return $this->render('profile_client/show.html.twig', [
            'histories' => $histories,
            'comments' => $comments,
        ]);
    }
}
