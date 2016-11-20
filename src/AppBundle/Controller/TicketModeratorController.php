<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TicketModeratorController extends Controller
{
    /**
     * @param Request $request
     * @Route("/moderator/tickets")
     */
    public function listAction(Request $request)
    {
        /**
         * R
         */
    }

    /**
     * @param Request $request
     * @Route("/moderator/tickets/{uuid}/view")
     */
    public function viewAction(Request $request)
    {
        /**
         * R
         */

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
