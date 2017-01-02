<?php

namespace Tickets\Domain;

use DateTimeInterface;
use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;

class Ticket
{
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
     * Ticket constructor.
     * @param UuidInterface $uuid
     * @param string $type
     */
    public function __construct(UuidInterface $uuid, string $type)
    {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->createdAt = new DateTimeImmutable();
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
    /**
     * @return DateTimeInterface|null
     */
}
