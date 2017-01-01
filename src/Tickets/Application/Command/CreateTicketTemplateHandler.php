<?php

namespace Tickets\Application\Command;

use Tickets\Domain\Exception\TicketTemplateAlreadyExistException;
use Tickets\Domain\TicketsTemplate;
use Tickets\Domain\TicketsTemplates;

class CreateTicketTemplateHandler
{
    /**
     * @var TicketsTemplates
     */
    private $ticketsTemplates;

    /**
     * @param TicketsTemplates $ticketsTemplates
     */
    public function __construct(TicketsTemplates $ticketsTemplates)
    {
        $this->ticketsTemplates = $ticketsTemplates;
    }

    /**
     * @param CreateTicketTemplateCommand $command
     *
     * @throws TicketTemplateAlreadyExistException
     */
    public function handle(CreateTicketTemplateCommand $command)
    {
        if($this->ticketsTemplates->existWithName($command->name)) {
            throw new TicketTemplateAlreadyExistException();
        }

        $ticketTemplate = new TicketsTemplate(
            $command->uuid,
            $command->name,
            $command->content,
            $command->annotations

        );
        $this->ticketsTemplates->insert($ticketTemplate);

    }


}