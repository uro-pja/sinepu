<?php
/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 01/01/17
 * Time: 20:22
 */

namespace Tickets\Infrastructure\Repository\Doctrine;


use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\Ticket;
use Tickets\Domain\TicketEventInterface;

class TicketsEventRepository implements TicketEventInterface
{

    /**
     * @param Ticket $ticket
     *
     * @return boolean
     */
    public function insert(Ticket $ticket)
    {
        // TODO: Implement insert() method.
    }

    /**
     * @param UuidInterface $uuid
     *
     * @return Ticket
     */
    public function findByUuidTicket(UuidInterface $uuid)
    {
        // TODO: Implement findByUuidTicket() method.
    }
}