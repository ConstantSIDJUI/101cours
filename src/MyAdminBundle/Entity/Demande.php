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
     * @var integer
     *
     * @ORM\Column(name="pack", type="integer", nullable=true)
     */
    private $pack;
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
     * @var int
     *
     * @ORM\Column(name="accept", type="integer", nullable=true)
     */
    protected $accept;

    /**
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\UserCours", cascade={"all"}, inversedBy="demandes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $userCours;
    
    /**
     * @ORM\OneToMany(targetEntity="PagesBundle\Entity\Message", mappedBy="demande", cascade={"all"})
     */
    private $message;
    
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
     * Set pack
     *
     * @param integer $pack
     * @return Demande
     */
    public function setPack($pack)
    {
        $this->pack = $pack;

        return $this;
    }

    /**
     * Get pack
     *
     * @return integer 
     */
    public function getPack()
    {
        return $this->pack;
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

    /**
     * Set accept
     *
     * @param integer $accept
     * @return Demande
     */
    public function setAccept($accept)
    {
        $this->accept = $accept;

        return $this;
    }

    /**
     * Get accept
     *
     * @return integer 
     */
    public function getAccept()
    {
        return $this->accept;
    }

    /**
     * Add message
     *
     * @param \PagesBundle\Entity\Message $message
     * @return Demande
     */
    public function addMessage(\PagesBundle\Entity\Message $message)
    {
        $this->message[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \PagesBundle\Entity\Message $message
     */
    public function removeMessage(\PagesBundle\Entity\Message $message)
    {
        $this->message->removeElement($message);
    }

    /**
     * Get message
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessage()
    {
        return $this->message;
    }
}
