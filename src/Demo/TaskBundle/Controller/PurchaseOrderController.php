<?php

namespace Demo\TaskBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Demo\TaskBundle\Entity\PurchaseOrder;
use Demo\TaskBundle\Form\PurchaseOrderType;

/**
 * PurchaseOrder controller.
 *
 */
class PurchaseOrderController extends Controller
{
    /**
     * Lists all PurchaseOrder entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DemoTaskBundle:PurchaseOrder')->findAll();

        return $this->render('DemoTaskBundle:PurchaseOrder:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new PurchaseOrder entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new PurchaseOrder();
        $form = $this->createForm(new PurchaseOrderType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('demo_taskpurchaseorder_show', array('id' => $entity->getId())));
        }

        return $this->render('DemoTaskBundle:PurchaseOrder:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new PurchaseOrder entity.
     *
     */
    public function newAction()
    {
        $entity = new PurchaseOrder();
        $form   = $this->createForm(new PurchaseOrderType(), $entity);

        return $this->render('DemoTaskBundle:PurchaseOrder:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PurchaseOrder entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemoTaskBundle:PurchaseOrder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseOrder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DemoTaskBundle:PurchaseOrder:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing PurchaseOrder entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemoTaskBundle:PurchaseOrder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseOrder entity.');
        }

        $editForm = $this->createForm(new PurchaseOrderType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DemoTaskBundle:PurchaseOrder:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing PurchaseOrder entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemoTaskBundle:PurchaseOrder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseOrder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PurchaseOrderType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('demo_taskpurchaseorder_edit', array('id' => $id)));
        }

        return $this->render('DemoTaskBundle:PurchaseOrder:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PurchaseOrder entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DemoTaskBundle:PurchaseOrder')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PurchaseOrder entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('demo_taskpurchaseorder'));
    }

    /**
     * Creates a form to delete a PurchaseOrder entity by id.
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
