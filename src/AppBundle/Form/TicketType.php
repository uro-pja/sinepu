<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tickets\Application\Command\CreateTicketCommand;
use Tickets\Application\Query\Templates as TemplatesQuery;

class TicketType extends AbstractType
{
    /**
     * @var TemplatesQuery
     */
    private $templates;

    /**
     * TicketType constructor.
     * @param TemplatesQuery $templates
     */
    public function __construct(TemplatesQuery $templates)
    {
        $this->templates = $templates;
    }

    public function buildForm(FormBuilderInterface $formBuilder, array $option)
    {
        $formBuilder
            ->add('type', ChoiceType::class, [
                'choices' => $this->getTemplatesChoiceList(),
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

    /**
     * @return array
     */
    private function getTemplatesChoiceList()
    {

        $templates = $this->templates->findAll();
        $data = [];
        foreach ($templates as $template){
            $data[$template->name] = $template->name;
        }

        return $data;
    }
}
