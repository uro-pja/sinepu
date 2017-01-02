<?php
namespace Tickets\Domain;

use Ramsey\Uuid\UuidInterface;

interface TicketEventInterface
{
    /**
     * @param TicketEvent TicketEvent
     *
     * @return boolean
     */
    public function insert(TicketEvent $ticketEvent);

    /**
     * @param UuidInterface $uuid
     *
     * @return Ticket
     */
    public function findAllEventForTicket(UuidInterface $uuid);

}