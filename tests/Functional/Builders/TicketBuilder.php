<?php

namespace Tests\Functional\Builders;

use DateTimeImmutable;
use DateTimeInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class TicketBuilder
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

    /**
     * TicketTemplateBuilder constructor.
     * @param UuidInterface $uuid
     * @param string $type
     * @param string $status
     * @param DateTimeInterface $createdAt
     * @param DateTimeInterface $updatedAt
     */
    private function __construct(
        UuidInterface $uuid,
        $type,
        $status,
        DateTimeInterface $createdAt,
        DateTimeInterface $updatedAt
    ){
        $this->uuid = $uuid;
        $this->type = $type;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return self
     */
    public static function create()
    {
        return new self(
            Uuid::uuid4(),
            'Usuniecie konta',
            'Oczekuje na analize',
            new DateTimeImmutable('@946684800'),
            new DateTimeImmutable('@1056689999')
        );
    }

    /**
     * @param UuidInterface $uuid
     *
     * @return self
     */
    public function withUuid(UuidInterface $uuid)
    {
        $new = clone $this;
        $new->uuid = $uuid;

        return $new;
    }

    /**
     * @param string $type
     *
     * @return self
     */
    public function withType($type)
    {
        $new = clone $this;
        $new->type = $type;

        return $new;
    }

    /**
     * @param string $status
     *
     * @return self
     */
    public function withStatus($status)
    {
        $new = clone $this;
        $new->status = $status;

        return $new;
    }

    /**
     * @param DateTimeInterface $dateTime
     * 
     * @return string
     */
    public function withCreatedAt(DateTimeInterface $dateTime)
    {
        $new = clone $this;
        $new->createdAt = $dateTime;

        return $new;
    }

    /**
     * @param DateTimeInterface $dateTime
     *
     * @return string
     */
    public function withUpdatedAt(DateTimeInterface $dateTime)
    {
        $new = clone $this;
        $new->createdAt = $dateTime;

        return $new;
    }

    /**
     * @param Tickets $tickets
     */
    public function persist(Tickets $tickets)
    {
        $ticket = new Ticket(
            $this->uuid,
            $this->type,
            $this->status,
            $this->createdAt,
            $this->updatedAt
        );

        $tickets->insert($ticket);

        // todo: implement this method, create ticket and ticket repository, create method also
    }
}
