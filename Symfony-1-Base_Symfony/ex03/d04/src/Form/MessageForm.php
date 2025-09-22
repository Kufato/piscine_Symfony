<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        # Definition of the fields in the form
        $builder
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'required' => false,
                'attr' => [
                    'rows' => 5,
                    'cols' => 40,
                ],
            ])
            ->add('timestamp', ChoiceType::class, [
                'label' => 'Include timestamp',
                'choices' => [
                    'Yes' => 'yes',
                    'No' => 'no',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
