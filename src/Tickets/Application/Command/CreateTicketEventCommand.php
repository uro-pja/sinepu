<?php


namespace Tickets\Application\Command;


use Ramsey\Uuid\UuidInterface;

class CreateTicketEventCommand
{
    /**
     * @var UuidInterface
     */
    private $uuid;
    /**
     * @var UuidInterface
     */
    private $ticketUuid;
    /**
     * @var string
     */
    private $status;
    /**
     * @var string
     */
    private $content;

    /**
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * TicketResponse constructor.
     * @param UuidInterface $uuid
     * @param UuidInterface $ticketUuid
     * @param string $status
     * @param string $content
     */
    public function __construct(UuidInterface $uuid, UuidInterface $ticketUuid, string $status, string $content)
    {

        $this->uuid = $uuid;
        $this->ticketUuid = $ticketUuid;
        $this->status = $status;
        $this->content = $content;
    }


}