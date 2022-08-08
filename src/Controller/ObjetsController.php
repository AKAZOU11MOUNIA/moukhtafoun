<?php

namespace App\Controller;


use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Objets;
use App\Form\ObjetsperdusType;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ObjetsController extends AbstractController
{
    #[Route('/objets', name: 'objet_perdu')]
    public function index(Request $request,SluggerInterface $slugger,ManagerRegistry $doctrine): Response
    {
        
        $OP = new Objets();
        $form = $this->createForm(ObjetsperdusType::class,$OP);
        $form -> handleRequest($request);
        if($form->isSubmitted()){
            $em=$doctrine->getManager();
            $em->persist($OP);
            $photo = $form->get('photo')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($photo) {
                $originalFilename = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$photo->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $photo->move(
                        $this->getParameter('OP_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'photo$photoname' property to store the PDF file name
                // instead of its contents
                $OP->setImages($newFilename);
            }
            $em->flush();
            return $this->render('objets/fin.html.twig', 
                
            );

        }

        else{
            return $this->render('objets/OP.html.twig', [
                'form'=>$form->createView(),
            ]);
        }
       
    
    }
}
