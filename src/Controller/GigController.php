<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Comment;
use App\Entity\History;
use App\Form\CommentType;
use App\Entity\Freelancer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class GigController extends AbstractController
{
    /**
     * @Route("/gigs/{freelancer_id}", name="freelancer_gigs", methods={"GET", "POST"})
     * @ParamConverter("freelancer", class="App\Entity\Freelancer", options={"mapping": {"freelancer_id": "id"}})
     */
    public function showGigs(Freelancer $freelancer): Response
    {

        $histories = $this->getDoctrine()
            ->getRepository(History::class)
            ->findBy([
                'freelancer' => $freelancer,
            ]);

        return $this->render('client_review/index.html.twig', [
            'freelancer' => $freelancer,
            'histories' => $histories,
        ]);
    }

    /**
     * @Route("/reviewClient/{freelancer_id}/{client_id}", name="review_client", methods={"GET", "POST"})
     * @ParamConverter("freelancer", class="App\Entity\Freelancer", options={"mapping": {"freelancer_id": "id"}})
     * @ParamConverter("client", class="App\Entity\Client", options={"mapping": {"client_id": "id"}})
     */
    public function reviewClient(Request $request, Freelancer $freelancer, Client $client): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        $comment->setClient($client);
        $comment->setFreelance($freelancer);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
            $this->addFlash('success', 'Thank you! Your review was sent!');
            return $this->redirect($request->getUri());
        }


        return $this->render('client_review/review_client.html.twig', [
            'freelancer' => $freelancer,
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }
}
