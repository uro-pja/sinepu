<?php
use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\Ticket;
use Tickets\Domain\TicketEventInterface;

/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 01/01/17
 * Time: 20:22
 */
class TickertsEventRepository implements TicketEventInterface
{

    /**
     * @param Ticket $ticket
     *
     * @return boolean
     */
    public function insert(Ticket $ticket): bool
    {
        // TODO: Implement insert() method.
    }

    /**
     * @param UuidInterface $uuid
     *
     * @return Ticket
     */
    public function findByUuidTicket(UuidInterface $uuid): Ticket
    {
        // TODO: Implement findByUuidTicket() method.
    }
}