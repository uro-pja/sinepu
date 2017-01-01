<?php
/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 01/01/17
 * Time: 11:32
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tickets\Application\Command\CreateTicketCommand;
use Tickets\Application\Command\CreateTicketTemplateCommand;
use Tickets\Application\Query\Templates as TemplatesQuery;


class TicketTemplateForm extends AbstractType
{
    /**
     * @var TemplatesQuery
     */
    private $templates;

    public function __construct(TemplatesQuery $templates)
    {
        $this->templates = $templates;
    }

    public function buildForm(FormBuilderInterface $formBuilder, array $option)
    {
        $formBuilder
            ->add('name', TextareaType::class, [
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
            'data_class' => CreateTicketTemplateCommand::class
        ]);
    }
}