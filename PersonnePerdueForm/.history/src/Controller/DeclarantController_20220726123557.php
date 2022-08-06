<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeclarantController extends AbstractController
{
    #[Route('/declarant', name: 'app_declarant')]
    public function index(): Response
    {
        return $this->render('declarant/index.html.twig', [
            'controller_name' => 'DeclarantController',
        ]);
    }
}
