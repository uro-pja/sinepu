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
    private $content;

    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    private $files = [];

    /**
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * @var DateTimeInterface|null
     */
    private $updatedAt = null;

    public function __construct(UuidInterface $uuid, string $content, string $type, array $files = [])
    {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->files = $files;
        $this->content = $content;

        $this->createdAt = new DateTimeImmutable();
    }

    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getFiles(): array
    {
        return $this->files;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
