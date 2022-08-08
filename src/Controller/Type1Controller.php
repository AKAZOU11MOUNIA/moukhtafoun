<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Type1Controller extends AbstractController
{
    #[Route('/type1', name: 'app_type1')]
    public function index(): Response
    {
        return $this->render('type1/index.html.twig', [
            'controller_name' => 'Type1Controller',
        ]);
    }
}
