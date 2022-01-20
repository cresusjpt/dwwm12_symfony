<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('images', FileType::class,[
                'label'=>'Choisir une image',
                'multiple'=>true,
                'mapped'=>false,
                'required'=>true
            ])
            ->add('nom', null, [
                'attr' => [
                    'placeholder' => 'Nom du produit',
                ],
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Description du produit',
                    'rows' => 10,
                    'cols' => 30,
                ],
            ])
            ->add('taille', null, [
                'attr' => [
                    'placeholder' => 'Taille du produit',
                ],
            ])
            ->add('color', ColorType::class, [
                'label' => 'Couleur',
                'attr' => [
                    'placeholder' => 'Couleur du produit',
                    'min' => 0,
                ],
            ])
            ->add('prix', NumberType::class, [
                'attr' => [
                    'placeholder' => 'Prix du produit',
                    'min' => 0,
                ],
            ])
            ->add('qte_stock', NumberType::class, [
                'attr' => [
                    'placeholder' => 'Quantité en stock',
                    'min' => 0,
                ],
            ])
            ->add('appartenir');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
            'html5' => 'html5',
        ]);
    }
}
