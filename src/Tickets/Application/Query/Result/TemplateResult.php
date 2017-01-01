<?php

namespace Tickets\Application\Query\Result;

use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\TicketsTemplate;

class TemplateResult
{
    public $uuid;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $annotations;

    /**
     * TemplateResult constructor.
     * @param string $name
     * @param string $content
     * @param string $annotations
     * @param UuidInterface $uuid
     */
    public function __construct(UuidInterface $uuid, $name, $content, $annotations)
    {
        $this->name = $name;
        $this->content = $content;
        $this->annotations = $annotations;
        $this->uuid = $uuid;
    }

    /**
     * @param TicketsTemplate $ticketTemplate
     *
     * @return TemplateResult
     */
    public static function createFromTicketTemplate(TicketsTemplate $ticketTemplate)
    {
        return new self($ticketTemplate->getUuid(),$ticketTemplate->getName(), $ticketTemplate->getContent(), $ticketTemplate->getAnnotations());
    }
}
