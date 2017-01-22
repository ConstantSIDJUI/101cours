<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PostalAdress
 *
 * @ORM\Table(name="postal_adress")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\PostalAdressRepository")
 */
class PostalAdress
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
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=255, nullable=true)
     */
    private $complement;
    
    /**
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\City", inversedBy="postaladress", cascade={"persist"}))
     * @ORM\JoinColumn(onDelete="CASCADE", nullable=true)
     */
    private $city;


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
     * @return PostalAdress
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
     * Set complement
     *
     * @param string $complement
     * @return PostalAdress
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get complement
     *
     * @return string 
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set city
     *
     * @param \MyAdminBundle\Entity\City $city
     * @return PostalAdress
     */
    public function setCity(\MyAdminBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \MyAdminBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
    }
}
