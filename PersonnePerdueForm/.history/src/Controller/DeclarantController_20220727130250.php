<?php

namespace App\Controller;


use App\Entity\Declarants;
use App\Form\DeclarantType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DeclarantController extends AbstractController
{
    #[Route('/declarant', name: 'app_declarant')]
    public function index(Request $request,ManagerRegistry $doctrine,ValidatorInterface $validator): Response
    {
        $p = new Declarants();
        $form = $this->createForm(DeclarantType::class, $p);
        $form->handleRequest($request);
        $errors = $validator->validate($p);

        if (count($errors) > 0) {
            /*
             * Uses a __toString method on the $errors variable which is a
             * ConstraintViolationList object. This gives us a nice string
             * for debugging.
             */
            $errorsString = (string) $errors;
    
            return new Response($errorsString);
        }
    
        if ($form->isSubmitted()) {
            $em =$doctrine->getManager();
            $em->persist($p);
            $em->flush();
            $choice=$p->getTypeDeclaration();
            if ($choice== 'PERSONNE PERDUE')
             {
            return $this->redirectToRoute(route:'app_verification');
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

