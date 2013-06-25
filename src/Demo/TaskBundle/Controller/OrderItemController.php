<?php

namespace Demo\TaskBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Demo\TaskBundle\Entity\OrderItem;
use Demo\TaskBundle\Form\OrderItemType;

/**
 * OrderItem controller.
 *
 */
class OrderItemController extends Controller
{
    /**
     * Lists all OrderItem entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DemoTaskBundle:OrderItem')->findAll();

        return $this->render('DemoTaskBundle:OrderItem:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new OrderItem entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new OrderItem();
        $form = $this->createForm(new OrderItemType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('demo_taskorderitem_show', array('id' => $entity->getId())));
        }

        return $this->render('DemoTaskBundle:OrderItem:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new OrderItem entity.
     *
     */
    public function newAction()
    {
        $entity = new OrderItem();
        $form   = $this->createForm(new OrderItemType(), $entity);

        return $this->render('DemoTaskBundle:OrderItem:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a OrderItem entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemoTaskBundle:OrderItem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrderItem entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DemoTaskBundle:OrderItem:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing OrderItem entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemoTaskBundle:OrderItem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrderItem entity.');
        }

        $editForm = $this->createForm(new OrderItemType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DemoTaskBundle:OrderItem:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing OrderItem entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemoTaskBundle:OrderItem')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrderItem entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new OrderItemType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('demo_taskorderitem_edit', array('id' => $id)));
        }

        return $this->render('DemoTaskBundle:OrderItem:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a OrderItem entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DemoTaskBundle:OrderItem')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OrderItem entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('demo_taskorderitem'));
    }

    /**
     * Creates a form to delete a OrderItem entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
