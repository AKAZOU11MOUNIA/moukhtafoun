<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoukhtafounController extends AbstractController
{
    #[Route('/', name: 'app_moukhtafoun')]
    public function index1(): Response
    {
        return $this->render('moukhtafoun/index.html.twig');
    } 
    
}