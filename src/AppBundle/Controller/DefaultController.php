<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Route as ClimbingRoute;
use AppBundle\Entity\Section;
use AppBundle\Entity\Spot;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
//        $spot = new Spot();
//        $spot->setName('Boulder-Point');
//
//        $section = new Section();
//        $section->setName('Sektion 11');
//        $section->setSpot($spot);
//
//        $setter = new User();
//        $setter->setName('Jonas');
//        $setter->setLoginname('dwdw');
//        $setter->setPassword('fewfew');
//
//        $route = new ClimbingRoute();
//        $route->setName('23');
//        $route->setSetter($setter);
//        $route->setSection($section);
//
//        $this->getDoctrine()->getManager()->persist($route);
//        $this->getDoctrine()->getManager()->flush();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}
