<?php
namespace AppBundle\Controller;

use InvalidArgumentException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Tickets\Application\Command\ProcessTicketCommand;
use Tickets\Domain\TicketEvent;

class TicketModeratorController extends Controller
{
    /**
     * @param Request $request
     * @Route("/moderator/tickets/list/AwaitingToAnalise", name="moderator_ticket_list_awaiting_to_analise", methods={"GET"})
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
        $tickets = $this->get('sinepu.query.tickets')->getTicketListWithStatus(TicketEvent::TYPE_OPEN);
        return $this->render('tickets/Moderator/List/ModeratorTicketListAwaitingToAnalise.html.twig.html.twig', [
            'tickets' => $tickets
        ]);
    }

    /**
     * @param Request $request
     * @Route("/moderator/tickets/view/history/{uuid}", name="moderator_ticket_view_history", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewActionHistory(Request $request)
    {
        $tickets = $this->get('sinepu.query.tickets')->getTicketListWithStatus(TicketEvent::TYPE_ACCEPTED);
        return $this->render('tickets/Moderator/List/ModeratorTicketListHistory.html.twig.html.twig', [
            'tickets' => $tickets
        ]);
    }

    /**
     * @param Request $request
     * @Route("/moderator/tickets/view/ToRealisation/{uuid}", name="moderator_ticket_view_to_realisation", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewActionToRealisation(Request $request)
    {
        $tickets = $this->get('sinepu.query.tickets')->getTicketListWithStatus(TicketEvent::TYPE_ACCEPTED);
        return $this->render('tickets/Moderator/List/ModeratorTicketListToRealisation.html.twig.html.twig', [
            'tickets' => $tickets
        ]);
    }

    /**
     * @param $uuid
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/moderator/tickets/view/{uuid}", name="moderator_ticket_view", methods={"GET","POST"})
     */
    public function viewAction($uuid)
    {
        $ticket = $this->get('sinepu.query.tickets')->getTicket($uuid);

        $command = new ProcessTicketCommand();
        $command->ticketUuid = $uuid;

        $form = $this->createForm('AppBundle\Form\ProcessTicketForm', $command);

        return $this->render('tickets/Moderator/View/ModeratorTicketAwaitingToAnalise.html.twig', [
            'ticket' => $ticket,
            'ticketUuid' => $uuid,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/moderator/process/{uuid}", name="moderator_ticket_process", methods={"POST"})
     *
     * @param Request $request
     */
    public function processAction(Request $request, String $uuid)
    {
        $form = $this->createForm('AppBundle\Form\ProcessTicketForm', new ProcessTicketCommand());

        $form->handleRequest($request);

        /** @var ProcessTicketCommand $command */
        $command = $form->getData();
        $command->ticketUuid = $uuid;
//        var_dump($command);
//        var_dump($form->getClickedButton()->getName());
//        die;

        switch ($form->getClickedButton()->getName()) {
            case TicketEvent::TYPES[TicketEvent::TYPE_AWAITING_FOR_ACCEPTATION]:
                $this->get('sinepu.handler.update_ticket')->acceptTicket($command);
                break;
            case TicketEvent::TYPES[TicketEvent::TYPE_REJECTED]:

                $this->get('sinepu.handler.update_ticket')->rejectTicket($command);
                break;
            default:
                throw new InvalidArgumentException("Invalid ticket type");
        }
        return $this->redirectToRoute("moderator_ticket_list_awaiting_to_analise");
    }
}
