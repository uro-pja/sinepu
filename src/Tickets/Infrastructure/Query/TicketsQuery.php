<?php

namespace Tickets\Infrastructure\Query;

use Ramsey\Uuid\Uuid;
use Tickets\Application\Query\Result\TicketResult;
use Tickets\Application\Query\Templates;
use Tickets\Domain\Ticket;
use Tickets\Domain\Tickets;

class TicketsQuery implements Tickets
{
    /**
     * @var Tickets
     */
    private $tickets;

    /**
     * @param Tickets $tickets
     */
    public function __construct(Tickets $tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * @return TicketResult[]
     */
    public function getAll()
    {
        $tickets = $this->tickets->findAll();

        $data = [];
        foreach ($tickets as $ticket) {
            $data[] = TicketResult::createFromTicket($ticket);
        }

        return $data;
    }

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
     * @param Uuid $uuid
     *
     * @return Ticket
     */
    public function findOneByUuid(Uuid $uuid)
    {
        // TODO: Implement findOneByUuid() method.
    }

    /**
     * @return Ticket[]|array
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
    }
}
