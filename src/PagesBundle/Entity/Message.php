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
     * @ORM\Column(name="is_read", type="integer", nullable=true)
     */
    private $isRead;
    
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
     * Set isRead
     *
     * @param integer $isRead
     * @return Message
     */
    public function setIsRead($isRead)
    {
        $this->isRead = $isRead;

        return $this;
    }

    /**
     * Get isRead
     *
     * @return integer 
     */
    public function getIsRead()
    {
        return $this->isRead;
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
}
