<?php

namespace tests\Functional\AppBundle\Controller\TicketsController;

use Symfony\Component\HttpFoundation\Response;
use Tests\Functional\Builders\TicketTemplateBuilder;
use Tests\Functional\FunctionalTestCase;

class TicketTemplatesTest extends FunctionalTestCase
{
    /**
     * @test
     */
    public function i_can_see_template_list_as_json()
    {
        TicketTemplateBuilder::create()
            ->persist($this->container()->get('sinepu.repository.tickets_templates'));
        TicketTemplateBuilder::create()
            ->withName("Sinepu!")
            ->withContent("This is a test.")
            ->persist($this->container()->get('sinepu.repository.tickets_templates'));

        $this->request('GET', '/tickets/templates');

        $this->assertResponseStatus(Response::HTTP_OK);
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
