<?php

namespace Tickets\Infrastructure\Query;

use Tickets\Application\Query\Result\TemplateResult;
use Tickets\Application\Query\Templates;
use Tickets\Domain\TicketTemplates;

class TemplatesQuery implements Templates
{
    /**
     * @var TicketTemplates
     */
    private $ticketTemplates;

    /**
     * TemplatesQuery constructor.
     *
     * @param TicketTemplates $ticketTemplates
     */
    public function __construct(TicketTemplates $ticketTemplates)
    {
        $this->ticketTemplates = $ticketTemplates;
    }

    /**
     * @return TemplateResult[]
     */
    public function getAll()
    {
        $tickets = $this->ticketTemplates->findAll();

        $data = [];
        foreach ($tickets as $ticket) {
            $data[] = TemplateResult::createFromTicketTemplate($ticket);
        }

        return $data;
    }
    public function getNames()
    {
        $tickets = $this->ticketTemplates->findAll();

        $data = [];
        foreach ($tickets as $ticket) {
            $data[] = TemplateResult::createFromTicketTemplate($ticket);
        }
        var_dump($data);

    }
}
