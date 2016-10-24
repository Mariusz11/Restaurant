<?php

namespace RestaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="RestaurantBundle\Repository\CustomerRepository")
 */
class Customer
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
     * @ORM\Column(name="address", type="string", length=100)
     * @Assert\Length(
     *      min = 10,
     *      max = 100,
     *      minMessage = "Wpisz adres, minimum 10 znaków",
     *      maxMessage = "Maksymalnie 100 znaków"
     * )
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=15)
     * @Assert\Regex(
     *     pattern="/^(\+48)?[ -]?[\d]{3}?[ -]?[\d]{3}?[ -]?[\d]{3}$/",
     *     message="Wpisz poprawny numer telefonu!"
     * )
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10)
     * @Assert\Length(
     *      max = 10,
     *      maxMessage = "Maksymalnie 10 znaków"
     * )
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="option_delivery", type="string", length=10)
     * @Assert\Length(
     *      max = 10,
     *      maxMessage = "Maksymalnie 10 znaków"
     * )
     */
    private $optionDelivery;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     * @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "Podaj imię i nazwisko, minimum 5 znaków",
     *      maxMessage = "Maksymalnie 100 znaków"
     * )
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="customer")
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
     * Set address
     *
     * @param string $address
     * @return Customer
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Customer
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
     * Set optionDelivery
     *
     * @param string $optionDelivery
     * @return Customer
     */
    public function setOptionDelivery($optionDelivery)
    {
        $this->optionDelivery = $optionDelivery;

        return $this;
    }

    /**
     * Get optionDelivery
     *
     * @return string 
     */
    public function getOptionDelivery()
    {
        return $this->optionDelivery;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Customer
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
     * Set date
     *
     * @param \DateTime $date
     * @return Customer
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Add orders
     *
     * @param \RestaurantBundle\Entity\Orders $orders
     * @return Customer
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
