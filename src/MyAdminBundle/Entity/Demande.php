<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\DemandeRepository")
 */
class Demande
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
     * @var bool
     *
     * @ORM\Column(name="pack30", type="boolean", nullable=true)
     */
    private $pack30;

    /**
     * @var bool
     *
     * @ORM\Column(name="pack16", type="boolean", nullable=true)
     */
    private $pack16;

    /**
     * @var bool
     *
     * @ORM\Column(name="pack10", type="boolean", nullable=true)
     */
    private $pack10;

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
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\UserCours", cascade={"all"}, inversedBy="demandes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $userCours;
    
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
     * Set pack30
     *
     * @param boolean $pack30
     * @return Demande
     */
    public function setPack30($pack30)
    {
        $this->pack30 = $pack30;

        return $this;
    }

    /**
     * Get pack30
     *
     * @return boolean 
     */
    public function getPack30()
    {
        return $this->pack30;
    }

    /**
     * Set pack16
     *
     * @param boolean $pack16
     * @return Demande
     */
    public function setPack16($pack16)
    {
        $this->pack16 = $pack16;

        return $this;
    }

    /**
     * Get pack16
     *
     * @return boolean 
     */
    public function getPack16()
    {
        return $this->pack16;
    }

    /**
     * Set pack10
     *
     * @param boolean $pack10
     * @return Demande
     */
    public function setPack10($pack10)
    {
        $this->pack10 = $pack10;

        return $this;
    }

    /**
     * Get pack10
     *
     * @return boolean 
     */
    public function getPack10()
    {
        return $this->pack10;
    }

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     * @return Demande
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
     * Set confirmCondition
     *
     * @param boolean $confirmCondition
     * @return Demande
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
     * Set userCours
     *
     * @param \MyAdminBundle\Entity\UserCours $userCours
     * @return Demande
     */
    public function setUserCours(\MyAdminBundle\Entity\UserCours $userCours = null)
    {
        $this->userCours = $userCours;

        return $this;
    }

    /**
     * Get userCours
     *
     * @return \MyAdminBundle\Entity\UserCours 
     */
    public function getUserCours()
    {
        return $this->userCours;
    }
}
