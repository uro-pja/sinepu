<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tickets\Application\Command\ProcessTicketCommand;
use Tickets\Domain\TicketEvent;

class ProcessTicketForm extends AbstractType
{
    public function __construct()
    {

    }

    public function buildForm(FormBuilderInterface $formBuilder, array $option)
    {
        $formBuilder
            ->add('content', TextareaType::class, [
                'label' => 'Komentarz'
            ])
            ->setAction("");
        foreach ($this->getTicketStatusType() as $type) {
            $formBuilder->add($type["id"], SubmitType::class, [
                'label' => $type["key"],
                'attr' => $type["css"],
            ]);
        }
    }

    public function getTicketStatusType(): array
    {
        $types = [
            [
                "key" => "Odrzuć",
                "value" => TicketEvent::TYPE_REJECTED,
                'css' => ['class' => 'btn-warning btn-md'],
                "id" => TicketEvent::TYPES[TicketEvent::TYPE_REJECTED]
            ],
            [
                "key" => "Akceptuj",
                "value" => TicketEvent::TYPE_AWAITING_FOR_ACCEPTATION,
                'css' => ['class' => 'btn-success btn-md'],
                "id" => TicketEvent::TYPES[TicketEvent::TYPE_AWAITING_FOR_ACCEPTATION]
            ],
        ];

        return $types;
    }

    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'data_class' => ProcessTicketCommand::class
        ]);
    }
}