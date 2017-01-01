<?php

namespace Tickets\Infrastructure\Repository\InMemory;

use Tickets\Domain\Exception\TicketTemplateNotFoundException;
use Tickets\Domain\TicketsTemplate;
use Tickets\Domain\TicketsTemplates;

class TicketsTemplatesRepository implements TicketsTemplates
{
    /**
     * @var TicketsTemplate[]
     */
    private $ticketTemplates = [];

    /**
     * @param TicketsTemplate $ticketTemplate
     *
     * @return boolean
     */
    public function insert(TicketsTemplate $ticketTemplate)
    {
        $this->ticketTemplates[$ticketTemplate->getUuid()->toString()] = $ticketTemplate;

        return true;
    }

    /**
     * @param TicketsTemplate $ticketTemplate
     *
     * @return bool
     *
     * @throws TicketTemplateNotFoundException
     */
    public function update(TicketsTemplate $ticketTemplate)
    {
        if (!isset($this->ticketTemplates[$ticketTemplate->getUuid()->toString()])) {
            throw new TicketTemplateNotFoundException();
        }
        
        $this->ticketTemplates[$ticketTemplate->getUuid()->toString()] = $ticketTemplate;

        return true;
    }

    /**
     * @return TicketsTemplate[]
     */
    public function findAll()
    {
        return $this->ticketTemplates;
    }

    /**
     * @param string $name
     *
     * @return boolean
     */
    public function existWithName($name)
    {
        if (array_search($name, $this->ticketTemplates)) {

            return true;
        }

        return false;
    }
}
