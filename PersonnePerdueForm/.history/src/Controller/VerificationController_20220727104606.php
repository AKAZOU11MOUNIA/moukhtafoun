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
        $session = new Session();
        $session->start();
        $data = $session->get('data');
        print($data->getVilleActuelle());
        
    }
}
