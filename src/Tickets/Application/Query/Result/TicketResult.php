<?php
namespace Tickets\Application\Query\Result;

use DateTimeInterface;
use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\Ticket;
use Tickets\Domain\TicketEvent;

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
     * @var integer
     */
    public $status;

    /**
     * @var DateTimeInterface
     */
    public $createdAt;

    /**
     * @var null|DateTimeInterface
     */
    public $updatedAt = null;

    /**
     * @var TicketEvent
     */
    public $ticketEvent;

    /**
     * Templates constructor.
     * @param UuidInterface $uuid
     * @param string $type
     * @param string $status
     * @param DateTimeInterface $createdAt
     * @param DateTimeInterface $updatedAt
     * @param TicketEvent[]|array $ticketEvent
     */
    public function __construct(
        UuidInterface $uuid,
        string $type,
        string $status,
        DateTimeInterface $createdAt,
        DateTimeInterface $updatedAt = null,
        $ticketEvent
    ) {
        $this->type = $type;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->uuid = $uuid;
        $this->ticketEvent = $ticketEvent;
    }

    /**
     * @param Ticket $ticket
     *
     * @return self
     */
    public static function createFromTicket(Ticket $ticket)
    {
        return new self(
            $ticket->getUuid(),
            $ticket->getType(),
            Ticket::TYPES[$ticket->getLastEvent()->getType()],
            $ticket->getCreatedAt(),
            $ticket->getLastEvent()->getCreatedAt(),
            $ticket->getHistory()
        );
    }
}
