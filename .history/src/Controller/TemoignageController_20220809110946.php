<?php

namespace App\Controller;


use App\Entity\Temoignages;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\TemoignageType;

class TemoignageController extends AbstractController
{
    #[Route('/temoignage', name: 'app_temoignage')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $p = new Temoignages();
        $form = $this->createForm(TemoignageType::class, $p);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $doctrine->getManager();
            $em->persist($p);
            $em->flush();
            $choice = $p->getTypeTemoignage();
            if ($choice == 'PAR TELEPHONE') {
                return $this->redirectToRoute(route: 'app_type1');
            } else {
                return $this->redirectToRoute(route: 'app_type2');
            }
        } else {
            return $this->render('temoignage/index.html.twig', array(
                'form' => $form->createView(),
            ));
        }
    }
}
