<?php

namespace Tests\Functional\AppBundle\Controller\TicketsController;

use Symfony\Component\HttpFoundation\Response;
use Tests\Functional\Builders\TicketTemplatesBuilder;
use Tests\Functional\FunctionalTestCase;

class CreateTicketTest extends FunctionalTestCase
{
    /**
     * @test
     */
    public function i_can_create_new_ticket()
    {
        TicketTemplatesBuilder::create()
            ->withName('second')
            ->persist($this->container()->get('sinepu.repository.tickets_templates'));

        $ticketRepository = $this->container()->get('sinepu.repository.tickets');
        $params = [
            'ticket' => [
                'content' => 'beniz',
                'type' => 'second'
            ]
        ];

        $this->request('POST', '/tickets/create', $params);

        $this->assertResponseStatus(Response::HTTP_FOUND);
        $tickets = $ticketRepository->findAll();
        $this->assertEquals(1, count($tickets));

        $ticket = reset($tickets);
//        $this->assertEquals('beniz', $ticket->getContent());
        $this->assertEquals('second', $ticket->getType());
    }

    /**
     * @test
     */
    public function i_can_execute_validation_errors()
    {
        $params = [
            'ticket' => [
                'content' => null,
                'type' => 'penis'
            ]
        ];

        $crawler = $this->request('POST', '/tickets/create', $params);

        $this->assertResponseStatus(Response::HTTP_OK);
        $this->assertResponseIsHtml();

        $this->assertEquals(1, $crawler->filter('div.has-error')->count());
    }
}
