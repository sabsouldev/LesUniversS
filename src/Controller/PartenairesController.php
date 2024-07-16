<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PartenairesController extends AbstractController
{
    #[Route('/partenaires/', name: 'partenaires.show')]
    public function show(): Response
    {
        return $this->render('partenaires/show.html.twig', [
            'controller_name' => 'PartenairesController',
        ]);
    }
}
