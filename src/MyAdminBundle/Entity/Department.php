<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Department
 *
 * @ORM\Table(name="department")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\DepartmentRepository")
 */
class Department
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="name_uppercase", type="string", length=255)
     */
    private $nameUppercase;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="name_soundex", type="string", length=255)
     */
    private $nameSoundex;
    
    /**
     * @ORM\OneToMany(targetEntity="MyAdminBundle\Entity\City", mappedBy="department")
     */
    private $cities;

    /**
     * Constructor
     */
    public function __construct(){
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set code
     *
     * @param string $code
     * @return Department
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Department
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
     * Set nameUppercase
     *
     * @param string $nameUppercase
     * @return Department
     */
    public function setNameUppercase($nameUppercase)
    {
        $this->nameUppercase = $nameUppercase;

        return $this;
    }

    /**
     * Get nameUppercase
     *
     * @return string 
     */
    public function getNameUppercase()
    {
        return $this->nameUppercase;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Department
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
     * Set nameSoundex
     *
     * @param string $nameSoundex
     * @return Department
     */
    public function setNameSoundex($nameSoundex)
    {
        $this->nameSoundex = $nameSoundex;

        return $this;
    }

    /**
     * Get nameSoundex
     *
     * @return string 
     */
    public function getNameSoundex()
    {
        return $this->nameSoundex;
    }

    /**
     * Add cities
     *
     * @param \MyAdminBundle\Entity\City $cities
     * @return Department
     */
    public function addCity(\MyAdminBundle\Entity\City $cities)
    {
        $this->cities[] = $cities;

        return $this;
    }

    /**
     * Remove cities
     *
     * @param \MyAdminBundle\Entity\City $cities
     */
    public function removeCity(\MyAdminBundle\Entity\City $cities)
    {
        $this->cities->removeElement($cities);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCities()
    {
        return $this->cities;
    }
}
