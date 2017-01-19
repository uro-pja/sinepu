<?php
namespace Tickets\Application\Command;

use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\Tickets;

class UpdateTicketHandler
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
     * @param ProcessTicketCommand $command
     */
    public function closeTicket(ProcessTicketCommand $command, String $UuidTicket)
    {
        $ticket = $this->ticketsRepository->findOneByUuid(Uuid::fromString($command->ticketUuid));
        $ticket->close($command->content, $command->files);
        $this->ticketsRepository->update($ticket);
    }

    /**
     * @param ProcessTicketCommand $command
     */
    public function rejectTicket(ProcessTicketCommand $command)
    {
        $ticket = $this->ticketsRepository->findOneByUuid(Uuid::fromString($command->ticketUuid));
        $ticket->reject($command->content, []);
        $this->ticketsRepository->update($ticket);
    }

    /**
     * @param ProcessTicketCommand $command
     */
    public function acceptTicket(ProcessTicketCommand $command)
    {
        $ticket = $this->ticketsRepository->findOneByUuid(Uuid::fromString($command->ticketUuid));
        $ticket->accept("manager", $command->content, []);
        $this->ticketsRepository->update($ticket);
    }

    /**
     * @param ProcessTicketCommand $command
     */
    public function studentAcceptTicket(ProcessTicketCommand $command)
    {
        $ticket = $this->ticketsRepository->findOneByUuid(Uuid::fromString($command->ticketUuid));
        $ticket->accept("student", $command->content, []);
        $this->ticketsRepository->update($ticket);
    }

}