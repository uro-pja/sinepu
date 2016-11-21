<?php

namespace Tickets\Application\Query\Result;

use Tickets\Domain\TicketTemplate;

class TemplateResult
{
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
     */
    public function __construct($name, $content, $annotations)
    {
        $this->name = $name;
        $this->content = $content;
        $this->annotations = $annotations;
    }

    /**
     * @param TicketTemplate $ticketTemplate
     *
     * @return TemplateResult
     */
    public static function createFromTicketTemplate(TicketTemplate $ticketTemplate)
    {
        return new self($ticketTemplate->getName(), $ticketTemplate->getContent(), $ticketTemplate->getAnnotations());
    }
}
