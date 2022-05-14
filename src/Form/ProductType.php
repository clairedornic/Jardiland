<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, array(
                'label' => 'Nom',
            ))
            ->add('stock', null, array(
                'label' => 'Stock',
            ))
            ->add('price', null, array(
                'label' => 'Prix',
            ))
            ->add('categories', null, array(
                'label' => 'Catégories',
            ))
            ->add('image', null, array(
                'label' => 'Url de l\'image',
            ))
            ->add('highlighted', null, array(
                'label' => 'Produit phare ?',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
