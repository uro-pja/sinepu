<?php
namespace AppBundle\Controller;

use AppBundle\Form\TicketType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Tickets\Application\Command\ProcessTicketCommand;

class TicketsController extends Controller
{
    /**
     * @Route("/tickets", name="tickets_index", methods={"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $tickets = $this->get('sinepu.query.tickets')->getAll();
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
        $form->getData();
        if ($form->isValid()) {
            $this->get('sinepu.handler.create_ticket')->handle($form->getData());
            return $this->redirect($this->generateUrl("tickets_index"));
        }
        return $this->render('tickets/ticket_add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param string $uuid
     * @return \Symfony\Component\HttpFoundation\Response
     * @internal param Request $request
     * @Route("/tickets/{uuid}", name="tickets_view", methods={"GET"})
     */
    public function viewAction($uuid)
    {
        $ticket = $this->get('sinepu.query.tickets')->getTicket($uuid);
        return $this->render("tickets/TicketView.html.twig", [
            'ticket' => $ticket,
            'ticketUuid' => $uuid
        ]);
    }
}
