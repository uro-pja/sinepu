<?php

namespace Tickets\Domain;

interface TicketTemplates
{
    /**
     * @param TicketTemplate $ticketTemplate
     *
     * @return boolean
     */
    public function insert(TicketTemplate $ticketTemplate);

    /**
     * @param TicketTemplate $ticketTemplate
     *
     * @return boolean
     */
    public function update(TicketTemplate $ticketTemplate);

    /**
     * @return TicketTemplate[]
     */
    public function findAll();
}
