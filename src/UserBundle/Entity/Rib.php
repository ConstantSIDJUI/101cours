<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rib
 *
 * @ORM\Table(name="rib")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\RibRepository")
 */
class Rib
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
     * @ORM\Column(name="numberRib", type="string", length=255, nullable=true)
     */
    private $numberRib;

    /**
     * @var string
     *
     * @ORM\Column(name="numberRibConfirm", type="string", length=255, nullable=true)
     */
    private $numberRibConfirm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateUpdate", type="datetimetz", nullable=true)
     */
    private $dateUpdate;
    
    /**
     * Constructor
     */
    public function __construct(){
        // Set date update
        $this->dateUpdate  = new \DateTime;
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
     * Set numberRib
     *
     * @param string $numberRib
     * @return Rib
     */
    public function setNumberRib($numberRib)
    {
        $this->numberRib = $numberRib;

        return $this;
    }

    /**
     * Get numberRib
     *
     * @return string 
     */
    public function getNumberRib()
    {
        return $this->numberRib;
    }

    /**
     * Set numberRibConfirm
     *
     * @param string $numberRibConfirm
     * @return Rib
     */
    public function setNumberRibConfirm($numberRibConfirm)
    {
        $this->numberRibConfirm = $numberRibConfirm;

        return $this;
    }

    /**
     * Get numberRibConfirm
     *
     * @return string 
     */
    public function getNumberRibConfirm()
    {
        return $this->numberRibConfirm;
    }

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     * @return Rib
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * Get dateUpdate
     *
     * @return \DateTime 
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }
}
