<?php

namespace RestaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="RestaurantBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Podaj nazwę, minimum 3 znaki",
     *      maxMessage = "Maksymalnie 100 znaków"
     * )
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     * @Assert\GreaterThanOrEqual(
     *     value = 0,
     *     message="Cena musi być dodatnia!"
     * )
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="kCal", type="integer")
     * @Assert\GreaterThanOrEqual(
     *     value = 0,
     *     message="Wartość musi być dodatnia!"
     * )
     */
    private $kCal;


    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=10)
     * @Assert\Length(
     *      max = 10,
     *      maxMessage = "Maksymalnie 10 znaków"
     * )
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=100)
     * @Assert\Length(
     *      max = 100,
     *      maxMessage = "Maksymalnie 100 znaków"
     * )
     */
    private $photo;

    /**
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="product")
     */
    private $orders;

    public function __construct() {
        $this->orders = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
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
     * Set kCal
     *
     * @param integer $kCal
     * @return Product
     */
    public function setKCal($kCal)
    {
        $this->kCal = $kCal;

        return $this;
    }

    /**
     * Get kCal
     *
     * @return integer 
     */
    public function getKCal()
    {
        return $this->kCal;
    }

    /**
     * Set category
     *
     * @param integer $category
     * @return Product
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return integer 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Product
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Add orders
     *
     * @param \RestaurantBundle\Entity\Orders $orders
     * @return Product
     */
    public function addOrder(\RestaurantBundle\Entity\Orders $orders)
    {
        $this->orders[] = $orders;

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \RestaurantBundle\Entity\Orders $orders
     */
    public function removeOrder(\RestaurantBundle\Entity\Orders $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }

    public function __toString()
    {
       return '' . $this->id;
    }
}
