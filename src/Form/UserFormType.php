<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'firstName',
                TextType::class,
                [
                    'label' => 'Имя',
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ]
            )
            ->add(
                'lastName',
                TextType::class,
                [
                    'label' => 'Фамилия',
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ]
            )

            ->add('age', IntegerType::class,
            [
                'label'=>'Возраст',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
