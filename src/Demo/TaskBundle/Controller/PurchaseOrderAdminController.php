<?php

namespace Demo\TaskBundle\Controller;
 
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery as ProxyQueryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

//use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//use Symfony\Component\Security\Core\Exception\AccessDeniedException;
//use Symfony\Component\DependencyInjection\ContainerInterface;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sonata\AdminBundle\Exception\ModelManagerException;
//use Symfony\Component\HttpFoundation\Request;
////use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
//
//use Demo\TaskBundle\Entity\OrderItem;
//use Demo\TaskBundle\Form\OrderItemType;

class PurchaseOrderAdminController extends Controller
{
//    public function createAction(Request $request)
//    {//var_dump($request);exit;
//     echo 'in';//exit;   
//        $entity  = new OrderItem();
//        echo 'out';
//        $form = $this->createForm(new OrderItemType(), $entity);
//        echo 'ins';//exit;
//        $form->bind($request);
//        echo 'qal';
//        //$taxable = $form->getTax();
//        //echo $taxable;exit;
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($entity);
//            $em->flush();
//            return $this->redirect($this->generateUrl('admin_demo_task_orderitem_list', array('id' => $entity->getId())));
//        }
//   return $this->redirect($this->generateUrl('admin_demo_task_purchaseorder_create'));
//    }

    public function batchActionExtend(ProxyQueryInterface $selectedModelQuery)
    {
        if ($this->admin->isGranted('EDIT') === false || $this->admin->isGranted('DELETE') === false)
        {
            throw new AccessDeniedException();
        }
 
        $request = $this->get('request');
        $modelManager = $this->admin->getModelManager();
 
        $selectedModels = $selectedModelQuery->execute();
 
        try {
            foreach ($selectedModels as $selectedModel) {
                $selectedModel->extend();
                $modelManager->update($selectedModel);
            }
        } catch (\Exception $e) {
            $this->get('session')->setFlash('sonata_flash_error', $e->getMessage());
 
            return new RedirectResponse($this->admin->generateUrl('list',$this->admin->getFilterParameters()));
        }
 
        //$this->get('session')->setFlash('sonata_flash_success',  sprintf('The selected jobs validity has been extended until %s.', date('m/d/Y', time() + 86400 * 30)));
 
        return new RedirectResponse($this->admin->generateUrl('list',$this->admin->getFilterParameters()));
    }

}
