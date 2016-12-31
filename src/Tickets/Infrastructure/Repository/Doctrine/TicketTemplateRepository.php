<?php
/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 31/12/16
 * Time: 16:59
 */

namespace Tickets\Infrastructure\Repository\Doctrine;


use Doctrine\ORM\EntityRepository;
use Tickets\Domain\TicketTemplate;
use Tickets\Domain\TicketTemplates;

class TicketTemplateRepository extends  EntityRepository implements TicketTemplates
{


    /**
     * @param TicketTemplate $ticketTemplate
     *
     * @return boolean
     */
    public function insert(TicketTemplate $ticketTemplate)
    {
        // TODO: Implement insert() method.
        $this->getEntityManager()->persist($ticketTemplate);
        $this->getEntityManager()->flush();
    }

    /**
     * @param TicketTemplate $ticketTemplate
     *
     * @return boolean
     */
    public function update(TicketTemplate $ticketTemplate)
    {
        // TODO: Implement update() method.
    }

    public  function findAll()
    {
//        return $this->getEntityManager()->getRepository("Domain:TicketTemplate")->findAll();
    }
}