<?php
// src/UserBundle/Entity/User.php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity
* @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
*/
class User extends BaseUser
{
   /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
   protected $id;
    
    /**
     * @var date
     * 
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    protected $dateCreated;
    
    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", nullable=true, length=20)
     */
    protected $phoneNumber;
    
    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", nullable=true, length=30)
     */
    protected $firstname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", nullable=true, length=50)
     * @Assert\NotBlank()
     */
    protected $lastname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", nullable=true, length=20)
     */
    protected $gender;
    
    /**
     * @var string
     *
     * @ORM\Column(name="about", type="string", nullable=true, length=255)
     */
    protected $about;
    
    /**
     * @var string
     *
     * @ORM\Column(name="rib", type="string", nullable=true, length=255)
     */
    protected $rib;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", nullable=true, length=255)
     */
    protected $cin;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="linkedin", type="integer", nullable=true)
     */
    protected $linkedin;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="facebook", type="integer", nullable=true)
     */
    protected $facebook;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="cin_verifed", type="integer", nullable=true)
     */
    protected $cinVerifed;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="email_verified", type="integer", nullable=true)
     */
    protected $emailVerified;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="linkedin_verified", type="integer", nullable=true)
     */
    protected $linkedinVerified;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="facebook_verified", type="integer", nullable=true)
     */
    protected $facebookVerified;
    
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=true, length=255)
     */
    protected $status;
    
    /**
     * @var string
     *
     * @ORM\Column(name="birth_date", type="datetime", nullable=true)
     */
    protected $birthDate;
    
    /**
     * @ORM\OneToMany(targetEntity="MonBail\PagesBundle\Entity\Message", mappedBy="user", cascade={"persist"})
     *
    private $messages;*/
    
    /**
     * @ORM\OneToMany(targetEntity="MonBail\PagesBundle\Entity\Message", mappedBy="user", cascade={"persist"})
     *
    private $avatar;*/
    
    /**
     * @ORM\OneToMany(targetEntity="MyAdminBundle\Entity\Cours", mappedBy="user", cascade={"all"})
     */
    private $cours;
    
    /**
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\City", cascade={"all"}, inversedBy="user")
     */
    private $city;
    
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Profil", cascade={"all"}, inversedBy="user")
     */
    private $profil;

   public function __construct()
   {
       parent::__construct();
       // your own logic
   }

    /**
     * Add cours
     *
     * @param \MyAdminBundle\Entity\Cours $cours
     * @return User
     */
    public function addCour(\MyAdminBundle\Entity\Cours $cours)
    {
        $this->cours[] = $cours;

        return $this;
    }

    /**
     * Remove cours
     *
     * @param \MyAdminBundle\Entity\Cours $cours
     */
    public function removeCour(\MyAdminBundle\Entity\Cours $cours)
    {
        $this->cours->removeElement($cours);
    }

    /**
     * Get cours
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return User
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return User
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime 
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set about
     *
     * @param string $about
     * @return User
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about
     *
     * @return string 
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Set rib
     *
     * @param string $rib
     * @return User
     */
    public function setRib($rib)
    {
        $this->rib = $rib;

        return $this;
    }

    /**
     * Get rib
     *
     * @return string 
     */
    public function getRib()
    {
        return $this->rib;
    }

    /**
     * Set cin
     *
     * @param string $cin
     * @return User
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string 
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set linkedin
     *
     * @param integer $linkedin
     * @return User
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get linkedin
     *
     * @return integer 
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set facebook
     *
     * @param integer $facebook
     * @return User
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return integer 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set cinVerifed
     *
     * @param integer $cinVerifed
     * @return User
     */
    public function setCinVerifed($cinVerifed)
    {
        $this->cinVerifed = $cinVerifed;

        return $this;
    }

    /**
     * Get cinVerifed
     *
     * @return integer 
     */
    public function getCinVerifed()
    {
        return $this->cinVerifed;
    }

    /**
     * Set emailVerified
     *
     * @param integer $emailVerified
     * @return User
     */
    public function setEmailVerified($emailVerified)
    {
        $this->emailVerified = $emailVerified;

        return $this;
    }

    /**
     * Get emailVerified
     *
     * @return integer 
     */
    public function getEmailVerified()
    {
        return $this->emailVerified;
    }

    /**
     * Set linkedinVerified
     *
     * @param integer $linkedinVerified
     * @return User
     */
    public function setLinkedinVerified($linkedinVerified)
    {
        $this->linkedinVerified = $linkedinVerified;

        return $this;
    }

    /**
     * Get linkedinVerified
     *
     * @return integer 
     */
    public function getLinkedinVerified()
    {
        return $this->linkedinVerified;
    }

    /**
     * Set facebookVerified
     *
     * @param integer $facebookVerified
     * @return User
     */
    public function setFacebookVerified($facebookVerified)
    {
        $this->facebookVerified = $facebookVerified;

        return $this;
    }

    /**
     * Get facebookVerified
     *
     * @return integer 
     */
    public function getFacebookVerified()
    {
        return $this->facebookVerified;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return User
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
     * Set gender
     *
     * @param string $gender
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set city
     *
     * @param \MyAdminBundle\Entity\City $city
     * @return User
     */
    public function setCity(\MyAdminBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \MyAdminBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set profil
     *
     * @param \UserBundle\Entity\Profil $profil
     * @return User
     */
    public function setProfil(\UserBundle\Entity\Profil $profil = null)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return \UserBundle\Entity\Profil 
     */
    public function getProfil()
    {
        return $this->profil;
    }
}
