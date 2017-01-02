<?php
namespace Tickets\Application\Command;

use Tickets\Domain\TicketEvent;
use Tickets\Domain\TicketEventInterface;

class CreateTicketEventHandler
{

    /**
     * CreateTicketEventHandler constructor.
     * @param TicketEventInterface $ticketsEventRepository
     */
    public function __construct(TicketEventInterface $ticketsEventRepository)
    {
        $this->ticketsEventRepository = $ticketsEventRepository;
    }

    /**
     * @param CreateTicketEventCommand $eventCommand
     */
    public function handler(CreateTicketEventCommand $eventCommand)
    {
        $ticketEvent = new TicketEvent($eventCommand->uuid, $eventCommand->ticketUuid, $eventCommand->status,
            $eventCommand->content, $eventCommand->files);
        $this->ticketsEventRepository->insert($ticketEvent);

    }
}