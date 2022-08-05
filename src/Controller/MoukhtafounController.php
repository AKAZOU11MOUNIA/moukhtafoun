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
<<<<<<< HEAD
    public function index1(): Response
    {
        return $this->render('moukhtafoun/index.html.twig');
    } 
    
=======
    
    public function index(ManagerRegistry $doctrine): Response
    { 
        $wls =$doctrine->getRepository(PersonnePerdue::class)->findAll();
        return $this->render('moukhtafoun/index.html.twig',array('wls' => $wls));
    }
    #[Route('/details/{id}', name: 'details')]
    public function show($id,ManagerRegistry $doctrine): Response
    {
        $pr = $doctrine->getRepository(PersonnePerdue::class)->find($id);
        
        return $this->render('moukhtafoun/show.html.twig', [
            'pr' => $pr
        ]);
    }
>>>>>>> affichage
}