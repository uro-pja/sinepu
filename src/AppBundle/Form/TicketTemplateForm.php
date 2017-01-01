<?php
/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 01/01/17
 * Time: 11:32
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tickets\Application\Command\CreateTicketTemplateCommand;


class TicketTemplateForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $formBuilder, array $option)
    {
        $formBuilder
            ->add('name', TextType::class, [
                'label' => 'Nazwa Podania',
            ])->add('annotations', TextType::class, [
                'label' => 'Adnotatcje'
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Tresc Podania'
            ])
            ->add('save', SubmitType::class, [
                    'label' => 'Wyslij',
                ]
            );

    }

    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'data_class' => CreateTicketTemplateCommand::class
        ]);
    }
}