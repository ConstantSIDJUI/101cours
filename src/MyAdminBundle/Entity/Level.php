<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Level
 *
 * @ORM\Table(name="level")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\LevelRepository")
 */
class Level
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
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetimetz", nullable=true)
     */
    private $createdDate;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;
    
    /**
     * @ORM\OneToMany(targetEntity="MyAdminBundle\Entity\UserCours", mappedBy="level", cascade={"all"})
     */
    private $userCours;


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
     * Set libelle
     *
     * @param string $libelle
     * @return Level
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Level
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Level
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cours = new \Doctrine\Common\Collections\ArrayCollection();
        // Set date update
        $this->createdDate = new \DateTime();
    }

    /**
     * Add cours
     *
     * @param \MyAdminBundle\Entity\Cours $cours
     * @return Level
     */
    public function addCour(\MyAdminBundle\Entity\Cours $cours)
    {
        $this->cours[] = $cours;

        return $this;
    }

    /**
     * Add userCours
     *
     * @param \MyAdminBundle\Entity\UserCours $userCours
     * @return Level
     */
    public function addUserCour(\MyAdminBundle\Entity\UserCours $userCours)
    {
        $this->userCours[] = $userCours;

        return $this;
    }

    /**
     * Remove userCours
     *
     * @param \MyAdminBundle\Entity\UserCours $userCours
     */
    public function removeUserCour(\MyAdminBundle\Entity\UserCours $userCours)
    {
        $this->userCours->removeElement($userCours);
    }

    /**
     * Get userCours
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserCours()
    {
        return $this->userCours;
    }
}
