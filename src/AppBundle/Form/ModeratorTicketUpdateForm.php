<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tickets\Domain\TicketEvent;

class ModeratorTicketUpdateForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $formBuilder, array $option)
    {
        $formBuilder
            ->add('type', ChoiceType::class, [
                'choices' => $this->getTicketStatusType(),
                'label' => 'Zmien Status',
                'required' => true
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Komentaz'
            ])
            ->add('save', SubmitType::class, [
                    'label' => 'Wyslij',
                ]
            );
    }

    public function getTicketStatusType()
    {
        $types = [
            "Odmowa uczelni" => TicketEvent::TYPES[TicketEvent::TYPE_REJECTED],
            "Akceptacja uczelni" => TicketEvent::TYPES[TicketEvent::TYPE_AWAITING_FOR_ACCEPTATION],
            "Otwarte" => TicketEvent::TYPES[TicketEvent::TYPE_OPEN],
            "Zamknij jako zrealizowane" => TicketEvent::TYPES[TicketEvent::TYPE_CLOSED],
        ];
        return $types;

    }

    public function configureOptions(OptionsResolver $optionsResolver)
    {
//        $optionsResolver->setDefaults([
//            'data_class' => ::class
//        ]);
    }
}