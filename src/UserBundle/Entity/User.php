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
     * @var boolean
     *
     * @ORM\Column(name="email_verified", type="boolean", nullable=true)
     */
    protected $emailVerified;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="linkedin_verified", type="boolean", nullable=true)
     */
    protected $linkedinVerified;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="facebook_verified", type="boolean", nullable=true)
     */
    protected $facebookVerified;
    
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=true, length=255)
     */
    protected $status;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth_date", type="datetime", nullable=true)
     */
    protected $birthDate;
    
    /**
     * @ORM\OneToMany(targetEntity="MyAdminBundle\Entity\Cours", mappedBy="user", cascade={"all"})
     */
    private $cours;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="confirm_condition", type="boolean", nullable=true)
     */
    protected $confirmCondition;
    
    /**
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\City", cascade={"all"}, inversedBy="user")
     */
    private $city;
    
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Profil", cascade={"all"}, inversedBy="user")
     */
    private $profil;
    
    /**
     * @ORM\OneToMany(targetEntity="PagesBundle\Entity\Message", mappedBy="userSend", cascade={"all"})
     */
    private $messageSend;
    
    /**
     * @ORM\OneToMany(targetEntity="PagesBundle\Entity\Message", mappedBy="userReceive", cascade={"all"})
     */
    private $messageReceive;
    
    /**
     * @ORM\OneToMany(targetEntity="PagesBundle\Entity\Notification", mappedBy="user", cascade={"all"})
     */
    private $notification;
    
    /**
     * @ORM\OneToOne(targetEntity="MyAdminBundle\Entity\Cin", cascade={"all"})
     */
    private $cin;
    
    /**
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\Avatar", cascade={"all"})
     */
    protected $avatar;
    
    /**
     * @ORM\OneToOne(targetEntity="MyAdminBundle\Entity\PostalAdress", cascade={"all"})
     */
    private $postalAdress;
    
    /**
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\Rib", cascade={"all"})
     */
    private $rib;
    
    /**
     * @ORM\OneToOne(targetEntity="MyAdminBundle\Entity\Experience", cascade={"all"})
     */
    protected $experience;
    
    /**
     * @ORM\OneToOne(targetEntity="MyAdminBundle\Entity\Training", cascade={"all"})
     */
    protected $training;
    
    /**
     * @ORM\OneToOne(targetEntity="MyAdminBundle\Entity\Professor", cascade={"all"})
     */
    protected $professor;
    
    /**
     * @ORM\OneToMany(targetEntity="MyAdminBundle\Entity\UserCours", mappedBy="user", cascade={"all"})
     */
    private $userCours;
    

    public function __construct()
    {
        parent::__construct();
        
        // Set default value
        $this->dateCreated  = new \DateTime(null, new \DateTimeZone('Europe/Paris'));
    }

    /**
     * 
     * @param type $email
     */
    public function setEmail($email){
        parent::setEmail($email);
        $this->setUsername($email);
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

    /**
     * Add messageSend
     *
     * @param \PagesBundle\Entity\Message $messageSend
     * @return User
     */
    public function addMessageSend(\PagesBundle\Entity\Message $messageSend)
    {
        $this->messageSend[] = $messageSend;

        return $this;
    }

    /**
     * Remove messageSend
     *
     * @param \PagesBundle\Entity\Message $messageSend
     */
    public function removeMessageSend(\PagesBundle\Entity\Message $messageSend)
    {
        $this->messageSend->removeElement($messageSend);
    }

    /**
     * Get messageSend
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessageSend()
    {
        return $this->messageSend;
    }

    /**
     * Add messageReceive
     *
     * @param \PagesBundle\Entity\Message $messageReceive
     * @return User
     */
    public function addMessageReceive(\PagesBundle\Entity\Message $messageReceive)
    {
        $this->messageReceive[] = $messageReceive;

        return $this;
    }

    /**
     * Remove messageReceive
     *
     * @param \PagesBundle\Entity\Message $messageReceive
     */
    public function removeMessageReceive(\PagesBundle\Entity\Message $messageReceive)
    {
        $this->messageReceive->removeElement($messageReceive);
    }

    /**
     * Get messageReceive
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessageReceive()
    {
        return $this->messageReceive;
    }

    /**
     * Add notification
     *
     * @param \PagesBundle\Entity\Notification $notification
     * @return User
     */
    public function addNotification(\PagesBundle\Entity\Notification $notification)
    {
        $this->notification[] = $notification;

        return $this;
    }

    /**
     * Remove notification
     *
     * @param \PagesBundle\Entity\Notification $notification
     */
    public function removeNotification(\PagesBundle\Entity\Notification $notification)
    {
        $this->notification->removeElement($notification);
    }

    /**
     * Get notification
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * Set avatar
     *
     * @param \UserBundle\Entity\Avatar $avatar
     * @return User
     */
    public function setAvatar(\UserBundle\Entity\Avatar $avatar = null)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return \UserBundle\Entity\Avatar 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set confirmCondition
     *
     * @param integer $confirmCondition
     * @return User
     */
    public function setConfirmCondition($confirmCondition)
    {
        $this->confirmCondition = $confirmCondition;

        return $this;
    }

    /**
     * Get confirmCondition
     *
     * @return integer 
     */
    public function getConfirmCondition()
    {
        return $this->confirmCondition;
    }

    /**
     * Set postalAdress
     *
     * @param \MyAdminBundle\Entity\PostalAdress $postalAdress
     * @return User
     */
    public function setPostalAdress(\MyAdminBundle\Entity\PostalAdress $postalAdress = null)
    {
        $this->postalAdress = $postalAdress;

        return $this;
    }

    /**
     * Get postalAdress
     *
     * @return \MyAdminBundle\Entity\PostalAdress 
     */
    public function getPostalAdress()
    {
        return $this->postalAdress;
    }

    /**
     * Set rib
     *
     * @param \UserBundle\Entity\Rib $rib
     * @return User
     */
    public function setRib(\UserBundle\Entity\Rib $rib = null)
    {
        $this->rib = $rib;

        return $this;
    }

    /**
     * Get rib
     *
     * @return \UserBundle\Entity\Rib 
     */
    public function getRib()
    {
        return $this->rib;
    }

    /**
     * Set cin
     *
     * @param \MyAdminBundle\Entity\Cin $cin
     * @return User
     */
    public function setCin(\MyAdminBundle\Entity\Cin $cin = null)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return \MyAdminBundle\Entity\Cin 
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set experience
     *
     * @param \MyAdminBundle\Entity\Experience $experience
     * @return User
     */
    public function setExperience(\MyAdminBundle\Entity\Experience $experience = null)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return \MyAdminBundle\Entity\Experience 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set training
     *
     * @param \MyAdminBundle\Entity\Training $training
     * @return User
     */
    public function setTraining(\MyAdminBundle\Entity\Training $training = null)
    {
        $this->training = $training;

        return $this;
    }

    /**
     * Get training
     *
     * @return \MyAdminBundle\Entity\Training 
     */
    public function getTraining()
    {
        return $this->training;
    }

    /**
     * Set professor
     *
     * @param \MyAdminBundle\Entity\Professor $professor
     * @return User
     */
    public function setProfessor(\MyAdminBundle\Entity\Professor $professor = null)
    {
        $this->professor = $professor;

        return $this;
    }

    /**
     * Get professor
     *
     * @return \MyAdminBundle\Entity\Professor 
     */
    public function getProfessor()
    {
        return $this->professor;
    }

    /**
     * Add userCours
     *
     * @param \MyAdminBundle\Entity\UserCours $userCours
     * @return User
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
