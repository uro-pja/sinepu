<?php

namespace tests\Functional\AppBundle\Controller\TicketsController;

use Symfony\Component\HttpFoundation\Response;
use Tests\Functional\Builders\TicketTemplatesBuilder;
use Tests\Functional\FunctionalTestCase;

class TicketTemplatesTest extends FunctionalTestCase
{
    /**
     * @test
     * deprecated
     */
//    public function i_can_see_template_list_as_json()
//    {
//        TicketTemplatesBuilder::create()
//            ->persist($this->container()->get('sinepu.repository.tickets_templates'));
//        TicketTemplatesBuilder::create()
//            ->withName("Sinepu!")
//            ->withContent("This is a test.")
//            ->persist($this->container()->get('sinepu.repository.tickets_templates'));
//
//        $this->request('GET', '/tickets/templates');
//
//        $this->assertResponseStatus(Response::HTTP_OK);
//        $this->assertResponseIsJson();
//
//        $response = json_decode($this->response()->getContent());
//
//        $this->assertEquals(2, count($response));
//        $this->assertObjectHasAttribute('name', $response[0]);
//        $this->assertObjectHasAttribute('content', $response[0]);
//        $this->assertObjectHasAttribute('annotations', $response[0]);
//
//        $this->assertEquals('o zwolnienie', $response[0]->name);
//        $this->assertEquals('Prosze o zwolnienie mnie', $response[0]->content);
//        $this->assertEquals('asdf', $response[0]->annotations);
//
//        $this->assertEquals('Sinepu!', $response[1]->name);
//        $this->assertEquals('This is a test.', $response[1]->content);
//        $this->assertEquals('asdf', $response[1]->annotations);
//    }

    /**
     * @test
     */
    public function i_can_create_new_ticket_via_command()
    {
        $ticketRepository = $this->container()->get('sinepu.repository.tickets_templates');
        $handler = $this->container()->get('sinepu.handler.create_ticket_type');
        $command = $this->container()->get('sinepu.handler.create_ticket_type_command');
        $command->annotations = "ads";
        $command->name = "name_test";
        $command->content = "content";
        $handler->handle($command);


        $tickets = $ticketRepository->getAll();
        $this->assertEquals(1, count($tickets));

        $ticket = reset($tickets);

        $this->assertEquals('content', $ticket->getContent());
        $this->assertEquals('name_test',$ticket->getName());
        $this->assertEquals('ads',$ticket->getannotations());
    }


}
