<?php
namespace Tickets\Domain;

use DateTimeImmutable;
use DateTimeInterface;
use Ramsey\Uuid\UuidInterface;

class Ticket
{
    const TYPES = [
        TicketEvent::TYPE_OPEN => 'open',
        TicketEvent::TYPE_CLOSED => 'closed',
        TicketEvent::TYPE_REJECTED => 'rejected',
        TicketEvent::TYPE_ACCEPTED => 'accepted',
        TicketEvent::TYPE_AWAITING_FOR_ACCEPTATION => 'awaiting_for_acceptation'
    ];

    /**
     * @var UuidInterface
     */
    private $uuid;

    /**
     * @var string
     */
    private $type;

    /**
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * @var TicketEvent[]|array
     */
    private $events = [];

    /**
     * @var TicketEvent[]|array
     */
    private $status;

    /**
     * Ticket constructor.
     * @param UuidInterface $uuid
     * @param string $type
     * @param string $content
     * @param array $files
     */
    public function __construct(UuidInterface $uuid, string $type, string $content, array $files = [])
    {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->createdAt = new DateTimeImmutable();
        $this->events[] = new TicketEvent($this, TicketEvent::TYPE_OPEN, $content, $files);
        $this->status = TicketEvent::TYPE_OPEN;
    }

    /**
     * @return UuidInterface
     */
    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function addTicker(TicketEvent $ticketEvent)
    {
        $this->events[] = $ticketEvent;
    }

    /**
     * @return TicketEvent
     */
    public function getLastEvent()
    {
        $lastEvent = $this->events[0];
        foreach ($this->events as $event) {
            if ($event->getCreatedAt() > $lastEvent->getCreatedAt()) {
                $lastEvent = $event;
            }
        }
        return $lastEvent;
    }

    /**
     * @return array|TicketEvent[]
     */
    public function getHistory()
    {
        return $this->events;
    }

    /**
     * Reject ticket
     *
     * @param string $reason
     * @param array $files
     */
    public function reject(string $reason, array $files = [])
    {
        $this->events[] = new TicketEvent($this, TicketEvent::TYPE_REJECTED, $reason, $files);
        $this->status = TicketEvent::TYPE_REJECTED;
    }

    /**
     * @param string $who
     * @param string $reason
     * @param array $files
     */
    public function accept(string $who, string $reason, array $files = [])
    {
        if ($who === 'student') {
            $this->events[] = new TicketEvent($this, TicketEvent::TYPE_ACCEPTED, $reason, $files);

            $this->status = TicketEvent::TYPE_ACCEPTED;
        } else {
            $this->events[] = new TicketEvent($this, TicketEvent::TYPE_AWAITING_FOR_ACCEPTATION, $reason, $files);

            $this->status = TicketEvent::TYPE_AWAITING_FOR_ACCEPTATION;
        }
    }

//    public function forwardTo(string $reason, array $files = [])
//    {
//        $this->events[] = new TicketEvent($this, TicketEvent::TYPE_REJECTED, $reason, $files);
//    }
    /**
     * @param string $reason
     * @param array $files
     */
    public function close(string $reason, array $files = [])
    {
        $this->events[] = new TicketEvent($this, TicketEvent::TYPE_CLOSED, $reason, $files);
        $this->status = TicketEvent::TYPE_CLOSED;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}
