<?php

namespace Tickets\Domain;

use Ramsey\Uuid\UuidInterface;

class TicketTemplate
{
    /**
     * @var UuidInterface
     */
    private $uuid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $annotations;

    /**
     * TemplateResult constructor.
     * @param UuidInterface $uuid
     * @param string $name
     * @param string $content
     * @param string $annotations
     */
    public function __construct(UuidInterface $uuid, $name, $content, $annotations)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->content = $content;
        $this->annotations = $annotations;
    }

    /**
     * @return UuidInterface
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getAnnotations()
    {
        return $this->annotations;
    }
}
