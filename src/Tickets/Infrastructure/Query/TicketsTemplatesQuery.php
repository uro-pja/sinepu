<?php

namespace Tickets\Infrastructure\Query;

use Tickets\Application\Query\Result\TemplateResult;
use Tickets\Application\Query\Templates;
use Tickets\Domain\TicketsTemplates;

class TicketsTemplatesQuery implements Templates
{
    /**
     * @var TicketsTemplates
     */
    private $ticketTemplates;

    /**
     * TemplatesQuery constructor.
     *
     * @param TicketsTemplates $ticketTemplates
     */
    public function __construct(TicketsTemplates $ticketTemplates)
    {
        $this->ticketTemplates = $ticketTemplates;
    }

    /**
     * @return TemplateResult[]
     */
    public function findAll()
    {
        $tickets = $this->ticketTemplates->findAll();

        $data = [];
        foreach ($tickets as $ticket) {
            $data[] = TemplateResult::createFromTicketTemplate($ticket);
        }

        return $data;
    }

    /**
     * @return TemplateResult[]
     */
    public function getNames()
    {
        $tickets = $this->ticketTemplates->findAll();

        $data = [];
        foreach ($tickets as $ticket) {
            $data[] = TemplateResult::createFromTicketTemplate($ticket);
        }
        var_dump($data);
        return $data;

    }
}
