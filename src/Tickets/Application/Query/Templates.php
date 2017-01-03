<?php

namespace Tickets\Application\Query;

use Tickets\Application\Query\Result\TemplateResult;

interface Templates
{
    /**
     * @return TemplateResult[]
     */
    public function findAll();
}
