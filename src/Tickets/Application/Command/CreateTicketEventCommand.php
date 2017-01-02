<?php


namespace Tickets\Application\Command;


use DateTimeInterface;
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
     * @var string
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

    /**
     * TicketResponse constructor.
     * @param UuidInterface $uuid
     * @param UuidInterface $ticketUuid
     * @param string $status
     * @param string $content
     * @param array $files
     */
    public function __construct(UuidInterface $uuid, UuidInterface $ticketUuid, string $status, string $content, array $files)
    {
        $this->uuid = $uuid;
        $this->ticketUuid = $ticketUuid;
        $this->status = $status;
        $this->content = $content;
        $this->files = $files;
    }


}