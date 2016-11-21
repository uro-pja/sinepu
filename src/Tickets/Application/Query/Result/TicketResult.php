<?php

namespace Tickets\Application\Query\Result;

use DateTimeInterface;
use Tickets\Domain\TicketTemplate;

class TicketResult
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $status;

    /**
     * @var DateTimeInterface
     */
    public $createdAt;

    /**
     * @var DateTimeInterface
     */
    public $updatedAt;

    /**
     * Templates constructor.
     * @param string $type
     * @param string $status
     * @param DateTimeInterface $createdAt
     * @param DateTimeInterface $updatedAt
     */
    public function __construct($type, $status, DateTimeInterface $createdAt, DateTimeInterface $updatedAt)
    {
        $this->type = $type;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}
