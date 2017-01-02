<?php
namespace Tickets\Domain;

use DateTimeImmutable;
use DateTimeInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class TicketEvent
{
    const TYPE_OPEN = '0';
    const TYPE_CLOSED = '1';
    const TYPE_REJECTED = '2';
    const TYPE_ACCEPTED = '3';
    const TYPE_AWAITING_FOR_ACCEPTATION = '4';

    const TYPES = [
        self::TYPE_OPEN => 'open',
        self::TYPE_CLOSED => 'closed',
        self::TYPE_REJECTED => 'rejected',
        self::TYPE_ACCEPTED => 'accepted',
        self::TYPE_AWAITING_FOR_ACCEPTATION => 'awaiting_for_acceptation'
    ];

    /**
     * @var UuidInterface
     */
    private $uuid;

    /**
     * @var Ticket
     */
    private $ticket;

    /**
     * @var int
     */
    private $type;

    /**
     * @var string
     */
    private $content;

    /**
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * @var array
     */
    private $files;

    /**
     * @param Ticket $ticket
     * @param int $type
     * @param string $content
     * @param array $files
     */
    public function __construct(
        Ticket $ticket,
        int $type,
        string $content,
        array $files
    ) {
        $this->uuid = Uuid::uuid4();
        $this->ticket = $ticket;
        $this->type = $type;
        $this->content = $content;
        $this->createdAt = new DateTimeImmutable();
        $this->files = $files;
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }
}
