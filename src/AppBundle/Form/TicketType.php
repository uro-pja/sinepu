<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
                'required' => true,
                'expanded' => true
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Tresc podania!',
            ])
            ->add('files', FileType::class,
                ['label' => "Zalacznik",
                    'required' => false,
                    'multiple' => true,
                ])

            ->add('save', SubmitType::class, [
                    'label' => 'Wyslij',
                ]
            );

    }

    /**
     * @return array
     */
    private function getTemplatesChoiceList()
    {

        $templates = $this->templates->getAll();
        $data = [];
        foreach ($templates as $template) {
            $data[$template->name] = $template->name;
        }

        return $data;
    }

    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'data_class' => CreateTicketCommand::class
        ]);
    }
}
