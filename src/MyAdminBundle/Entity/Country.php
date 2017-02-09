<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\CountryRepository")
 */
class Country
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
     * @var integer
     * @ORM\Column(name="code", type="integer", nullable=true)
     */
    private $code;
    
    /**
     * @var string
     * @ORM\Column(name="alpha2", type="string", length=2, nullable=true)
     */
    private $alpha2;
    
    /**
     * @var string
     * @ORM\Column(name="alpha3", type="string", length=3, nullable=true)
     */
    private $alpha3;
    
    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="name_fr", type="string", length=45)
     */
    private $nameFr;
    
    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="name_en", type="string", length=45)
     */
    private $nameEn;
    
    /**
     * @ORM\OneToMany(targetEntity="MyAdminBundle\Entity\City", mappedBy="country", cascade={"all"})
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
     * @param integer $code
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set alpha2
     *
     * @param string $alpha2
     * @return Country
     */
    public function setAlpha2($alpha2)
    {
        $this->alpha2 = $alpha2;

        return $this;
    }

    /**
     * Get alpha2
     *
     * @return string 
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * Set alpha3
     *
     * @param string $alpha3
     * @return Country
     */
    public function setAlpha3($alpha3)
    {
        $this->alpha3 = $alpha3;

        return $this;
    }

    /**
     * Get alpha3
     *
     * @return string 
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * Set nameFr
     *
     * @param string $nameFr
     * @return Country
     */
    public function setNameFr($nameFr)
    {
        $this->nameFr = $nameFr;

        return $this;
    }

    /**
     * Get nameFr
     *
     * @return string 
     */
    public function getNameFr()
    {
        return $this->nameFr;
    }

    /**
     * Set nameEn
     *
     * @param string $nameEn
     * @return Country
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * Get nameEn
     *
     * @return string 
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * Add cities
     *
     * @param \MyAdminBundle\Entity\City $cities
     * @return Country
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
