<?php
/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 01/01/17
 * Time: 20:23
 */

namespace Tickets\Domain;


use Ramsey\Uuid\UuidInterface;

interface TicketEventInterface
{
    /**
     * @param Ticket $ticket
     *
     * @return boolean
     */
    public function insert(Ticket $ticket);

    /**
     * @param UuidInterface $uuid
     *
     * @return Ticket
     */
    public function findByUuidTicket(UuidInterface $uuid);


}