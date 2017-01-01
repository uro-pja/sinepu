<?php

namespace Tickets\Infrastructure\Query;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Tickets\Application\Query\Result\TicketResult;
use Tickets\Application\Query\Tickets;
use Tickets\Domain\Exception\TicketNotFoundException;
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

    /**
     * @param string $uuid
     * @return TicketResult
     * @throws TicketNotFoundException
     */
    public function getTicket(string $uuid)
    {
        $ticket = $this->tickets->findOneByUuid(Uuid::fromString($uuid));

        if ($ticket === null) {
            throw new TicketNotFoundException();
        }

        return TicketResult::createFromTicket($ticket);
    }
}
