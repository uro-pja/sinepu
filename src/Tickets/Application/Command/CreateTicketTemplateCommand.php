<?php
/**
 * Created by PhpStorm.
 * User: arsob
 * Date: 01/01/17
 * Time: 11:37
 */

namespace Tickets\Application\Command;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class CreateTicketTemplateCommand
{
    /**
     * @var UuidInterface
     */
    public $uuid;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $annotations;


    public function __construct()
    {
        $this->uuid = Uuid::uuid4();
    }



}