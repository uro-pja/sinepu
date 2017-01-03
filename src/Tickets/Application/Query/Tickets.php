<?php

namespace Tickets\Application\Query;

use Tickets\Application\Query\Result\TicketResult;

interface Tickets
{
    /**
     * @return TicketResult[]
     */
    public function findAll();
}
