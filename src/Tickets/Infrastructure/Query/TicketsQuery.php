<?php

namespace Tickets\Infrastructure\Query;

use Tickets\Application\Query\Result\TicketResult;
use Tickets\Application\Query\Tickets;
use Tickets\Domain\Tickets as TicketsRepository;

class TicketsQuery implements Tickets
{
    /**
     * @var TicketsRepository
     */
    private $tickets;

    /**
     * @param TicketsRepository $tickets
     */
    public function __construct(TicketsRepository $tickets)
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
