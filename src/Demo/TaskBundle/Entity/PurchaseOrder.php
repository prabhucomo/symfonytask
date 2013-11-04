<?php

namespace Demo\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;

//use Demo\TaskBundle\Mailer;

/**
 * PurchaseOrder
 */
class PurchaseOrder
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $order_date;

    /**
     * @var \Demo\TaskBundle\Entity\Customer
     */
    private $customer;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $product;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set status
     *
     * @param string $status
     * @return PurchaseOrder
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set order_date
     *
     * @param \DateTime $orderDate
     * @return PurchaseOrder
     */
    public function setOrderDate($orderDate)
    {
        $this->order_date = $orderDate;

        return $this;
    }

    /**
     * Get order_date
     *
     * @return \DateTime 
     */
    public function getOrderDate()
    {
        return $this->order_date;
    }

    /**
     * Set customer
     *
     * @param \Demo\TaskBundle\Entity\Customer $customer
     * @return PurchaseOrder
     */
    public function setCustomer(\Demo\TaskBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Demo\TaskBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Add product
     *
     * @param \Demo\TaskBundle\Entity\Product $product
     * @return PurchaseOrder
     */
    public function addProduct(\Demo\TaskBundle\Entity\Product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \Demo\TaskBundle\Entity\Product $product
     */
    public function removeProduct(\Demo\TaskBundle\Entity\Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduct()
    {
        return $this->product;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection     
     */
    private $orderitem;


    /**
     * Add orderitem
     *
     * @param \Demo\TaskBundle\Entity\OrderItem $orderitem
     * @return PurchaseOrder
     */
    public function addOrderitem(\Demo\TaskBundle\Entity\OrderItem $orderitem)
    {
        $this->orderitem[] = $orderitem;
        $orderitem->setPurchaseOrder($this);
//        return $this;
    }
    
    public function setOrderitem(array $orderitem)
    {
        $this->orderitem = new \Doctrine\Common\Collections\ArrayCollection($orderitem);
        foreach($orderitem as $order)
        {
            $order->setPurchaseOrder($this);
        }
    }
    
    /**
     * Remove orderitem
     *
     * @param \Demo\TaskBundle\Entity\OrderItem $orderitem
     */
    public function removeOrderitem(\Demo\TaskBundle\Entity\OrderItem $orderitem)
    {
        $this->orderitem->removeElement($orderitem);
    }

    /**
     * Get orderitem
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderitem()
    {
        return $this->orderitem;
    }
    public function __toString()
    {
      //return $this->getName();
        return $this->getStatus()?$this->getStatus():'';
    }
    /**
     * @ORM\PrePersist
     */
    public function sendingmail()
    {
        //$this->
    }
}
