<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * training
 *
 * @ORM\Table(name="training")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\TrainingRepository")
 */
class Training
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
     * @ORM\Column(name="school", type="string", length=255, nullable=true)
     */
    private $school;

    /**
     * @var string
     *
     * @ORM\Column(name="yearFrom", type="string", length=255, nullable=true)
     */
    private $yearFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="yearTo", type="string", length=255, nullable=true)
     */
    private $yearTo;
    
    /**
     * @ORM\OneToOne(targetEntity="MyAdminBundle\Entity\TrainingAttachement", cascade={"all"})
     */
    protected $trainingAttachement;


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
     * Set school
     *
     * @param string $school
     * @return training
     */
    public function setSchool($school)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return string 
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set yearFrom
     *
     * @param string $yearFrom
     * @return training
     */
    public function setYearFrom($yearFrom)
    {
        $this->yearFrom = $yearFrom;

        return $this;
    }

    /**
     * Get yearFrom
     *
     * @return string 
     */
    public function getYearFrom()
    {
        return $this->yearFrom;
    }

    /**
     * Set yearTo
     *
     * @param string $yearTo
     * @return training
     */
    public function setYearTo($yearTo)
    {
        $this->yearTo = $yearTo;

        return $this;
    }

    /**
     * Get yearTo
     *
     * @return string 
     */
    public function getYearTo()
    {
        return $this->yearTo;
    }

    /**
     * Set trainingAttachement
     *
     * @param \MyAdminBundle\Entity\TrainingAttachement $trainingAttachement
     * @return Training
     */
    public function setTrainingAttachement(\MyAdminBundle\Entity\TrainingAttachement $trainingAttachement = null)
    {
        $this->trainingAttachement = $trainingAttachement;

        return $this;
    }

    /**
     * Get trainingAttachement
     *
     * @return \MyAdminBundle\Entity\TrainingAttachement 
     */
    public function getTrainingAttachement()
    {
        return $this->trainingAttachement;
    }
}
