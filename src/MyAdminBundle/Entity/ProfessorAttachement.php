<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * ProfessorAttachement
 *
 * @ORM\Table(name="professor_attachement")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\ProfessorAttachementRepository")
 * @ORM\HasLifecycleCallbacks
 */
class ProfessorAttachement
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
     * @ORM\Column(name="extension", type="string", length=255, nullable=true)
     */
    private $extension;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateUpdate", type="datetime", nullable=true)
     */
    private $dateUpdate;
    
    /**
     * @Assert\File(
     *     maxSize = "5M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/x-icon"},
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
     * Temp path for old file
     * @var string 
     */
    private $filenameForOldFile;
    
    /**
     * Temp name
     * @var string
     */
    private $tempName;
    
    /**
     * @var string
     */
    private $rootDir;
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload(){
        if(null !== $this->file){
            // Update action
            if(null !== $this->name)
                $this->filenameForOldFile = $this->getAbsolutePath();
            
            // Set extension and true name
            $this->extension    = $this->file->guessExtension();
            $this->name         = $this->tempName;
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
        if($this->filenameForOldFile)
            unlink($this->filenameForOldFile);
        
        // Move file (detect exception)
        $this->file->move($this->getUploadRootDir(), $this->name.'.'.$this->extension);

        unset($this->file);
    }

    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove(){
        $this->filenameForRemove = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload(){
        if($this->filenameForRemove)
            unlink($this->filenameForRemove);
    }

    /**
     * Get absolute path
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
        return 'bundles/101cours/professor';
    }
    
    /**
     * Create slug
     * @return string
     */
    public function createSlug(){
        $slug = $this->name;
        
        // Transform title to create slug
        setlocale(LC_ALL, 'fr_FR.UTF8'); // Very important !
        
	$slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);
	$slug = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $slug);
	$slug = strtolower(trim($slug, '-'));
	$slug = preg_replace("/[\/_|+ -]+/", '-', $slug);
        
        return $slug;
    }
    
    /**
     * Constructor
     */
    public function __construct(){
        // Generate unique and random name
        $this->tempName     = sha1(uniqid(mt_rand(), true));
        
        // Set date update
        $this->dateUpdate  = new \DateTime;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        
        // Generate unique and random name
        $this->tempName = sha1(uniqid(mt_rand(), true));
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
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
     *
     * @return LeaseAttachment
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
     * Set extension
     *
     * @param string $extension
     *
     * @return LeaseAttachment
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

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     *
     * @return LeaseAttachment
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
     * Set rootDir
     *
     * @param string $rootDir
     * @return Picture
     */
    public function setRootDir($rootDir)
    {
        $this->rootDir = $rootDir;

        return $this;
    }
}
