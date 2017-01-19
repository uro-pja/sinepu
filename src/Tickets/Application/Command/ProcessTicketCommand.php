<?php
namespace Tickets\Application\Command;

class ProcessTicketCommand
{
    /**
     * @var string
     */
    public $ticketUuid;

    /**
     * @var string
     */
    public $content;

    /**
     * @var array
     */
    public $files;
}
