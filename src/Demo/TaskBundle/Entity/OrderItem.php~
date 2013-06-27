<?php

namespace Demo\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * OrderItem
 */
class OrderItem
{
    public function getSubscribedEvents()
    {
        return array(
            'postPersist',
            'postUpdate',
        );
    }
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $amount;

    /**
     * @var integer
     */
    private $tax;

    /**
     * @var integer
     */
    private $quantity;

    /**
     * @var integer
     */
    private $total;

    /**
     * @var \Demo\TaskBundle\Entity\Product
     */
    private $product;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     * @return OrderItem
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set tax
     *
     * @param integer $tax
     * @return OrderItem
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return integer 
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return OrderItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return OrderItem
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set product
     *
     * @param \Demo\TaskBundle\Entity\Product $product
     * @return OrderItem
     */
    public function setProduct(\Demo\TaskBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Demo\TaskBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
    /**
     * @ORM\PostPersist
     */
    public function uploads()
    {
        $this->tax = 100;
        //echo 'prabhu';exit;
        //$amountEntered = $this->getAmount();
        //$calculate = $amountEntered / 100;
        //$taxable = $this->setAmount('100');
        //echo $taxable;exit;
    }
    /**
     * @ORM\PrePersist
     */
    public function uploading()
    {
        $amountEntered = $this->getTotal();
        $calculate = $amountEntered * 0.05;
        $this->tax = $calculate;
    }
//    public function __toString()
//    {
//        //echo 'in';exit;
//      //return $this->getName();
//        //return '';
//        return $this->getProduct()?$this->getProduct():'';
//    }
    /**
     * @var \Demo\TaskBundle\Entity\PurchaseOrder
     */
    private $purchase_order;


    /**
     * Set purchase_order
     *
     * @param \Demo\TaskBundle\Entity\PurchaseOrder $purchaseOrder
     * @return OrderItem
     */
    public function setPurchaseOrder(\Demo\TaskBundle\Entity\PurchaseOrder $purchaseOrder = null)
    {
        $this->purchase_order = $purchaseOrder;

        return $this;
    }

    /**
     * Get purchase_order
     *
     * @return \Demo\TaskBundle\Entity\PurchaseOrder 
     */
    public function getPurchaseOrder()
    {
        return $this->purchase_order;
    }
}
