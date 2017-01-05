<?php

namespace Tickets\Infrastructure\Repository\Doctrine;

use Doctrine\ORM\EntityRepository;
use Tickets\Domain\TicketsTemplate;
use Tickets\Domain\TicketsTemplates;

class TicketsTemplatesRepository extends EntityRepository implements TicketsTemplates
{
    /**
     * @param TicketsTemplate $ticketTemplate
     *
     * @return boolean
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\ORMInvalidArgumentException
     */
    public function insert(TicketsTemplate $ticketTemplate)
    {
        $this->getEntityManager()->persist($ticketTemplate);
        $this->getEntityManager()->flush();

        return true;
    }



    public function remove(TicketsTemplate $ticketsTemplate)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @param string $name
     *
     * @return boolean
     */
    public function existWithName($name)
    {
        return (bool)$this->findOneBy(['name' => $name]);
    }

    /**
     * @param TicketsTemplate $ticketTemplate
     *
     * @return boolean
     */
    public function update(TicketsTemplate $ticketTemplate)
    {
        // TODO: Implement update() method.
    }
}
