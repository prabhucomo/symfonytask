<?php

namespace Demo\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    public function indexAction($name) {
        return $this->render('DemoTaskBundle:Default:index.html.twig', array('name' => $name));
    }

    public function productAjaxAction($id) {
        $query = $this->getDoctrine()->getEntityManager()->getRepository('DemoTaskBundle:Product')->createQueryBuilder('p')
                ->where('p.id = :id')
                ->setParameter('id', $id)
                ->getQuery();

        $product = $query->getArrayResult();
        return new Response(json_encode($product));
    }

    public function sendingMailAction() {
        $orderedCustomer = $_POST["customerName"];
        $orderedProductId = $_POST["itemName"];
        $orderStatus = $_POST["orderStatus"];
        $ordereDate = $_POST["orderedDate"];
        $orderAmount = $_POST["orderedAmount"];
        $orderQuantity = $_POST["orderedQuantity"];
        $orderTotal = $_POST["grandTotal"];


        $productQuery = $this->getDoctrine()->getEntityManager()->getRepository('DemoTaskBundle:Product')->createQueryBuilder('p')
                ->where('p.id = :id')
                ->setParameter('id', $orderedProductId)
                ->getQuery();

        $productItem = $productQuery->getArrayResult();
        $itemName = $productItem[0]['itenname'];


        $query = $this->getDoctrine()->getEntityManager()->getRepository('DemoTaskBundle:Customer')->createQueryBuilder('c')
                ->where('c.firstname = :emailcustomer')
                ->setParameter('emailcustomer', $orderedCustomer)
                ->getQuery();
        $product = $query->getArrayResult();
        $email = $product[0]['emailaddress'];
        $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('bhujosam@gmail.com')
                ->setTo($email)
                ->setContentType("text/html")
                ->setBody(
                $this->renderView(
                        'DemoTaskBundle:OrderItem:email.html.twig', array('customerName' => $orderedCustomer,
                    'itemName' => $itemName,
                    'orderStatus' => $orderStatus,
                    'orderedDate' => $ordereDate,
                    'orderedAmount' => $orderAmount,
                    'orderedQuantity' => $orderQuantity,
                    'grandTotal' => $orderTotal)
                )
                )
        ;
        $this->get('mailer')->send($message);
        return new Response($message);
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
}
