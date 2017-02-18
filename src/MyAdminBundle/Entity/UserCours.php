<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCours
 *
 * @ORM\Table(name="user_cours")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\UserCoursRepository")
 */
class UserCours
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="home", type="boolean", nullable=true)
     */
    protected $home;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="coffe", type="boolean", nullable=true)
     */
    protected $coffe;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="tea", type="boolean", nullable=true)
     */
    protected $tea;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="confirm_condition", type="boolean", nullable=true)
     */
    protected $confirmCondition;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", cascade={"all"}, inversedBy="userCours")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\Cours")
     * @ORM\JoinColumn(nullable=true)
     */
    private $cours;
    
    /**
     * @ORM\OneToOne(targetEntity="MyAdminBundle\Entity\Annonce", cascade={"all"})
     */
    protected $annonce;
    
    /**
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\City", cascade={"all"}, inversedBy="userCours")
     */
    private $cities;
    
    /**
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\Level", cascade={"all"}, inversedBy="userCours")
     */
    private $level;
    
    /**
     * Constructor
     */
    public function __construct(){
        // Set date update
        $this->createdDate = new \DateTime();
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
     * Set cours
     *
     * @param \MyAdminBundle\Entity\Cours $cours
     * @return UserCours
     */
    public function setCours(\MyAdminBundle\Entity\Cours $cours = null)
    {
        $this->cours = $cours;

        return $this;
    }

    /**
     * Get cours
     *
     * @return \MyAdminBundle\Entity\Cours 
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return UserCours
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
     * Set confirmCondition
     *
     * @param boolean $confirmCondition
     * @return UserCours
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
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return UserCours
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set annonce
     *
     * @param \MyAdminBundle\Entity\Annonce $annonce
     * @return UserCours
     */
    public function setAnnonce(\MyAdminBundle\Entity\Annonce $annonce = null)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return \MyAdminBundle\Entity\Annonce 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Set cities
     *
     * @param \MyAdminBundle\Entity\City $cities
     * @return UserCours
     */
    public function setCities(\MyAdminBundle\Entity\City $cities = null)
    {
        $this->cities = $cities;

        return $this;
    }

    /**
     * Get cities
     *
     * @return \MyAdminBundle\Entity\City 
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * Set level
     *
     * @param \MyAdminBundle\Entity\Level $level
     * @return UserCours
     */
    public function setLevel(\MyAdminBundle\Entity\Level $level = null)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return \MyAdminBundle\Entity\Level 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set home
     *
     * @param boolean $home
     * @return UserCours
     */
    public function setHome($home)
    {
        $this->home = $home;

        return $this;
    }

    /**
     * Get home
     *
     * @return boolean 
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * Set coffe
     *
     * @param boolean $coffe
     * @return UserCours
     */
    public function setCoffe($coffe)
    {
        $this->coffe = $coffe;

        return $this;
    }

    /**
     * Get coffe
     *
     * @return boolean 
     */
    public function getCoffe()
    {
        return $this->coffe;
    }

    /**
     * Set tea
     *
     * @param boolean $tea
     * @return UserCours
     */
    public function setTea($tea)
    {
        $this->tea = $tea;

        return $this;
    }

    /**
     * Get tea
     *
     * @return boolean 
     */
    public function getTea()
    {
        return $this->tea;
    }
}
