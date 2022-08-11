<?php

namespace App\Controller;

use App\Entity\PersonnePerdue;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MoukhtafounController extends AbstractController
{
    #[Route('/', name: 'app_moukhtafoun')]

    public function index(ManagerRegistry $doctrine,Request $request,PaginatorInterface $paginator): Response
    { 
        $wls =$doctrine->getRepository(PersonnePerdue::class)->findAll();
        $personne = $paginator->paginate(
            $wls, 
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            9 // Nombre de résultats par page
        );
        return $this->render('moukhtafoun/index.html.twig',array('pr' => $personne));
    }
    #[Route('/details/{id}', name: 'details')]
    public function show($id,ManagerRegistry $doctrine): Response
    {
        $pr = $doctrine->getRepository(PersonnePerdue::class)->find($id);
        
        return $this->render('moukhtafoun/show.html.twig', [
            'pr' => $pr
        ]);
    }
}
