<?php

namespace Tickets\Application\Query\Result;

use DateTimeInterface;
use Tickets\Domain\Ticket;
use Tickets\Domain\TicketTemplate;

class TicketResult
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $status;

    /**
     * @var DateTimeInterface
     */
    public $createdAt;

    /**
     * @var DateTimeInterface
     */
    public $updatedAt;

    /**
     * Templates constructor.
     * @param string $type
     * @param string $status
     * @param DateTimeInterface $createdAt
     * @param DateTimeInterface $updatedAt
     */
    public function __construct($type, $status, DateTimeInterface $createdAt, DateTimeInterface $updatedAt = null)
    {
        $this->type = $type;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @param Ticket $ticket
     *
     * @return self
     */
    public static function createFromTicket(Ticket $ticket)
    {
        return new self($ticket->getType(), 'not-implemented', $ticket->getCreatedAt(), $ticket->getUpdatedAt());
    }
}
