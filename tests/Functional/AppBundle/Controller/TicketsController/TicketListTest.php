<?php

namespace tests\Functional\AppBundle\Controller\TicketsController;

use Symfony\Component\HttpFoundation\Response;
use Tests\Functional\FunctionalTestCase;

class TicketListTest extends FunctionalTestCase
{
    /**
     * @test
     */
    public function i_can_see_tickets()
    {
        $crawler = $this->request('GET', '/tickets');

        $this->assertResponseStatus(Response::HTTP_OK);
        $this->assertResponseIsHtml();
    }
}
