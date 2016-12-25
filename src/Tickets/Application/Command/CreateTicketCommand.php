<?php

namespace Tickets\Application\Command;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class CreateTicketCommand
{
    /**
     * @var UuidInterface
     */
    public $uuid;

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $type;

    /**
     * @var array
     */
    public $files = [];

    public function __construct()
    {
        $this->uuid = Uuid::uuid4();
    }
}
