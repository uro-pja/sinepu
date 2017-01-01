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
     * @var string
     */

    public $content;

    /**
     * Templates constructor.
     * @param UuidInterface $uuid
     * @param string $type
     * @param string $status
     * @param DateTimeInterface $createdAt
     * @param DateTimeInterface $updatedAt
     * @param $content
     */
    public function __construct(UuidInterface $uuid, $type, $status, DateTimeInterface $createdAt, DateTimeInterface $updatedAt = null, $content)
    {
        $this->type = $type;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->uuid = $uuid;
        $this->content = $content;
    }

    /**
     * @param Ticket $ticket
     *
     * @return self
     */
    public static function createFromTicket(Ticket $ticket)
    {
        return new self($ticket->getUuid(), $ticket->getType(), 'not-implemented', $ticket->getCreatedAt(), $ticket->getUpdatedAt(),$ticket->getContent());
    }
}
