<?php

namespace Tickets\Infrastructure\Repository\InMemory;

use Tickets\Domain\Exception\TicketTemplateNotFoundException;
use Tickets\Domain\TicketTemplate;
use Tickets\Domain\TicketTemplates;

class TicketTemplatesRepository implements TicketTemplates
{
    /**
     * @var TicketTemplate[]
     */
    private $ticketTemplates = [];

    /**
     * @param TicketTemplate $ticketTemplate
     *
     * @return boolean
     */
    public function insert(TicketTemplate $ticketTemplate)
    {
        $this->ticketTemplates[$ticketTemplate->getUuid()->toString()] = $ticketTemplate;

        return true;
    }

    /**
     * @param TicketTemplate $ticketTemplate
     *
     * @return bool
     *
     * @throws TicketTemplateNotFoundException
     */
    public function update(TicketTemplate $ticketTemplate)
    {
        if (!isset($this->ticketTemplates[$ticketTemplate->getUuid()->toString()])) {
            throw new TicketTemplateNotFoundException();
        }
        
        $this->ticketTemplates[$ticketTemplate->getUuid()->toString()] = $ticketTemplate;

        return true;
    }

    /**
     * @return TicketTemplate[]
     */
    public function findAll()
    {
        return $this->ticketTemplates;
    }
}