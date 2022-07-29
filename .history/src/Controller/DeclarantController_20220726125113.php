<?php

namespace App\Controller;


use App\Entity\Declarants;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeclarantController extends AbstractController
{
    #[Route('/declarant', name: 'app_declarant')]
    public function index(Request $request,ManagerRegistry $doctrine): Response
    {
        $p = new Declarants();
        $p->setCINOuNumPasseport('veuillez saisir votre CIN ou NUMERO DE PASSEPORT');
        $p->setNomComplet('veuillez saisir votre nom et prénom');
        $p->setTypeDeclaration('');
        $p->setVilleActuelle('veuillez saisir votre ville actuelle');
        $p->setNumTelephone('veuillez saisir votre numero de telephone');
        $p->setAdresse('veuillez saisir votre adresse');
        $form = $this->createForm(DeclarantType::class, $p);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em =$doctrine->getManager();
            $em->persist($p);
            $em->flush();
            $this->addFlash('Notice','form submitted sucssesfully');
            return $this->redirectToRoute(route:'');
        }else{
            return $this->render('form/index.html.twig', array(
            'form' => $form->createView(),
        ));
        }

        return $this->render('declarant/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
