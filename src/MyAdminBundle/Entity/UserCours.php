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
     * @var integer
     *
     * @ORM\Column(name="home", type="integer", nullable=true)
     */
    protected $home;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="coffe", type="integer", nullable=true)
     */
    protected $coffe;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="tea", type="integer", nullable=true)
     */
    protected $tea;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\Cours")
     * @ORM\JoinColumn(nullable=true)
     */
    private $cours;


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
     * Set home
     *
     * @param integer $home
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
     * @return integer 
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * Set coffe
     *
     * @param integer $coffe
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
     * @return integer 
     */
    public function getCoffe()
    {
        return $this->coffe;
    }

    /**
     * Set tea
     *
     * @param integer $tea
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
     * @return integer 
     */
    public function getTea()
    {
        return $this->tea;
    }
}
