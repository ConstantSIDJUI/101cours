<?php
// src/UserBundle/Entity/User.php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="user")
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
     * @ORM\OneToMany(targetEntity="MyAdminBundle\Entity\Cours", mappedBy="user", cascade={"all"})
     */
    private $cours;

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
}
