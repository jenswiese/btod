<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ClimbingRoute;
use AppBundle\Form\ClimbingRouteType;

/**
 * ClimbingRoute controller.
 *
 * @Route("/climbingroute")
 */
class ClimbingRouteController extends Controller
{
    /**
     * Lists all ClimbingRoute entities.
     *
     * @Route("/", name="climbingroute_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $climbingRoutes = $em->getRepository('AppBundle:ClimbingRoute')->findAll();

        return $this->render('climbingroute/index.html.twig', array(
            'climbingRoutes' => $climbingRoutes,
        ));
    }

    /**
     * Creates a new ClimbingRoute entity.
     *
     * @Route("/new", name="climbingroute_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $climbingRoute = new ClimbingRoute();
        $form = $this->createForm('AppBundle\Form\ClimbingRouteType', $climbingRoute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($climbingRoute);
            $em->flush();

            return $this->redirectToRoute('climbingroute_show', array('id' => $climbingRoute->getId()));
        }

        return $this->render('climbingroute/new.html.twig', array(
            'climbingRoute' => $climbingRoute,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ClimbingRoute entity.
     *
     * @Route("/{id}", name="climbingroute_show")
     * @Method("GET")
     */
    public function showAction(ClimbingRoute $climbingRoute)
    {
        $deleteForm = $this->createDeleteForm($climbingRoute);

        return $this->render('climbingroute/show.html.twig', array(
            'climbingRoute' => $climbingRoute,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ClimbingRoute entity.
     *
     * @Route("/{id}/edit", name="climbingroute_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ClimbingRoute $climbingRoute)
    {
        $deleteForm = $this->createDeleteForm($climbingRoute);
        $editForm = $this->createForm('AppBundle\Form\ClimbingRouteType', $climbingRoute);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($climbingRoute);
            $em->flush();

            return $this->redirectToRoute('climbingroute_edit', array('id' => $climbingRoute->getId()));
        }

        return $this->render('climbingroute/edit.html.twig', array(
            'climbingRoute' => $climbingRoute,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ClimbingRoute entity.
     *
     * @Route("/{id}", name="climbingroute_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ClimbingRoute $climbingRoute)
    {
        $form = $this->createDeleteForm($climbingRoute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($climbingRoute);
            $em->flush();
        }

        return $this->redirectToRoute('climbingroute_index');
    }

    /**
     * Creates a form to delete a ClimbingRoute entity.
     *
     * @param ClimbingRoute $climbingRoute The ClimbingRoute entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ClimbingRoute $climbingRoute)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('climbingroute_delete', array('id' => $climbingRoute->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
