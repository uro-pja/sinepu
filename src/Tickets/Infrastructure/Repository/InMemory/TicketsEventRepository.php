<?php
use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\Ticket;
use Tickets\Domain\TicketEvent;
use Tickets\Domain\TicketEventInterface;

class  TicketsEventRepository implements TicketEventInterface
{
    /**
     * @param UuidInterface $uuid
     *
     * @return Ticket
     */
    public function findByUuidTicket(UuidInterface $uuid): Ticket
    {
        // TODO: Implement findByUuidTicket() method.
    }

    /**
     * @param UuidInterface $uuid
     *
     * @return Ticket
     */
    public function findAllEventForTicket(UuidInterface $uuid)
    {
        // TODO: Implement findAllEventForTicket() method.
    }

    /**
     * @param TicketEvent $ticketEvent
     * @return bool|void
     */
    public function insert(TicketEvent $ticketEvent)
    {
        // TODO: Implement insert() method.
    }
}