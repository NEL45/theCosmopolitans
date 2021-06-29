<?php

namespace App\Form;

use App\Entity\Comment;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reactivity', RangeType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 5,
                ],
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('explanation', RangeType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 5,
                ],
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('courtesy', RangeType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 5,
                ],
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
            ->add('recommandation', RangeType::class, [
                'label' => 'How much would you recommend this customer?',
                'attr' => [
                    'min' => 1,
                    'max' => 5,
                ],
                'label_attr' => [
                    'class' => 'form-label'
                ]

            ])
            ->add('comment', TextareaType::class, [
                'label' => 'Tell us how was your experience with this customer:'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
