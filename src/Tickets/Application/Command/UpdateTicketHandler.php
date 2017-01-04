<?php
namespace Tickets\Application\Command;

use Tickets\Domain\TicketEvent;
use Tickets\Domain\Tickets;

class UpdateTicketHandler
{
    /**
     * @var Tickets
     */
    private $ticketsRepository;

    /**
     * @param Tickets $ticketsRepository
     * @param TicketEvent $ticketEvent
     */
    public function __construct(Tickets $ticketsRepository, TicketEvent $ticketEvent)
    {
        $this->ticketsRepository = $ticketsRepository;
    }

    /**
     * @param UpdateTicketCommand $command
     */
    public function handle(UpdateTicketCommand $command)
    {
        $ticket = $this->ticketsRepository->findOneByUuid($command->ticketUuid);
        $event = new TicketEvent($ticket, $command->status, $command->content, $command->files);


        switch ($command->status) {
            case TicketEvent::TYPE_CLOSED: {
                $ticket->accept("noob", $command->content);
                break;
            }
            case TicketEvent::TYPE_ACCEPTED: {
                $ticket->accept("noob", $command->content);
                break;
            }
            case TicketEvent::TYPE_AWAITING_FOR_ACCEPTATION: {
                $ticket->accept("noob", $command->content);
                break;
            }

        }

        $ticket->addTicker($event);
        $this->ticketsRepository->insert($ticket);
    }
}