<?php

namespace App\Form;

use App\Entity\Declarants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class DeclarantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('CIN_ou_num_passeport')
            ->add('Nom_complet')
            ->add('type_declaration')
            ->add('Ville_actuelle')
            ->add('Num_telephone')
            ->add('Adresse')
            ->add('save',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Declarants::class,
        ]);
    }
}
