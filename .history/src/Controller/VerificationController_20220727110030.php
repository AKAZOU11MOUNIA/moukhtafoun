<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VerificationController extends AbstractController
{
    #[Route('/verification', name: 'app_verification')]
    public function index(): Response
    {
        $session = $request->getSession();
        $data = $session->get('data');
        return $this->render('verification/index.html.twig', [
            'ville' => $data->getVilleActuelle(),
        ]);
    }
}
