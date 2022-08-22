<?php

namespace App\Controller;

use App\Entity\Search;
use App\Form\SearchType;
use App\Entity\PersonnePerdue;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\PersonnePerdueRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MoukhtafounController extends AbstractController
{
    #[Route('/', name: 'app_moukhtafoun')]

    public function index(ManagerRegistry $doctrine,Request $request,PaginatorInterface $paginator,PersonnePerdueRepository $repository): Response
    { 
        
        $data = new Search();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchType::class, $data);
        $form->handleRequest($request);
        $wls =$repository->findSearch($data);
        $personne = $paginator->paginate(
            $wls, 
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            9 // Nombre de résultats par page
        );
        return $this->render('moukhtafoun/index.html.twig', [
            'pr' => $personne,
            'form' => $form->createView()
        ]);
        
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
