<?php

namespace Demo\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 */
class Customer
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var integer
     */
    private $phonenumber;

    /**
     * @var string
     */
    private $addressline1;

    /**
     * @var string
     */
    private $addressline2;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var string
     */
    private $country;


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
     * Set firstname
     *
     * @param string $firstname
     * @return Customer
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Customer
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set phonenumber
     *
     * @param integer $phonenumber
     * @return Customer
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return integer 
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Set addressline1
     *
     * @param string $addressline1
     * @return Customer
     */
    public function setAddressline1($addressline1)
    {
        $this->addressline1 = $addressline1;

        return $this;
    }

    /**
     * Get addressline1
     *
     * @return string 
     */
    public function getAddressline1()
    {
        return $this->addressline1;
    }

    /**
     * Set addressline2
     *
     * @param string $addressline2
     * @return Customer
     */
    public function setAddressline2($addressline2)
    {
        $this->addressline2 = $addressline2;

        return $this;
    }

    /**
     * Get addressline2
     *
     * @return string 
     */
    public function getAddressline2()
    {
        return $this->addressline2;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Customer
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return Customer
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Customer
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }
    /**
     * @var string
     */
    private $emailaddress;


    /**
     * Set emailaddress
     *
     * @param string $emailaddress
     * @return Customer
     */
    public function setEmailaddress($emailaddress)
    {
        $this->emailaddress = $emailaddress;

        return $this;
    }

    /**
     * Get emailaddress
     *
     * @return string 
     */
    public function getEmailaddress()
    {
        return $this->emailaddress;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $order;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->order = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get order
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrder()
    {
        return $this->order;
    }
    public function __toString()
    {
      //return $this->getName();
        return $this->getFirstname()?$this->getFirstname():'';
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $purchase_order;


    /**
     * Add purchase_order
     *
     * @param \Demo\TaskBundle\Entity\PurchaseOrder $purchaseOrder
     * @return Customer
     */
    public function addPurchaseOrder(\Demo\TaskBundle\Entity\PurchaseOrder $purchaseOrder)
    {
        $this->purchase_order[] = $purchaseOrder;

        return $this;
    }

    /**
     * Remove purchase_order
     *
     * @param \Demo\TaskBundle\Entity\PurchaseOrder $purchaseOrder
     */
    public function removePurchaseOrder(\Demo\TaskBundle\Entity\PurchaseOrder $purchaseOrder)
    {
        $this->purchase_order->removeElement($purchaseOrder);
    }

    /**
     * Get purchase_order
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPurchaseOrder()
    {
        return $this->purchase_order;
    }
}
