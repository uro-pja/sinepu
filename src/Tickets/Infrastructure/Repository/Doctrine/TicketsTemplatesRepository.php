<?php
/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 31/12/16
 * Time: 16:59
 */

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
     */
    public function insert(TicketsTemplate $ticketTemplate)
    {
        // TODO: Implement insert() method.
        $this->getEntityManager()->persist($ticketTemplate);
        $this->getEntityManager()->flush();
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

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->findAll();

    }

    public function remove(TicketsTemplate $ticketsTemplate)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @return TicketsTemplate[]
     */
}