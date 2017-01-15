<?php
namespace Tickets\Application\Command;

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
     * @param UpdateTicketCommand $command
     */
    public function closeTicket(UpdateTicketCommand $command)
    {
        $ticket = $this->ticketsRepository->findOneByUuid($command->ticketUuid);
        $ticket->close($command->content, $command->files);
        $this->ticketsRepository->update($ticket);
    }

    /**
     * @param UpdateTicketCommand $command
     */
    public function rejectTicket(UpdateTicketCommand $command)
    {
        $ticket = $this->ticketsRepository->findOneByUuid($command->ticketUuid);
        $ticket->reject($command->content, $command->files);
        $this->ticketsRepository->update($ticket);
    }

    /**
     * @param UpdateTicketCommand $command
     */
    public function acceptTicket(UpdateTicketCommand $command)
    {
        $ticket = $this->ticketsRepository->findOneByUuid($command->ticketUuid);
        $ticket->accept("manager", $command->content, $command->files);
        $this->ticketsRepository->update($ticket);
    }

    /**
     * @param UpdateTicketCommand $command
     */
    public function studentAcceptTicket(UpdateTicketCommand $command)
    {
        $ticket = $this->ticketsRepository->findOneByUuid($command->ticketUuid);
        $ticket->accept("student", $command->content, $command->files);
        $this->ticketsRepository->update($ticket);
    }


}