<?php

namespace AppBundle\Controller;

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
        /**
         * R
         */
        return $this->render('tickets/TicketList.html.twig');
    }
    /**
     * @param Request $request
     * @Route("/tickets/create", name="tickers_create", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {

        return $this->render('tickets/TicketAdd.html.twig');
        /**
         * R
         */
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
     * @Route("/tickets/{uuid}", name="tickets_view", methods={"GET"})
     */
    public function viewAction(Request $request)
    {
        /**
         * R
         */
    }



    /**
     * @param Request $request
     * @Route("/tickets", name="tickets_insert", methods={"POST"})
     */
    public function insertAction(Request $request)
    {
        /**
         * W
         */
    }

    /**
     * @param Request $request
     * @Route("/tickets/templates", name="tickets_templates", methods={"GET"})
     */
    public function templatesAction(Request $request)
    {

    }
}
