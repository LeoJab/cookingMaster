<?php

namespace App\Form;

use App\Entity\EtapeCompose;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Ingredient;

class EtapeComposeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ingredient', EntityType::class, [ 'class' => Ingredient::class, 'choice_label' => 'nom' ]);
            // ->add('etape')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EtapeCompose::class,
        ]);
    }
}
