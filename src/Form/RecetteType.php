<?php

namespace App\Form;

use App\Entity\Recette;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Form\ComposeType;
use App\Form\EtapeType;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            /*->add('titre')
            ->add('description')
            ->add('date')
            ->add('slug')
            ->add('categorie')
            ->add('temps')
            ->add('diff')
            ->add('photo')*/
            ->add('composes', CollectionType::class, [ 'entry_type' => ComposeType::class, 'entry_options' => ['label' => false]])
            ->add('etapes', CollectionType::class, [ 'entry_type' => EtapeType::class, 'entry_options' => ['label' => false], 'allow_add' => true, ])
            ->add('submit', SubmitType::class, ['label' => 'Modifier']);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
