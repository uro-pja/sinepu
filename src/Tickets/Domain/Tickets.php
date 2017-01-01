<?php

namespace Tickets\Domain;

use Ramsey\Uuid\Uuid;

interface Tickets
{
    /**
     * @param Ticket $ticket
     *
     * @return boolean
     */
    public function insert(Ticket $ticket);

    /**
     * @param Uuid $uuid
     *
     * @return Ticket
     */
    public function findOneByUuid(Uuid $uuid);

    /**
     * @return Ticket[]|array
     */
    public function findAll();
}
