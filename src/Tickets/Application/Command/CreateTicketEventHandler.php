<?php


namespace Tickets\Application\Command;


use Tickets\Domain\TicketEvent;

class CreateTicketEventHandler
{
    /**
     * @var TicketEvent
     */
    private $ticketEvent;

    /**
     * CreateTicketEventHandler constructor.
     * @param TicketEvent $ticketEvent
     */
    public function __construct(TicketEvent $ticketEvent)
    {

        $this->ticketEvent = $ticketEvent;
    }

    public function handler(CreateTicketEventCommand $createTicketEventCommand)
    {

        $this->ticketEvent->getTicketUuid();
        $this->ticketEvent->getCreatedAt();
        $this->ticketEvent->getStatus();
    }
}