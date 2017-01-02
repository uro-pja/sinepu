<?php
namespace Tickets\Application\Command;

use Tickets\Domain\Ticket;
use Tickets\Domain\TicketEvent;
use Tickets\Domain\TicketEventInterface;
use Tickets\Domain\Tickets;

class CreateTicketHandler
{
    /**
     * @var Tickets
     */
    private $ticketsRepository;
    /**
     * @var TicketEvent
     */
    private $ticketsEventRepository;

    /**
     * @param Tickets $ticketsRepository
     * @param TicketEventInterface $ticketsEventRepository
     */
    public function __construct(Tickets $ticketsRepository, TicketEventInterface $ticketsEventRepository)
    {
        $this->ticketsRepository = $ticketsRepository;
        $this->ticketsEventRepository = $ticketsEventRepository;
    }

    /**
     * @param CreateTicketCommand $command
     */
    public function handle(CreateTicketCommand $command)
    {
        $ticket = new Ticket(
            $command->ticketUuid,
            $command->type
        );
        $ticketEvent = new TicketEvent($command->eventUuid, $command->ticketUuid, $command->status,
            $command->content, $command->files);

        $this->ticketsRepository->insert($ticket);
        $this->ticketsEventRepository->insert($ticketEvent);

    }
}
