<?php

namespace Tickets\Infrastructure\Repository\Doctrine;

use Doctrine\ORM\EntityRepository;
use Ramsey\Uuid\Uuid;
use Tickets\Domain\Ticket;
use Tickets\Domain\Tickets;

class TicketRepository extends EntityRepository implements Tickets
{
    /**
     * @param Ticket $ticket
     *
     * @return boolean
     */
    public function insert(Ticket $ticket)
    {
        $this->_em->persist($ticket);
        $this->_em->flush();

        return true;
    }

    /**
     * @param Uuid $uuid
     *
     * @return Ticket|object
     */
    public function findOneByUuid(Uuid $uuid)
    {
        return $this->findOneBy(['uuid' => $uuid]);
    }
}
