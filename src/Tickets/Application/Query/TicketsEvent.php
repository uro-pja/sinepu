<?php
namespace Tickets\Application\Query;

interface TicketsEvent
{
    /**
     * @param string $uuid
     * @return array
     */
    public function findAllEventForTicket(string $uuid): array;

}