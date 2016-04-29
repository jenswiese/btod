<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Route;
use AppBundle\Entity\Section;
use AppBundle\Entity\Spot;
use AppBundle\Entity\User;
use Doctrine\Common\Annotations\Annotation\IgnoreAnnotation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/***
 * @IgnoreAnnotation("Route")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $spot = new Spot();
        $spot->setName('Boulder-Point');

        $section = new Section();
        $section->setName('Sektion 11');
        $section->setSpot($spot);

        $setter = new User();
        $setter->setName('Jonas');

//        $route = new Route();
//        $route->setName('23');
//        $route->setSetter($setter);
//        $route->setSection($section);


//        $this->getDoctrine()->getManager()->persist($route);
//        $this->getDoctrine()->getManager()->flush();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}
