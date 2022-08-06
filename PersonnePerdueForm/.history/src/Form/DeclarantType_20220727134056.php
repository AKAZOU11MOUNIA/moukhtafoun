<?php

namespace App\Form;

use App\Entity\Declarants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DeclarantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('CIN_ou_num_passeport', TextType::class, [
                'label' => 'CIN OU NUMERO DE PASSEPORT',
            ])
            ->add('Nom_complet', TextType::class, [
                'label' => 'NOM COMPLET',
            ])
            ->add('type_declaration', ChoiceType::class, [
                'label' => 'TYPE DE DECLARATION',
                'choices' => [
                    'OBJET PERDU' => 'OBJET PERDU',
                    'PERSONNE PERDUE' => 'PERSONNE PERDUE',
                ],
                'expanded' => true,
            ])
            ->add('Ville_actuelle', TextType::class, [
                'label' => 'VILLE ACTUELLE',
            ])
            ->add('Num_telephone', TextType::class, [
                'label' => 'NUMERO DE TELEPHONE',
                'constraints' => [new Length(['min' => 10])]
            ])
            ->add('Adresse', TextType::class, [
                'label' => 'ADRESSE',
            ])
            ->add('suivant',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Declarants::class,
        ]);
    }
}
