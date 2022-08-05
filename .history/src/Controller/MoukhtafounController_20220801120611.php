<?php

namespace App\Controller;

use App\Entity\PersonnePerdue;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MoukhtafounController extends AbstractController
{
    #[Route('/', name: 'app_moukhtafoun')]
    
    public function index(ManagerRegistry $doctrine): Response
    { 
        $wls =$doctrine->getRepository(PersonnePerdue::class)->findAll();
        return $this->render('moukhtafoun/index.html.twig',array('wls' => $wls));
    }
    #[Route('/details/{id}', name: 'details')]
    public function show($id): Response
    {
        $pr = $this->PersonnePerdueRepository->find($id);
        
        return $this->render('personne/show.html.twig', [
            'pr' => $pr
        ]);
    }
}