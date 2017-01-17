<?php
namespace AppBundle\Controller;

use AppBundle\Form\ModeratorTicketAnalise;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Tickets\Domain\TicketEvent;

class TicketModeratorController extends Controller
{
    /**
     * @param Request $request
     * @Route("/moderator/tickets/list/AwaitingToAnalise", name="moderator_ticket_list_awaiting_to_analise(", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listActionAwaitingToAnalise(Request $request)
    {
        $tickets = $this->get('sinepu.query.tickets')->getTicketListWithStatus(TicketEvent::TYPE_OPEN);
        return $this->render('tickets/Moderator/List/ModeratorTicketListAwaitingToAnalise.html.twig', [
            'tickets' => $tickets
        ]);
    }

    /**
     * @param Request $request
     * @Route("/moderator/tickets/list/history", name="moderator_ticket_list_history", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listActionHistory(Request $request)
    {
        $tickets[TicketEvent::TYPE_CLOSED] = $this->get('sinepu.query.tickets')->getTicketListWithStatus(TicketEvent::TYPE_CLOSED);
        $tickets[TicketEvent::TYPE_REJECTED] = $this->get('sinepu.query.tickets')->getTicketListWithStatus(TicketEvent::TYPE_REJECTED);
        return $this->render('tickets/Moderator/List/ModeratorTicketListHistory.html.twig', [
            'tickets' => $tickets
        ]);
    }

    /**
     * @param Request $request
     * @Route("/moderator/tickets/list/ToRealisation", name="moderator_ticket_list_to_realisation", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listActionToRealisation(Request $request)
    {
        $tickets = $this->get('sinepu.query.tickets')->getTicketListWithStatus(TicketEvent::TYPE_ACCEPTED);
        return $this->render('tickets/Moderator/List/ModeratorTicketListToRealisation.html.twig', [
            'tickets' => $tickets
        ]);
    }

    /**
     * @param Request $request
     * @Route("/moderator/tickets/view/AwaitingToAnalise", name="moderator_ticket_view_awaiting_to_analise(", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewActionAwaitingToAnalise(Request $request)
    {

    }

    /**
     * @param Request $request
     * @Route("/moderator/tickets/view/history/{uuid}", name="moderator_ticket_view_history", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewActionHistory(Request $request)
    {

    }

    /**
     * @param Request $request
     * @Route("/moderator/tickets/view/ToRealisation/{uuid}", name="moderator_ticket_view_to_realisation", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewActionToRealisation(Request $request)
    {

    }

    /**
     * @param $uuid
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Tickets\Domain\Exception\TicketNotFoundException
     * @Route("/moderator/tickets/view/{uuid}", name="moderator_ticket_view", methods={"GET","POST"})
     */
    public function viewAction($uuid)
    {
        $form = $this->createForm(ModeratorTicketAnalise::class);
        $ticket = $this->get('sinepu.query.tickets')->getTicket($uuid);
        if ($form->isValid()) {
            $this->get('sinepu.handler.update_ticket')->handle($form->getData());
        }
        return $this->render('tickets/Moderator/View/ModeratorTicketAwaitingToAnalise.html.twig', [
            'ticket' => $ticket,
            'ticketUuid' => $uuid,
            'form' => $form->createView(),
        ]);

    }

}
