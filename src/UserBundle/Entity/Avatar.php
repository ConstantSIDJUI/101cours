<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Avatar
 *
 * @ORM\Table(name="avatar")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\AvatarRepository")
 */
class Avatar
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateUpdate", type="datetimetz", nullable=true)
     */
    private $dateUpdate;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=255, nullable=true)
     */
    private $extension;
    
    /**
     * @Assert\File(
     *     maxSize = "2M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png"},
     *     mimeTypesMessage = "Le fichier choisi ne correspond pas à un fichier valide",
     *     notFoundMessage = "Le fichier n'a pas été trouvé sur le disque",
     *     uploadErrorMessage = "Erreur dans l'upload du fichier"
     * )
     */
    private $file;
    
    /**
     * Temp path for remove action
     * @var string 
     */
    private $filenameForRemove;
    
    /**
     * Temp extension for remove action
     * @var string 
     */
    private $fileForRemoveExtension;
    
    /**
     * Temp path for old extension
     * @var string 
     */
    private $fileForOldExtension;
    
    /**
     * Temp path for old file
     * @var string 
     */
    private $filenameForOldFile;
    
    /**
     * Constructor
     */
    public function __construct(){
        // Set date update
        $this->dateUpdate = new \DateTime();
    }
    
    /**
     * get absolute path
     * @return string
     */
    public function getAbsolutePath(){
        return null === $this->name ? null : $this->getUploadRootDir().'/'.$this->name.'.'.$this->extension;
    }

    /**
     * Get Upload root dir
     * @return string
     */
    protected function getUploadRootDir(){
       return $this->rootDir.'/../web/'.$this->getUploadDir();
    }

    /**
     * Get Upload dir
     * @return string
     */
    protected function getUploadDir(){
        return 'bundles/101cours/uploads/profil';
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload(){
        if(null !== $this->file){
            // Update action
            if(null !== $this->name){
                $this->filenameForOldFile   = $this->name;
                $this->fileForOldExtension  = $this->extension;
            }
            
            // Set extension and clean name
            $this->extension = $this->file->guessExtension();
            // Clean name
            $this->name = sha1(uniqid(mt_rand(), true));
        }
    }
    
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload(){
        if(null === $this->file)
            return;

        // Upload action
        if($this->filenameForOldFile){
            $folder = '/web/bundles/101cours/uploads/profil/';
            @unlink($folder.$this->filenameForOldFile.'.'.$this->fileForOldExtension);
        }
        
        // Move file (detect exception)
        $this->file->move($this->getUploadRootDir(), $this->name.'.'.$this->extension);

        unset($this->file);
    }
    
    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove(){
        $this->filenameForRemove        = $this->name;
        $this->fileForRemoveExtension   = $this->extension;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload(){
        if($this->filenameForRemove){            
            $folder = '/web/bundles/101cours/uploads/profil/';
            @unlink($folder.$this->filenameForRemove.'.'.$this->fileForRemoveExtension);
        }
    }

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
     * @return Avatar
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
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     * @return Avatar
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * Get dateUpdate
     *
     * @return \DateTime 
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return Avatar
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }
}
