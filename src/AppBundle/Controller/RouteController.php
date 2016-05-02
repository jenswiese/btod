<?php

/**
 * Class RouteController
 *
 * This Software is the property of superReal and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * @link      http://www.superreal.de
 * @package   AppBundle\Controller
 * @copyright (C) superReal 2015
 * @author    Jens Wiese <j.wiese AT superreal.de>
 */

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;

class RouteController extends FOSRestController
{

    /**
     * @Route(path="/route/list")
     *
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing routes.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many routes to return.")
     *
     * @Annotations\View()
     *
     * @param string $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction($slug)
    {
        $view = new View(array('moo' => $slug), 200);
        $view->setFormat('json');

        return $this->handleView($view);
    }

    /**
     * @Route(path="/route/new")
     *
     * @param Request $request
     */
    public function newAction(Request $request)
    {
        $view = new View(array('moo' => 'foo'), 200);
        $view->setFormat('json');

        return $this->handleView($view);
    }


}