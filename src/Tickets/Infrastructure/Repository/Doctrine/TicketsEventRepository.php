<?php
namespace Tickets\Infrastructure\Repository\Doctrine;

use Doctrine\ORM\EntityRepository;
use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\TicketEvent;
use Tickets\Domain\TicketEventInterface;

class TicketsEventRepository extends EntityRepository implements TicketEventInterface
{

    /**
     * @param TicketEvent $ticketEvent
     * @return bool
     * @internal param Ticket $ticket
     *
     */
    public function insert(TicketEvent $ticketEvent)
    {
        $this->getEntityManager()->persist($ticketEvent);
        $this->getEntityManager()->flush();
        return true;
    }

    /**
     * @param UuidInterface $uuid
     *
     * @return array
     */
    public function findAllEventForTicket(UuidInterface $uuid)
    {
        return $this->findBy(["ticketUuid" => $uuid->toString()]);
    }

}