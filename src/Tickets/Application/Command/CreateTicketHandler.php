<?php
namespace Tickets\Application\Command;

use Tickets\Domain\Ticket;
use Tickets\Domain\Tickets;

class CreateTicketHandler
{
    /**
     * @var Tickets
     */
    private $ticketsRepository;

    /**
     * @param Tickets $ticketsRepository
     */
    public function __construct(Tickets $ticketsRepository)
    {
        $this->ticketsRepository = $ticketsRepository;
    }

    /**
     * @param CreateTicketCommand $command
     */
    public function handle(CreateTicketCommand $command)
    {
        $ticket = new Ticket(
            $command->ticketUuid,
            $command->type,
            $command->content,
            $command->files
        );

        $this->ticketsRepository->insert($ticket);
    }
}
