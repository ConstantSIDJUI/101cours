<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Professor
 *
 * @ORM\Table(name="professor")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\ProfessorRepository")
 */
class Professor
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
     * @ORM\Column(name="level", type="string", length=255, nullable=true)
     */
    private $level;

    /**
     * @var string
     *
     * @ORM\Column(name="discipline", type="string", length=255, nullable=true)
     */
    private $discipline;
    
    /**
     * @ORM\OneToOne(targetEntity="MyAdminBundle\Entity\ProfessorAttachement", cascade={"all"})
     */
    protected $professorAttachement;


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
     * Set level
     *
     * @param string $level
     * @return Professor
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return string 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set discipline
     *
     * @param string $discipline
     * @return Professor
     */
    public function setDiscipline($discipline)
    {
        $this->discipline = $discipline;

        return $this;
    }

    /**
     * Get discipline
     *
     * @return string 
     */
    public function getDiscipline()
    {
        return $this->discipline;
    }

    /**
     * Set professorAttachement
     *
     * @param \MyAdminBundle\Entity\ProfessorAttachement $professorAttachement
     * @return Professor
     */
    public function setProfessorAttachement(\MyAdminBundle\Entity\ProfessorAttachement $professorAttachement = null)
    {
        $this->professorAttachement = $professorAttachement;

        return $this;
    }

    /**
     * Get professorAttachement
     *
     * @return \MyAdminBundle\Entity\ProfessorAttachement 
     */
    public function getProfessorAttachement()
    {
        return $this->professorAttachement;
    }
}
