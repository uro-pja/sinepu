<?php
/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 02/01/17
 * Time: 23:46
 */
namespace Tickets\Application\Command;

use Ramsey\Uuid\UuidInterface;

class UpdateTicketCommand
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

}