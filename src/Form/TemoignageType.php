<?php

namespace App\Form;

use App\Entity\Temoignages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TemoignageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('CIN_ou_num_passeport', TextType::class, [
                'label' => 'CIN OU NUMERO DE PASSEPORT',
            ])
            ->add('Nom_complet', TextType::class, [
                'label' => 'NOM_COMPLET',
            ])
            ->add('Type_temoignage', ChoiceType::class, [
                'label' => 'TYPE DE TEMOIGNAGE',

                'choices' => [
                    'PAR TELEPHONE' => 'PAR TELEPHONE',
                    'SUR PLACE' => 'SUR PLACE',
                ],
                'expanded' => true,
            ])

            // ->add('Num_declaration', TextType::class, [
            //     'label' => 'NUM DE DECLARATION',
            // ])

            ->add('suivant', SubmitType::class);
    }



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Temoignages::class,
        ]);
    }
}
