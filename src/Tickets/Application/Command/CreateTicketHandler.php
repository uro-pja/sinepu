<?php

namespace Tickets\Application\Command;

use Ramsey\Uuid\Uuid;
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
        $ticket = new Ticket(Uuid::uuid4(), $command->getName(), $command->getType() , $command->getText());

        $this->ticketsRepository->insert($ticket);
    }
}
