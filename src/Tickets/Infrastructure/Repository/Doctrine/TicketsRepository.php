<?php
namespace Tickets\Infrastructure\Repository\Doctrine;

use Doctrine\ORM\EntityRepository;
use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\Ticket;
use Tickets\Domain\Tickets;

class TicketsRepository extends EntityRepository implements Tickets
{
    /**
     * @param Ticket $ticket
     *
     * @return boolean
     */
    public function insert(Ticket $ticket)
    {
        $this->getEntityManager()->persist($ticket);
        $this->getEntityManager()->flush();
        return true;
    }

    /**
     * @param UuidInterface $uuid
     *
     * @return Ticket|object
     */
    public function findOneByUuid(UuidInterface $uuid)
    {
        return $this->findOneBy(['uuid' => $uuid]);
    }

}
