<?php

namespace Tickets\Domain;

interface TicketsTemplates
{
    /**
     * @param TicketsTemplate $ticketTemplate
     *
     * @return boolean
     */
    public function insert(TicketsTemplate $ticketTemplate);

    /**
     * @param TicketsTemplate $ticketTemplate
     *
     * @return boolean
     */
    public function update(TicketsTemplate $ticketTemplate);

    /**
     * @return TicketsTemplate[]
     */
    public function getAll();


}
