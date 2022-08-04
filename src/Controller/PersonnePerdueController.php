<?php

namespace App\Controller;
use App\Form\PersonneDisparueType;
use App\Entity\PersonnePerdue;
use Container5e2gSrg\getManagerRegistryAwareConnectionProviderService;
use Container5e2gSrg\getNotifier_TransportFactory_NullService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
class PersonnePerdueController extends AbstractController
{
    #[Route('/personne_perdue', name: 'personne_perdue')]
    public function FORM_PERSONNE_PERDUE(ManagerRegistry $doctrine,Request $request,SluggerInterface $slugger): Response
    {
        $personne = new PersonnePerdue();
        $form = $this->createForm(PersonneDisparueType::class, $personne);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $ImageFile = $form->get('image')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($ImageFile) {
                $originalFilename = pathinfo($ImageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$ImageFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $ImageFile->move(
                        $this->getParameter('Personne_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $personne->setImage($newFilename);
            }
            
            $manager = $doctrine->getManager();
            $manager->persist($personne);
            $manager->flush();
            $this->addFlash('success', 'Personne has been successfully submitted.');
            return $this->redirectToRoute('app_moukhtafoun');
        }
        else {
            return $this->render('personne_perdue/personne_perdue.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    }
}