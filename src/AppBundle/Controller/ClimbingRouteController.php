<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\ClimbingRouteType;
use AppBundle\Entity\ClimbingRoute;

class ClimbingRouteController extends Controller
{

    /**
     * @Route(path="/route/new")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $route = new ClimbingRoute();
        $route->setName('moo');

        $form = $this->createForm(ClimbingRouteType::class, $route);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('app_climbingroute_new');
        }

        var_dump($route);

        return $this->render(':route:edit.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
