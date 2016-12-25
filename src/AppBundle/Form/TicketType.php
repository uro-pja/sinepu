<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tickets\Application\Command\CreateTicketCommand;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $formBuilder, array $option)
    {
        $formBuilder
            ->add('type', ChoiceType::class, [
                'choices' =>
                    [
                        'First Choice' => 'first',
                        'Second Choice' => 'second',
                    ],
                'label' => 'Typ podania',
                'required' => true
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Tresc podania!',
            ])
            ->add('save', SubmitType::class, [
                    'label' => 'Wyslij',
                ]
            );

    }

    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'data_class' => CreateTicketCommand::class
        ]);
    }
}
