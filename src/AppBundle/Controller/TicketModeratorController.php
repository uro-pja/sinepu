<?php
namespace AppBundle\Controller;

use AppBundle\Form\ModeratorTicketUpdateForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TicketModeratorController extends Controller
{
    /**
     * @param Request $request
     * @Route("/moderator/tickets", name="moderator_ticket_list", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $tickets = $this->get('sinepu.query.tickets')->getAll();
        return $this->render('tickets/Moderator/ModeratorTicketList.html.twig', [
            'tickets' => $tickets
        ]);
    }

    /**
     * @param $uuid
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/moderator/tickets/view/{uuid}", name="moderator_ticket_view", methods={"GET"})
     */
    public function viewAction($uuid)
    {
        $form = $this->createForm(ModeratorTicketUpdateForm::class);
        $ticket = $this->get('sinepu.query.tickets')->getTicket($uuid);
        return $this->render("tickets/Moderator/ModeratorTicketResponce.html.twig", [
            'ticket' => $ticket,
            'ticketUuid' => $uuid,
            'form' => $form->createView()
        ]);

    }

    /**
     * @param Request $request
     * @Route("/moderator/tickets/{uuid}/update")
     */
    public function updateAction(Request $request)
    {
        /**
         *
         */

    }

}
