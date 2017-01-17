<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tickets\Application\Command\UpdateTicketCommand;
use Tickets\Domain\TicketEvent;

class ModeratorTicketAnalise extends AbstractType
{
    public function buildForm(FormBuilderInterface $formBuilder, array $option)
    {
        $formBuilder
            ->add('content', TextareaType::class, [
                'label' => 'Komentaz'
            ]);
        foreach ($this->getTicketStatusType() as $type) {
            $formBuilder->add($type["id"], SubmitType::class,
                [
                    'label' => $type["key"],
                    'attr' => $type["css"]
                ]);
        }
    }

    public function getTicketStatusType(): array
    {
        $types = [
            [
                "key" => "Odrzuc",
                "value" => TicketEvent::TYPE_REJECTED,
                'css' => ['class' => 'btn-warning btn-lg'],
                "id" => TicketEvent::TYPES[TicketEvent::TYPE_REJECTED]
            ],
            [
                "key" => "Akceptuj",
                "value" => TicketEvent::TYPE_AWAITING_FOR_ACCEPTATION,
                'css' => ['class' => 'btn-success btn-lg'],
                "id" => TicketEvent::TYPES[TicketEvent::TYPE_AWAITING_FOR_ACCEPTATION]
            ],
            [
                "key" => "Zamknij",
                "value" => TicketEvent::TYPE_CLOSED,
                'css' => ['class' => 'btn-danger btn-lg'],
                "id" => TicketEvent::TYPES[TicketEvent::TYPE_CLOSED]
            ],
        ];
        return $types;

    }

    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'data_class' => UpdateTicketCommand::class
        ]);
    }
}