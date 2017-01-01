<?php
/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 01/01/17
 * Time: 11:37
 */

namespace Tickets\Application\Command;


use Tickets\Domain\TicketsTemplate;
use Tickets\Domain\TicketsTemplates;

class CreateTicketTemplateHandler
{

    /**
     * @var TicketsTemplates
     */
    private $ticketsTemplates;

    public function __construct(TicketsTemplates $ticketsTemplates)
    {

        $this->ticketsTemplates = $ticketsTemplates;
    }

    /**
     * @param CreateTicketTemplateCommand $command
     */
    public function handle(CreateTicketTemplateCommand $command)
    {
        $ticketTemplate = new TicketsTemplate(
            $command->uuid,
            $command->name,
            $command->content,
            $command->annotations

        );
        $this->ticketsTemplates->insert($ticketTemplate);

    }


}