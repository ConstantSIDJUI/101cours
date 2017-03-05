<?php

namespace PagesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="PagesBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="subject", type="string", length=255, nullable=true)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

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
     * @var int
     *
     * @ORM\Column(name="archive", type="integer", nullable=true)
     */
    private $archive;

    /**
     * @var int
     *
     * @ORM\Column(name="isDelete", type="integer", nullable=true)
     */
    private $isDelete;
    
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", cascade={"all"}, inversedBy="messageSend")
     * @ORM\JoinColumn(name="userSend_id", referencedColumnName="id", nullable=true)
     */
    private $userSend;
    
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", cascade={"all"}, inversedBy="messageReceive")
     * @ORM\JoinColumn(name="userReceive_id", referencedColumnName="id", nullable=true)
     */
    private $userReceive;
    
    /**
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\UserCours", cascade={"all"}, inversedBy="message")
     * @ORM\JoinColumn(name="userCours_id", referencedColumnName="id", nullable=true)
     */
    private $userCours;
    
    /**
     * @ORM\ManyToOne(targetEntity="MyAdminBundle\Entity\Demande", cascade={"all"}, inversedBy="message")
     * @ORM\JoinColumn(name="demande_id", referencedColumnName="id", nullable=true)
     */
    private $demande;


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
     * Set subject
     *
     * @param string $subject
     * @return Message
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Message
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
     * @return Message
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
     * Set userSend
     *
     * @param \UserBundle\Entity\User $userSend
     * @return Message
     */
    public function setUserSend(\UserBundle\Entity\User $userSend = null)
    {
        $this->userSend = $userSend;

        return $this;
    }

    /**
     * Get userSend
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUserSend()
    {
        return $this->userSend;
    }

    /**
     * Set userReceive
     *
     * @param \UserBundle\Entity\User $userReceive
     * @return Message
     */
    public function setUserReceive(\UserBundle\Entity\User $userReceive = null)
    {
        $this->userReceive = $userReceive;

        return $this;
    }

    /**
     * Get userReceive
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUserReceive()
    {
        return $this->userReceive;
    }

    /**
     * Set userCours
     *
     * @param \MyAdminBundle\Entity\UserCours $userCours
     * @return Message
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
     * Set archive
     *
     * @param integer $archive
     * @return Message
     */
    public function setArchive($archive)
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * Get archive
     *
     * @return integer 
     */
    public function getArchive()
    {
        return $this->archive;
    }

    /**
     * Set demande
     *
     * @param \MyAdminBundle\Entity\Demande $demande
     * @return Message
     */
    public function setDemande(\MyAdminBundle\Entity\Demande $demande = null)
    {
        $this->demande = $demande;

        return $this;
    }

    /**
     * Get demande
     *
     * @return \MyAdminBundle\Entity\Demande 
     */
    public function getDemande()
    {
        return $this->demande;
    }

    /**
     * Set isDelete
     *
     * @param integer $isDelete
     * @return Message
     */
    public function setIsDelete($isDelete)
    {
        $this->isDelete = $isDelete;

        return $this;
    }

    /**
     * Get isDelete
     *
     * @return integer 
     */
    public function getIsDelete()
    {
        return $this->isDelete;
    }
}
