<?php

namespace Tickets\Application\Query;

use Tickets\Application\Query\Result\TicketResult;

interface Tickets
{
    /**
     * @return TicketResult[]
     */
    public function getAll();

    /**
     * @param string $uuid
     *
     * @return TicketResult
     */
    public function getTicket(string $uuid);
}
