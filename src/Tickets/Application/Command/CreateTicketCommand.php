<?php

namespace Tickets\Application\Command;

class CreateTicketCommand
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $text;
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $file;

    /**
     * @param string $name
     * @param string $text
     * @param string $type
     */
    public function __construct($name, $text, $type)
    {
        $this->name = $name;
        $this->text = $text;
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
