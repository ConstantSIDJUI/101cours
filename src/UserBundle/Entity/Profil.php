<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profil
 *
 * @ORM\Table(name="profil")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\ProfilRepository")
 */
class Profil
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
     * @ORM\Column(name="subject_matter", type="string", length=255, nullable=true)
     */
    private $subjectMatter;

    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="text", nullable=true)
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="training", type="text", nullable=true)
     */
    private $training;
    
    /**
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\User", mappedBy="profil", cascade={"all"})
     */
    private $user;


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
     * Set subjectMatter
     *
     * @param string $subjectMatter
     * @return Profil
     */
    public function setSubjectMatter($subjectMatter)
    {
        $this->subjectMatter = $subjectMatter;

        return $this;
    }

    /**
     * Get subjectMatter
     *
     * @return string 
     */
    public function getSubjectMatter()
    {
        return $this->subjectMatter;
    }

    /**
     * Set experience
     *
     * @param string $experience
     * @return Profil
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return string 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set training
     *
     * @param string $training
     * @return Profil
     */
    public function setTraining($training)
    {
        $this->training = $training;

        return $this;
    }

    /**
     * Get training
     *
     * @return string 
     */
    public function getTraining()
    {
        return $this->training;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \UserBundle\Entity\User $user
     * @return Profil
     */
    public function addUser(\UserBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \UserBundle\Entity\User $user
     */
    public function removeUser(\UserBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
}
