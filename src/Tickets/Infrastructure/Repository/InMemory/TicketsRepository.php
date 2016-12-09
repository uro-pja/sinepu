<?php

namespace Tickets\Infrastructure\Repository\InMemory;

use Ramsey\Uuid\Uuid;
use Tickets\Domain\Exception\TicketNotFoundException;
use Tickets\Domain\Ticket;
use Tickets\Domain\Tickets;

class TicketsRepository implements Tickets
{
    /**
     * @var array|Ticket[]
     */
    private $tickets = [];

    /**
     * @param Ticket $ticket
     *
     * @return boolean
     */
    public function insert(Ticket $ticket)
    {
        $this->tickets[$ticket->getUuid()->toString()] = $ticket;

        return true;
    }

    /**
     * @param Uuid $uuid
     *
     * @return Ticket
     *
     * @throws TicketNotFoundException
     */
    public function findOneByUuid(Uuid $uuid)
    {
        $ticket = $this->tickets[$uuid->toString()];

        if ($ticket === null) {
            throw new TicketNotFoundException();
        }

        return $ticket;
    }

    /**
     * @return Ticket[]|array
     */
    public function findAll()
    {
        return $this->tickets;
    }
}
