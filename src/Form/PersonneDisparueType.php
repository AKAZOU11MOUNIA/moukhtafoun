<?php

namespace App\Form;

use App\Entity\PersonnePerdue;
use DateTimeImmutable;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class PersonneDisparueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('CIN_ou_Num_passeport',TextType::class,['label' => 'CIN Ou N° Passeport'])
            ->add('Nom_complet',TextType::class,['label' => 'Nom Complet'])
            ->add('Age',TextType::class,['label' => 'Age'])
            ->add('Sexe',
                ChoiceType::class,[
                'label' => 'Sexe',
                'expanded' => true,
                'multiple' => false,
                'choices' =>[
                    'Male'=>'Male',
                    'Female'=>'Female',
                    
                ],
                
            ])
            ->add('Lien_Familiale_Avec_Declarant', TextType::class,['label'=>'Lien Familiale Avec le Declarant'])
            ->add('Periode_de_disparition',DateType::class,
                [
                    'input' => 'datetime_immutable',
                    'widget' => 'choice',
                    'label' => 'Periode De Disparition'
                ])
        
            ->add('Ville_et_lieu_de_disparition',TextType::class,['label' => 'Ville Et Lieu De Disparition'])
            ->add('image',FileType::class, [
                'label' => 'Ajouter une image',

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
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Veuillez inserer un type d\'image valide',
                    ])
                ]
            ])
            ->add('Valider', SubmitType::class,['label' => 'valider ma declaration'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PersonnePerdue::class,
        ]);
    }
}