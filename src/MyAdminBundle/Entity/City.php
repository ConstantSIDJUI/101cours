<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\CityRepository")
 */
class City
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
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="name_maj", type="string", length=45)
     */
    private $nameMaj;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=10)
     */
    private $postalCode;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;
    
    /**
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\Department", inversedBy="cities", cascade={"persist"}))
     * @ORM\JoinColumn(onDelete="CASCADE", nullable=true)
     */
    private $department;
    
    /**
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\Country", cascade={"all"}, inversedBy="cities")
     */
    private $country;
    
    /**
     * @ORM\OneToMany(targetEntity="MyAdminBundle\Entity\PostalAdress", mappedBy="city")
     */
    private $postaladress;

    /**
     * Constructor
     */
    public function __construct(){
        $this->postaladress = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set slug
     *
     * @param string $slug
     * @return City
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set nameMaj
     *
     * @param string $nameMaj
     * @return City
     */
    public function setNameMaj($nameMaj)
    {
        $this->nameMaj = $nameMaj;

        return $this;
    }

    /**
     * Get nameMaj
     *
     * @return string 
     */
    public function getNameMaj()
    {
        return $this->nameMaj;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return City
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
     * Set postalCode
     *
     * @param string $postalCode
     * @return City
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return City
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return City
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set department
     *
     * @param \MyAdminBundle\Entity\Department $department
     * @return City
     */
    public function setDepartment(\MyAdminBundle\Entity\Department $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return \MyAdminBundle\Entity\Department 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set country
     *
     * @param \MyAdminBundle\Entity\Country $country
     * @return City
     */
    public function setCountry(\MyAdminBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \MyAdminBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add postaladress
     *
     * @param \MyAdminBundle\Entity\PostalAdress $postaladress
     * @return City
     */
    public function addPostaladress(\MyAdminBundle\Entity\PostalAdress $postaladress)
    {
        $this->postaladress[] = $postaladress;

        return $this;
    }

    /**
     * Remove postaladress
     *
     * @param \MyAdminBundle\Entity\PostalAdress $postaladress
     */
    public function removePostaladress(\MyAdminBundle\Entity\PostalAdress $postaladress)
    {
        $this->postaladress->removeElement($postaladress);
    }

    /**
     * Get postaladress
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPostaladress()
    {
        return $this->postaladress;
    }
}
