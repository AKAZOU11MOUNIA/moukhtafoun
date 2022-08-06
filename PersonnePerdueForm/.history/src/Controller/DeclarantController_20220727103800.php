<?php

namespace App\Controller;


use App\Entity\Declarants;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\DeclarantType;
class DeclarantController extends AbstractController
{
    #[Route('/declarant', name: 'app_declarant')]
    public function index(Request $request,ManagerRegistry $doctrine): Response
    {
        $p = new Declarants();
        $form = $this->createForm(DeclarantType::class, $p);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $session = $this->getRequest()->getSession();
            $session->set('data','$form');
            $em =$doctrine->getManager();
            $em->persist($p);
            $em->flush();
            $choice=$p->getTypeDeclaration();
            if ($choice== 'PERSONNE PERDUE')
             {
            return $this->redirectToRoute(route:'personne_perdue');
        }
        else{ 
            return $this->redirectToRoute(route:'objet_perdu');
        }
    }
        else{
            return $this->render('declarant/index.html.twig', array(
            'form' => $form->createView(),
        ));
        }
    }
}

