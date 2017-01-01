<?php

namespace Tickets\Application\Query\Result;

use DateTimeInterface;
use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\Ticket;

class TicketResult
{
    /**
     * @var UuidInterface
     */
    public $uuid;
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
     * @param UuidInterface $uuid
     * @param string $type
     * @param string $status
     * @param DateTimeInterface $createdAt
     * @param DateTimeInterface $updatedAt
     */
    public function __construct(UuidInterface $uuid, $type, $status, DateTimeInterface $createdAt, DateTimeInterface $updatedAt = null)
    {
        $this->type = $type;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->uuid = $uuid;
    }

    /**
     * @param Ticket $ticket
     *
     * @return self
     */
    public static function createFromTicket(Ticket $ticket)
    {
        return new self($ticket->getUuid(), $ticket->getType(), 'not-implemented', $ticket->getCreatedAt(), $ticket->getUpdatedAt());
    }
}
