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
    private $ticketsTemplates;


    /**
     * TicketsTemplatesQuery constructor.
     * @param TicketsTemplates $ticketsTemplates
     */
    public function __construct(TicketsTemplates $ticketsTemplates)
    {
        $this->ticketsTemplates = $ticketsTemplates;
    }

    /**
     * @return TemplateResult[]
     */
    public function findAll()
    {
        $tickets = $this->ticketsTemplates->findAll();

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
        $tickets = $this->ticketsTemplates->findAll();

        $data = [];
        foreach ($tickets as $ticket) {
            $data[] = TemplateResult::createFromTicketTemplate($ticket);
        }
        var_dump($data);
        return $data;

    }
}
