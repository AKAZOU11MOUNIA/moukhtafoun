<?php

namespace App\Form;

use App\Entity\Objets;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ObjetsperdusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Objet', ChoiceType::class, [
            'label' => 'objet_perdu_ou_volé',
            'choices' => [
                'perdu' => 'OBJET PERDU',
                ' volé ' => 'OBJET volé ',
            ],
            'expanded' => true,
            
        ])
            
            ->add(child:'Description_objet')
            ->add(child:'Decrire_la_situation')
            ->add(child:'Lieu_et_ville_de_disparition')
            ->add('photo', FileType::class, [
                'label' => 'uploade image  ( image)',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/gif',
                            'image/jpeg',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])
            ->add('Submit',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Objets::class,
        ]);
    }
}
