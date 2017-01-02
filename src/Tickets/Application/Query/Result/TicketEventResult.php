<?php
namespace Tickets\Application\Query\Result;

use DateTimeInterface;
use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\TicketEvent;

class TicketEventResult
{
    /**
     * @var UuidInterface
     */
    public $uuid;

    /**
     * @var int
     */
    public $status;

    /**
     * @var DateTimeInterface
     */
    public $createdAt;

    /**
     * @var string
     */
    public $content;

    /**
     * TicketEventResult constructor.
     * @param UuidInterface $uuid
     * @param $status
     * @param DateTimeInterface $createdAt
     * @param $content
     */
    public function __construct(
        UuidInterface $uuid,
        $status,
        DateTimeInterface $createdAt,
        $content
    ) {
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->uuid = $uuid;
        $this->content = $content;
    }

    public static function createFromTicket(TicketEvent $ticketEvent)
    {
        return new self($ticketEvent->getUuid(), $ticketEvent->getStatus(),
            $ticketEvent->getCreatedAt(), $ticketEvent->getContent());
    }
}