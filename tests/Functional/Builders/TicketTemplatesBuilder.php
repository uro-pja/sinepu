<?php

namespace Tests\Functional\Builders;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\TicketsTemplate;
use Tickets\Domain\TicketsTemplates;

class TicketTemplatesBuilder
{
    /**
     * @var UuidInterface
     */
    private $uuid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $annotations;

    /**
     * TicketTemplateBuilder constructor.
     *
     * @param UuidInterface $uuid
     * @param string $name
     * @param string $content
     * @param string $annotations
     */
    private function __construct(UuidInterface $uuid, $name, $content, $annotations)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->content = $content;
        $this->annotations = $annotations;
    }

    /**
     * @return TicketTemplatesBuilder
     */
    public static function create()
    {
        return new self(Uuid::uuid4(), 'o zwolnienie', 'Prosze o zwolnienie mnie', 'asdf');
    }

    /**
     * @param UuidInterface $uuid
     *
     * @return TicketTemplatesBuilder
     */
    public function withUuid(UuidInterface $uuid)
    {
        $new = clone $this;
        $new->uuid = $uuid;

        return $new;
    }

    /**
     * @param string $data
     *
     * @return TicketTemplatesBuilder
     */
    public function withName($data)
    {
        $new = clone $this;
        $new->name = $data;

        return $new;
    }

    /**
     * @param string $data
     *
     * @return TicketTemplatesBuilder
     */
    public function withContent($data)
    {
        $new = clone $this;
        $new->content = $data;

        return $new;
    }

    /**
     * @param string $data
     *
     * @return TicketTemplatesBuilder
     */
    public function withAnnotations($data)
    {
        $new = clone $this;
        $new->annotations = $data;

        return $new;
    }

    /**
     * @param TicketsTemplates $ticketTemplates
     */
    public function persist(TicketsTemplates $ticketTemplates)
    {
        $ticket = new TicketsTemplate(
            $this->uuid,
            $this->name,
            $this->content,
            $this->annotations
        );

        $ticketTemplates->insert($ticket);
    }
}
