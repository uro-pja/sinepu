<?php

namespace Tests\Functional\AppBundle\Controller;

use Tests\Functional\Builders\TicketTemplateBuilder;
use Tests\Functional\FunctionalTestCase;

class TicketsControllerTest extends FunctionalTestCase
{
    /**
     * @test
     */
    public function i_can_see_tickets()
    {
        /**
         * GIVEN
         *
         * Add 1 object to database
         *
         */

        $crawler = $this->request('GET', '/tickets');

        $this->assertResponseStatus(200);
        $this->assertResponseIsHtml();

        $this->assertContains('Usuniecie konta', $this->response()->getContent());
        $this->assertContains('January 1, 2000 00:00', $this->response()->getContent());
        $this->assertContains('June 27, 2003 04:59', $this->response()->getContent());
        $this->assertContains('Oczekuje na analize', $this->response()->getContent());

    }

    /**
     * @test
     */
    public function i_can_see_template_list_as_json()
    {
        TicketTemplateBuilder::create()
            ->persist($this->container()->get('sinepu.tickets.templates_repository'));
        TicketTemplateBuilder::create()
            ->withName("Sinepu!")
            ->withContent("This is a test.")
            ->persist($this->container()->get('sinepu.tickets.templates_repository'));

        $this->request('GET', '/tickets/templates');

        $this->assertResponseStatus(200);
        $this->assertResponseIsJson();

        $response = json_decode($this->response()->getContent());

        $this->assertEquals(2, count($response));
        $this->assertObjectHasAttribute('name', $response[0]);
        $this->assertObjectHasAttribute('content', $response[0]);
        $this->assertObjectHasAttribute('annotations', $response[0]);

        $this->assertEquals('o zwolnienie', $response[0]->name);
        $this->assertEquals('Prosze o zwolnienie mnie', $response[0]->content);
        $this->assertEquals('asdf', $response[0]->annotations);

        $this->assertEquals('Sinepu!', $response[1]->name);
        $this->assertEquals('This is a test.', $response[1]->content);
        $this->assertEquals('asdf', $response[1]->annotations);
    }
}
