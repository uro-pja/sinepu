<?php

namespace AppBundle\Controller;

use AppBundle\Form\TicketTemplateForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Tickets\Domain\Exception\TicketTemplateAlreadyExistException;

class TicketTemplate extends Controller
{
    /**
     * @param Request $request
     * @Route("/admin/tickets/templates", name="tickets_templates", methods={"GET","POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function templatesListAndAdd(Request $request)
    {
        $form = $this->createForm(TicketTemplateForm::class);
        $form->handleRequest($request);
        $errors = [];
        if ($form->isValid()) {
            try {
                $this->get('sinepu.handler.create_ticket_type')->handle($form->getData());
            } catch (TicketTemplateAlreadyExistException $e) {
                $errors = ["name" => "Nazwa Zajeta"];
            }
        }
        $templates = $this->get('sinepu.query.ticket_templates')->getAll();
        return $this->render('tickets/TicketTemplate.html.twig', [
            'form' => $form->createView(),
            'ticketTemplates' => $templates,
            'error' => $errors
        ]);
    }

}