<?php

namespace App\Form;

use App\Entity\Compose;
use App\Entity\Ingredient;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ComposeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('qte', IntegerType::class)
            ->add('unite', TextType::class)
            // ->add('recette')
            ->add('ingredient', EntityType::class, [ 'class' => Ingredient::class, 'choice_label' => 'nom' ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Compose::class,
        ]);
    }
}
