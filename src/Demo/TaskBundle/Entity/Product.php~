<?php

namespace Demo\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 */
class Product
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $itenname;

    /**
     * @var integer
     */
    private $costprice;

    /**
     * @var integer
     */
    private $unitprice;

    /**
     * @var integer
     */
    private $promoprice;

    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $quantity;

    /**
     * @var \Demo\TaskBundle\Entity\Category
     */
    private $category;


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
     * Set itenname
     *
     * @param string $itenname
     * @return Product
     */
    public function setItenname($itenname)
    {
        $this->itenname = $itenname;

        return $this;
    }

    /**
     * Get itenname
     *
     * @return string 
     */
    public function getItenname()
    {
        return $this->itenname;
    }

    /**
     * Set costprice
     *
     * @param integer $costprice
     * @return Product
     */
    public function setCostprice($costprice)
    {
        $this->costprice = $costprice;

        return $this;
    }

    /**
     * Get costprice
     *
     * @return integer 
     */
    public function getCostprice()
    {
        return $this->costprice;
    }

    /**
     * Set unitprice
     *
     * @param integer $unitprice
     * @return Product
     */
    public function setUnitprice($unitprice)
    {
        $this->unitprice = $unitprice;

        return $this;
    }

    /**
     * Get unitprice
     *
     * @return integer 
     */
    public function getUnitprice()
    {
        return $this->unitprice;
    }

    /**
     * Set promoprice
     *
     * @param integer $promoprice
     * @return Product
     */
    public function setPromoprice($promoprice)
    {
        $this->promoprice = $promoprice;

        return $this;
    }

    /**
     * Get promoprice
     *
     * @return integer 
     */
    public function getPromoprice()
    {
        return $this->promoprice;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Product
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set quantity
     *
     * @param string $quantity
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return string 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set category
     *
     * @param \Demo\TaskBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\Demo\TaskBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Demo\TaskBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $order;

    public function __toString()
    {
      //return $this->getName();
        return $this->getItenname()?$this->getItenname():'';
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $orderitem;


    /**
     * Add orderitem
     *
     * @param \Demo\TaskBundle\Entity\OrderItem $orderitem
     * @return Product
     */
    public function addOrderitem(\Demo\TaskBundle\Entity\OrderItem $orderitem)
    {
        $this->orderitem[] = $orderitem;

        return $this;
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderitem = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
