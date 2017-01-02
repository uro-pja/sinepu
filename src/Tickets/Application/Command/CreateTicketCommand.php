<?php
namespace Tickets\Application\Command;

use DateTimeInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Tickets\Domain\TicketStatus;

class CreateTicketCommand
{
    /**
     * @var UuidInterface
     */
    public $ticketUuid;

    /**
     * @var UuidInterface
     */
    public $eventUuid;

    /**
     * @var Integer
     */
    public $status;

    /**
     * @var string
     */
    public $content;

    /**
     * @var array
     */
    public $files;

    /**
     * @var array
     */
    public $type;

    /**
     * @var DateTimeInterface
     */
    public $createdAt;

    public function __construct()
    {
        $this->ticketUuid = Uuid::uuid4();
        $this->eventUuid = Uuid::uuid4();
        $TicketStatus = new TicketStatus();
        $this->status = $TicketStatus->getTicketStatusIdByTag("open");
    }
}
