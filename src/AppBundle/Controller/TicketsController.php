<?php

namespace AppBundle\Controller;

use AppBundle\Form\TicketType;
use DateTimeImmutable;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $tickets = $this->container->get('sinepu.query.tickets')->getAll();

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
     * @Route("/tickets/templates", name="tickets_templates", methods={"GET"})
     *
     * @return JsonResponse
     */
    public function templatesAction(Request $request)
    {
        $templates = $this->get('sinepu.query.ticket_templates')->getAll();

        return new JsonResponse($templates);
    }

    /**
     * @param Request $request
     * @Route("/tickets/{uuid}", name="tickets_view", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(Request $request)
    {
        $ticketRepository = $this->container->get('sinepu.repository.tickets');

        return $this->render("tickets/TicketView.html.twig", [
            'tickets' => $ticketRepository->findAll()
        ]);
    }
}
