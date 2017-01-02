<?php
/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 02/01/17
 * Time: 18:31
 */
namespace Tickets\Domain;

class TicketStatus
{
    public $TicketStatus = array(
        1 => 'open',
        2 => 'closed',
        3 => 'rejected',
        4 => 'awaiting_for_acceptation',
        5 => 'accepted'
    );

    /**
     * @return array
     */
    public function getTicketStatus(): array
    {
        return $this->TicketStatus;
    }

    public function getTicketStatusIdByTag(string $tag)
    {
        return array_search($tag, $this->TicketStatus);
    }

}