<?php
namespace Tickets\Application\Command;

use DateTimeInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class CreateTicketEventCommand
{
    /**
     * @var UuidInterface
     */
    public $uuid;

    /**
     * @var UuidInterface
     */
    public $ticketUuid;

    /**
     * @var  integer
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
     * @var DateTimeInterface
     */
    public $createdAt;

    public function __construct()
    {
        $this->uuid = Uuid::uuid4();

    }

}