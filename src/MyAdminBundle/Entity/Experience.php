<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 *
 * @ORM\Table(name="experience")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\ExperienceRepository")
 */
class Experience
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    
    /**
     * @ORM\OneToOne(targetEntity="MyAdminBundle\Entity\ExperienceAttachement", cascade={"all"})
     */
    protected $experienceAttachement;


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
     * Set name
     *
     * @param string $name
     * @return Experience
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Experience
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set experienceAttachement
     *
     * @param \MyAdminBundle\Entity\ExperienceAttachement $experienceAttachement
     * @return Experience
     */
    public function setExperienceAttachement(\MyAdminBundle\Entity\ExperienceAttachement $experienceAttachement = null)
    {
        $this->experienceAttachement = $experienceAttachement;

        return $this;
    }

    /**
     * Get experienceAttachement
     *
     * @return \MyAdminBundle\Entity\ExperienceAttachement 
     */
    public function getExperienceAttachement()
    {
        return $this->experienceAttachement;
    }
}
