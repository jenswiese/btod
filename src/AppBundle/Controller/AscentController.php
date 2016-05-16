<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Ascent;
use AppBundle\Form\AscentType;

/**
 * Ascent controller.
 *
 * @Route("/ascent")
 */
class AscentController extends Controller
{
    /**
     * Lists all Ascent entities.
     *
     * @Route("/", name="ascent_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ascents = $em->getRepository('AppBundle:Ascent')->findAll();

        return $this->render('ascent/index.html.twig', array(
            'ascents' => $ascents,
        ));
    }

    /**
     * Creates a new Ascent entity.
     *
     * @Route("/new", name="ascent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ascent = new Ascent();
        $form = $this->createForm('AppBundle\Form\AscentType', $ascent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ascent);
            $em->flush();

            return $this->redirectToRoute('ascent_show', array('id' => $ascent->getId()));
        }

        return $this->render('ascent/new.html.twig', array(
            'ascent' => $ascent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ascent entity.
     *
     * @Route("/{id}", name="ascent_show")
     * @Method("GET")
     */
    public function showAction(Ascent $ascent)
    {
        $deleteForm = $this->createDeleteForm($ascent);

        return $this->render('ascent/show.html.twig', array(
            'ascent' => $ascent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ascent entity.
     *
     * @Route("/{id}/edit", name="ascent_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ascent $ascent)
    {
        $deleteForm = $this->createDeleteForm($ascent);
        $editForm = $this->createForm('AppBundle\Form\AscentType', $ascent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ascent);
            $em->flush();

            return $this->redirectToRoute('ascent_edit', array('id' => $ascent->getId()));
        }

        return $this->render('ascent/edit.html.twig', array(
            'ascent' => $ascent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Ascent entity.
     *
     * @Route("/{id}", name="ascent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ascent $ascent)
    {
        $form = $this->createDeleteForm($ascent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ascent);
            $em->flush();
        }

        return $this->redirectToRoute('ascent_index');
    }

    /**
     * Creates a form to delete a Ascent entity.
     *
     * @param Ascent $ascent The Ascent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ascent $ascent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ascent_delete', array('id' => $ascent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
