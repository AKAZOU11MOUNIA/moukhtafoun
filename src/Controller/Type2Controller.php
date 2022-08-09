<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Type2Controller extends AbstractController
{
    #[Route('/type2', name: 'app_type2')]
    public function index(): Response
    {
        return $this->render('type2/index.html.twig', [
            'controller_name' => 'Type2Controller',
        ]);
    }
}
