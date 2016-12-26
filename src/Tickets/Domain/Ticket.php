<?php

namespace Tickets\Domain;

use DateTimeInterface;
use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="TicketRepository")
 * @ORM\Table(name="ticket")
 */
class Ticket
{
    /**
     * @var UuidInterface
     * @ORM\Column(type="string")
     */
    private $uuid;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @var array
     * @ORM\Column(type="array")
     */
    private $files = [];

    /**
     * @var DateTimeInterface
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="datetime")
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

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
