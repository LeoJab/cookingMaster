<?php

namespace App\Form;

use App\Entity\Etape;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use App\Form\EtapeComposeType;

class EtapeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('numero')
            // ->add('titre')
            ->add('contenue', TextType::class)
            ->add('EtapeComposes', CollectionType::class, [ 'entry_type' => EtapeComposeType::class, 'entry_options' => ['label' => false] ])
            // ->add('recette')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etape::class,
        ]);
    }
}
