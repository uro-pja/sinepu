<?php
namespace Tickets\Application\Command;

use DateTimeInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class CreateTicketCommand
{
    /**
     * @var UuidInterface
     */
    public $ticketUuid;

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
    }
}
