<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StudentsController extends Controller
{
    /**
     * @param Request $request
     * @Route("/moderator/students")
     */
    public function listAction(Request $request)
    {
        /**
         * R
         */

    }

    /**
     * @param Request $request
     * @Route("/moderator/students/{uuid}")
     */
    public function viewAction(Request $request)
    {
        /**
         * R
         */
    }


}