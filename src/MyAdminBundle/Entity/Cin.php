<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cin
 *
 * @ORM\Table(name="cin")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\CinRepository")
 */
class Cin
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
     * @ORM\Column(name="number_cin", type="string", length=255, nullable=true)
     */
    private $numberCin;

    /**
     * @var string
     *
     * @ORM\Column(name="number_cin_confirm", type="string", length=255, nullable=true)
     */
    private $numberCinConfirm;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="cin_verified", type="boolean", nullable=true)
     */
    protected $cinVerified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateUpdate", type="datetimetz", nullable=true)
     */
    private $dateUpdate;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="confirm_condition", type="boolean", nullable=true)
     */
    protected $confirmCondition;
    
    /**
     * @ORM\OneToOne(targetEntity="MyAdminBundle\Entity\CinAttachement", cascade={"all"})
     */
    protected $cinAttachement;
    
    /**
     * Constructor
     */
    public function __construct(){
        // Set date update
        $this->dateUpdate = new \DateTime();
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
     * Set numberCin
     *
     * @param string $numberCin
     * @return Cin
     */
    public function setNumberCin($numberCin)
    {
        $this->numberCin = $numberCin;

        return $this;
    }

    /**
     * Get numberCin
     *
     * @return string 
     */
    public function getNumberCin()
    {
        return $this->numberCin;
    }

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     * @return Cin
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

    /**
     * Set numberCinConfirm
     *
     * @param string $numberCinConfirm
     * @return Cin
     */
    public function setNumberCinConfirm($numberCinConfirm)
    {
        $this->numberCinConfirm = $numberCinConfirm;

        return $this;
    }

    /**
     * Get numberCinConfirm
     *
     * @return string 
     */
    public function getNumberCinConfirm()
    {
        return $this->numberCinConfirm;
    }

    /**
     * Set cinVerified
     *
     * @param boolean $cinVerified
     * @return Cin
     */
    public function setCinVerified($cinVerified)
    {
        $this->cinVerified = $cinVerified;

        return $this;
    }

    /**
     * Get cinVerified
     *
     * @return boolean 
     */
    public function getCinVerified()
    {
        return $this->cinVerified;
    }

    /**
     * Set confirmCondition
     *
     * @param boolean $confirmCondition
     * @return Cin
     */
    public function setConfirmCondition($confirmCondition)
    {
        $this->confirmCondition = $confirmCondition;

        return $this;
    }

    /**
     * Get confirmCondition
     *
     * @return boolean 
     */
    public function getConfirmCondition()
    {
        return $this->confirmCondition;
    }

    /**
     * Set cinAttachement
     *
     * @param \MyAdminBundle\Entity\CinAttachement $cinAttachement
     * @return Cin
     */
    public function setCinAttachement(\MyAdminBundle\Entity\CinAttachement $cinAttachement = null)
    {
        $this->cinAttachement = $cinAttachement;

        return $this;
    }

    /**
     * Get cinAttachement
     *
     * @return \MyAdminBundle\Entity\CinAttachement 
     */
    public function getCinAttachement()
    {
        return $this->cinAttachement;
    }
}
