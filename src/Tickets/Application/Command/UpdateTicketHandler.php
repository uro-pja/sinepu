<?php
/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 02/01/17
 * Time: 23:47
 */
namespace Tickets\Application\Command;

use Tickets\Domain\TicketEvent;
use Tickets\Domain\Tickets;

class UpdateTicketHandler
{
    /**
     * @var Tickets
     */
    private $ticketsRepository;

    /**
     * @param Tickets $ticketsRepository
     */
    public function __construct(Tickets $ticketsRepository)
    {
        $this->ticketsRepository = $ticketsRepository;
    }

    /**
     * @param UpdateTicketCommand $command
     */
    public function handle(UpdateTicketCommand $command)
    {
        $ticket = $this->ticketsRepository->findOneByUuid($command->ticketUuid);
        switch ($command->status) {
            case TicketEvent::TYPE_CLOSED: {
                $ticket->accept("noob", $command->content);
            }
            case TicketEvent::TYPE_ACCEPTED: {

            }
            case TicketEvent::TYPE_AWAITING_FOR_ACCEPTATION: {

            }

        }
        $this->ticketsRepository->insert($ticket);
    }
}