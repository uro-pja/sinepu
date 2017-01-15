<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Intl\Data\Util\ArrayAccessibleResourceBundle;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tickets\Application\Command\UpdateTicketCommand;
use Tickets\Domain\TicketEvent;

class ModeratorTicketAnalise  extends AbstractType
{
    public function buildForm(FormBuilderInterface $formBuilder, array $option)
    {
        $formBuilder
            ->add('content', TextareaType::class, [
                'label' => 'Komentaz'
            ])
            ->add('save', SubmitType::class, [
                    'label' => 'Wyslij',
                ]
            ) ->add('status', SubmitType::class,['label'=> "Zaakceptuj",])

        ;

        
        foreach ($this->getTicketStatusType() as  $type ){
            $formBuilder ->add('status', SubmitType::class,['label' => $type["key"]]);

        }



    }

    public function getTicketStatusType(): array
    {
        $types = [
            ["key" => "Odrzuc", "value"  => TicketEvent::TYPE_REJECTED , "css_clas"],
            ["key" => "Akceptuj", "value"=> TicketEvent::TYPE_AWAITING_FOR_ACCEPTATION],
            ["key" => "Otwarte", "value"=> TicketEvent::TYPE_OPEN],
            ["key" => "Zamknij jako zrealizowane", "value" => TicketEvent::TYPE_CLOSED],
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