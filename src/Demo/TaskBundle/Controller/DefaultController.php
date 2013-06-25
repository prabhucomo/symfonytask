<?php

namespace Demo\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DemoTaskBundle:Default:index.html.twig', array('name' => $name));
    }
    public function productAjaxAction($id)
    {
        $query = $this->getDoctrine()->getEntityManager()->getRepository('DemoTaskBundle:Product')->createQueryBuilder('p')
      ->where('p.id = :id')
      ->setParameter('id', $id)            
      ->getQuery();
 
     $product = $query->getArrayResult();
     //print_r($product);exit;
     return new Response(json_encode($product));
     
    }
//    public function totalCalcAction($id)
//    {
//        $query = $this->getDoctrine()->getEntityManager()->getRepository('DemoTaskBundle:Product')->createQueryBuilder('p')
//      ->where('p.id = :id')
//      ->setParameter('id', $id)            
//      ->getQuery();
// 
//     $product = $query->getArrayResult();
//     
//     return new Response(json_encode($product));
//     
//    }
    public function sendingMailAction()
    {
        $message = \Swift_Message::newInstance()
        ->setSubject('Hello Email')
        ->setFrom('send@example.com')
        ->setTo('prabhukhannacm@example.com')
        ->setBody(
            $this->renderView(
                'DemoTaskBundle:OrderItem:email.html.twig',
                array('name' => "prabhukhanna")
            )
        )
    ;
    $this->get('mailer')->send($message);
echo "exit";exit;
    return "done";
    }
}
