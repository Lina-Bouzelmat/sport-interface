<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Form\AbonnementType;
use App\Repository\AbonnementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AbonnementController extends AbstractController
{
    #[Route('/abonnement', name: 'abonnement_index')]
    public function index(Request $request,EntityManagerInterface $entityManager): Response
    {
        $abonnement = new Abonnement();

        // Crée le formulaire
        $form = $this->createForm(AbonnementType::class, $abonnement);

        // Gère la requête pour le formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Logique de sauvegarde (si nécessaire)
            //$entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($abonnement);
            $entityManager->flush();

            // Redirection après soumission
            return $this->redirectToRoute('abonnement_index');
        }

        return $this->render('abonnement/index.html.twig', [
            'form' => $form->createView(), // Passe le formulaire à la vue
        ]);
    }

    #[Route('/abonnement/new', name: 'abonnement_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $abonnement = new Abonnement();
        // Créer un formulaire basé sur AbonnementType
        $form = $this->createForm(AbonnementType::class, $abonnement);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($abonnement);
            $entityManager->flush();
            return $this->redirectToRoute('abonnement_index');
        }
        return $this->render('abonnement/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}