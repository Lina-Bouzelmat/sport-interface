<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UtilisatricesController extends AbstractController
{
    #[Route('/utilisatrices', name: 'app_utilisatrices')]
    public function index(): Response
    {
        return $this->render('utilisatrices/index.html.twig', [
            'controller_name' => 'UtilisatricesController',
        ]);
    }
}
