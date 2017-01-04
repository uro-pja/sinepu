<?php
namespace Tickets\Application\Query\Result;

use DateTimeInterface;
use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\Ticket;
use Tickets\Domain\TicketEvent;

class TicketResult
{
    const CSS = [
        'closed' => 'label-default',
        'open' => 'label-primary',
        'accepted' => 'label-success',
        '' => 'label-info',
        'awaiting_for_acceptation' => 'label-warning',
        'rejected' => 'label-danger'
    ];


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
     * @var string
     */
    public $statusBootstrap;

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
     * @param $statusBootstrap
     */
    public function __construct(
        UuidInterface $uuid,
        string $type,
        string $status,
        DateTimeInterface $createdAt,
        DateTimeInterface $updatedAt = null,
        $ticketEvent,
        $statusBootstrap
    )
    {
        $this->type = $type;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->uuid = $uuid;
        $this->ticketEvent = $ticketEvent;
        $this->statusBootstrap = $statusBootstrap;
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
            $ticket->getHistory(),
            TicketResult::CSS[Ticket::TYPES[$ticket->getLastEvent()->getType()]]
        );
    }
}
