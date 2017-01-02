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
     * @var integer
     */
    public $status;

    /**
     * @var DateTimeInterface
     */
    public $createdAt;

    /**
     * Templates constructor.
     * @param UuidInterface $uuid
     * @param string $type
     * @param int $status
     * @param DateTimeInterface $createdAt
     */
    public function __construct(UuidInterface $uuid, $type, $status, DateTimeInterface $createdAt)
    {
        $this->type = $type;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->uuid = $uuid;
    }

    /**
     * @param Ticket $ticket
     *
     * @return self
     */
    public static function createFromTicket(Ticket $ticket)
    {
        return new self($ticket->getUuid(), $ticket->getType(), 'not-implemented', $ticket->getCreatedAt());
    }
}
