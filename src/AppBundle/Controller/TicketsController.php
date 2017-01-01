<?php

namespace AppBundle\Controller;

use AppBundle\Form\TicketTemplateForm;
use AppBundle\Form\TicketType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TicketsController extends Controller
{
    /**
     * @param Request $request
     * @Route("/tickets", name="tickets_index", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $tickets = $this->get('sinepu.query.tickets')->findAll();

        return $this->render('tickets/TicketList.html.twig', [
            'tickets' => $tickets
        ]);
    }

    /**
     * @param Request $request
     * @Route("/tickets/create", name="tickers_create", methods={"GET", "POST"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(TicketType::class);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('sinepu.handler.create_ticket')->handle($form->getData());

            return $this->redirect($this->generateUrl("tickets_index"));
        }

        return $this->render('tickets/ticket_add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @Route("/tickets/{uuid}/update",methods={"POST"})
     */
    public function updateStatusAction(Request $request)
    {
        /**
         * W
         */
    }

    /**
     * @param Request $request
     * @Route("/admin/tickets/templates", name="tickets_templates", methods={"GET","POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function templatesAction(Request $request)
    {
        $form = $this->createForm(TicketTemplateForm::class);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('sinepu.handler.create_ticket_type')->handle($form->getData());

        }
        $templates = $this->get('sinepu.query.ticket_templates')->findAll();
        return $this->render('tickets/TicketTemplate.html.twig', [
            'form' => $form->createView(),
            'ticketTemplates' => $templates
        ]);
    }

    /**
     * @param Request $request
     * @Route("/tickets/{uuid}", name="tickets_view", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(Request $request)
    {
        $ticketRepository = $this->get('sinepu.repository.tickets');

        return $this->render("tickets/TicketView.html.twig", [
            'tickets' => $ticketRepository->findAll()
        ]);
    }
}
