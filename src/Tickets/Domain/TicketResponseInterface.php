<?php
/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 01/01/17
 * Time: 20:23
 */

namespace Tickets\Domain;


use Ramsey\Uuid\UuidInterface;

interface TicketResponseInterface
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
    public function findOneByUuid(UuidInterface $uuid);

    /**
     * @return Ticket[]|array
     */
    public function findAll();

}