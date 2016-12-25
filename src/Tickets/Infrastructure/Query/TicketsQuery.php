<?php

namespace Tickets\Infrastructure\Query;

use Tickets\Application\Query\Result\TicketResult;
use Tickets\Application\Query\Templates;
use Tickets\Domain\Tickets;

class TicketsQuery implements Templates
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
}
