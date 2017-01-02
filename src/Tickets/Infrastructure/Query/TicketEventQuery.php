<?php
namespace Tickets\Infrastructure\Query;

use Ramsey\Uuid\Uuid;
use Tickets\Application\Query\Result\TicketEventResult;
use Tickets\Application\Query\TicketsEvent;
use Tickets\Domain\Exception\TicketEventNotFound;
use Tickets\Domain\TicketEvent;
use Tickets\Domain\TicketEventInterface;

class TicketEventQuery implements TicketsEvent
{
    /**
     * @var TicketsEvent
     */
    private $ticketsEvent;

    /**
     * TicketEventQuery constructor.
     * @param TicketEventInterface $ticketsEvent
     */
    public function __construct(TicketEventInterface $ticketsEvent)
    {
        $this->ticketsEvent = $ticketsEvent;
    }

    /**
     * @param string $uuid
     * @return array
     * @throws TicketEventNotFound
     */
    public function findAllEventForTicket(string $uuid): array
    {
        $tickets = $this->ticketsEvent->findAllEventForTicket(Uuid::fromString($uuid));
        if ($tickets === null) {
            throw new TicketEventNotFound();
        }
        $ticketArray = [];
        foreach ($tickets as $ticket) {
            array_push($ticketArray, TicketEventResult::createFromTicket($ticket));
        }
        return $ticketArray;

    }
}