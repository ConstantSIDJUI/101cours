<?php

namespace MyAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="MyAdminBundle\Repository\AnnonceRepository")
 */
class Annonce
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
     * @var int
     *
     * @ORM\Column(name="tarif10", type="integer", nullable=true)
     */
    private $tarif10;

    /**
     * @var int
     *
     * @ORM\Column(name="tarif16", type="integer", nullable=true)
     */
    private $tarif16;

    /**
     * @var int
     *
     * @ORM\Column(name="tarif30", type="integer", nullable=true)
     */
    private $tarif30;

    /**
     * @var int
     *
     * @ORM\Column(name="total10", type="integer", nullable=true)
     */
    private $total10;

    /**
     * @var int
     *
     * @ORM\Column(name="total16", type="integer", nullable=true)
     */
    private $total16;

    /**
     * @var int
     *
     * @ORM\Column(name="total30", type="integer", nullable=true)
     */
    private $total30;

    /**
     * @var int
     *
     * @ORM\Column(name="frais10", type="integer", nullable=true)
     */
    private $frais10;

    /**
     * @var int
     *
     * @ORM\Column(name="frais16", type="integer", nullable=true)
     */
    private $frais16;

    /**
     * @var int
     *
     * @ORM\Column(name="frais30", type="integer", nullable=true)
     */
    private $frais30;

    /**
     * @var int
     *
     * @ORM\Column(name="frais101cours10", type="integer", nullable=true)
     */
    private $frais101cours10;

    /**
     * @var int
     *
     * @ORM\Column(name="frais101cours16", type="integer", nullable=true)
     */
    private $frais101cours16;

    /**
     * @var int
     *
     * @ORM\Column(name="frais101cours30", type="integer", nullable=true)
     */
    private $frais101cours30;

    /**
     * @var int
     *
     * @ORM\Column(name="tva10", type="integer", nullable=true)
     */
    private $tva10;

    /**
     * @var int
     *
     * @ORM\Column(name="tva16", type="integer", nullable=true)
     */
    private $tva16;

    /**
     * @var int
     *
     * @ORM\Column(name="tva30", type="integer")
     */
    private $tva30;

    /**
     * @var int
     *
     * @ORM\Column(name="price_pack10", type="integer", nullable=true)
     */
    private $pricePack10;

    /**
     * @var int
     *
     * @ORM\Column(name="price_pack16", type="integer", nullable=true)
     */
    private $pricePack16;

    /**
     * @var int
     *
     * @ORM\Column(name="price_pack30", type="integer")
     */
    private $pricePack30;

    /**
     * @var int
     *
     * @ORM\Column(name="price_hour10", type="integer", nullable=true)
     */
    private $priceHour10;

    /**
     * @var int
     *
     * @ORM\Column(name="price_hour16", type="integer", nullable=true)
     */
    private $priceHour16;

    /**
     * @var int
     *
     * @ORM\Column(name="price_hour30", type="integer")
     */
    private $priceHour30;


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
     * Set tarif10
     *
     * @param integer $tarif10
     * @return Annonce
     */
    public function setTarif10($tarif10)
    {
        $this->tarif10 = $tarif10;

        return $this;
    }

    /**
     * Get tarif10
     *
     * @return integer 
     */
    public function getTarif10()
    {
        return $this->tarif10;
    }

    /**
     * Set tarif16
     *
     * @param integer $tarif16
     * @return Annonce
     */
    public function setTarif16($tarif16)
    {
        $this->tarif16 = $tarif16;

        return $this;
    }

    /**
     * Get tarif16
     *
     * @return integer 
     */
    public function getTarif16()
    {
        return $this->tarif16;
    }

    /**
     * Set tarif30
     *
     * @param integer $tarif30
     * @return Annonce
     */
    public function setTarif30($tarif30)
    {
        $this->tarif30 = $tarif30;

        return $this;
    }

    /**
     * Get tarif30
     *
     * @return integer 
     */
    public function getTarif30()
    {
        return $this->tarif30;
    }

    /**
     * Set total10
     *
     * @param integer $total10
     * @return Annonce
     */
    public function setTotal10($total10)
    {
        $this->total10 = $total10;

        return $this;
    }

    /**
     * Get total10
     *
     * @return integer 
     */
    public function getTotal10()
    {
        return $this->total10;
    }

    /**
     * Set total16
     *
     * @param integer $total16
     * @return Annonce
     */
    public function setTotal16($total16)
    {
        $this->total16 = $total16;

        return $this;
    }

    /**
     * Get total16
     *
     * @return integer 
     */
    public function getTotal16()
    {
        return $this->total16;
    }

    /**
     * Set total30
     *
     * @param integer $total30
     * @return Annonce
     */
    public function setTotal30($total30)
    {
        $this->total30 = $total30;

        return $this;
    }

    /**
     * Get total30
     *
     * @return integer 
     */
    public function getTotal30()
    {
        return $this->total30;
    }

    /**
     * Set frais10
     *
     * @param integer $frais10
     * @return Annonce
     */
    public function setFrais10($frais10)
    {
        $this->frais10 = $frais10;

        return $this;
    }

    /**
     * Get frais10
     *
     * @return integer 
     */
    public function getFrais10()
    {
        return $this->frais10;
    }

    /**
     * Set frais16
     *
     * @param integer $frais16
     * @return Annonce
     */
    public function setFrais16($frais16)
    {
        $this->frais16 = $frais16;

        return $this;
    }

    /**
     * Get frais16
     *
     * @return integer 
     */
    public function getFrais16()
    {
        return $this->frais16;
    }

    /**
     * Set frais30
     *
     * @param integer $frais30
     * @return Annonce
     */
    public function setFrais30($frais30)
    {
        $this->frais30 = $frais30;

        return $this;
    }

    /**
     * Get frais30
     *
     * @return integer 
     */
    public function getFrais30()
    {
        return $this->frais30;
    }

    /**
     * Set frais101cours10
     *
     * @param integer $frais101cours10
     * @return Annonce
     */
    public function setFrais101cours10($frais101cours10)
    {
        $this->frais101cours10 = $frais101cours10;

        return $this;
    }

    /**
     * Get frais101cours10
     *
     * @return integer 
     */
    public function getFrais101cours10()
    {
        return $this->frais101cours10;
    }

    /**
     * Set frais101cours16
     *
     * @param integer $frais101cours16
     * @return Annonce
     */
    public function setFrais101cours16($frais101cours16)
    {
        $this->frais101cours16 = $frais101cours16;

        return $this;
    }

    /**
     * Get frais101cours16
     *
     * @return integer 
     */
    public function getFrais101cours16()
    {
        return $this->frais101cours16;
    }

    /**
     * Set frais101cours30
     *
     * @param integer $frais101cours30
     * @return Annonce
     */
    public function setFrais101cours30($frais101cours30)
    {
        $this->frais101cours30 = $frais101cours30;

        return $this;
    }

    /**
     * Get frais101cours30
     *
     * @return integer 
     */
    public function getFrais101cours30()
    {
        return $this->frais101cours30;
    }

    /**
     * Set tva10
     *
     * @param integer $tva10
     * @return Annonce
     */
    public function setTva10($tva10)
    {
        $this->tva10 = $tva10;

        return $this;
    }

    /**
     * Get tva10
     *
     * @return integer 
     */
    public function getTva10()
    {
        return $this->tva10;
    }

    /**
     * Set tva16
     *
     * @param integer $tva16
     * @return Annonce
     */
    public function setTva16($tva16)
    {
        $this->tva16 = $tva16;

        return $this;
    }

    /**
     * Get tva16
     *
     * @return integer 
     */
    public function getTva16()
    {
        return $this->tva16;
    }

    /**
     * Set tva30
     *
     * @param integer $tva30
     * @return Annonce
     */
    public function setTva30($tva30)
    {
        $this->tva30 = $tva30;

        return $this;
    }

    /**
     * Get tva30
     *
     * @return integer 
     */
    public function getTva30()
    {
        return $this->tva30;
    }

    /**
     * Set pricePack10
     *
     * @param integer $pricePack10
     * @return Annonce
     */
    public function setPricePack10($pricePack10)
    {
        $this->pricePack10 = $pricePack10;

        return $this;
    }

    /**
     * Get pricePack10
     *
     * @return integer 
     */
    public function getPricePack10()
    {
        return $this->pricePack10;
    }

    /**
     * Set pricePack16
     *
     * @param integer $pricePack16
     * @return Annonce
     */
    public function setPricePack16($pricePack16)
    {
        $this->pricePack16 = $pricePack16;

        return $this;
    }

    /**
     * Get pricePack16
     *
     * @return integer 
     */
    public function getPricePack16()
    {
        return $this->pricePack16;
    }

    /**
     * Set pricePack30
     *
     * @param integer $pricePack30
     * @return Annonce
     */
    public function setPricePack30($pricePack30)
    {
        $this->pricePack30 = $pricePack30;

        return $this;
    }

    /**
     * Get pricePack30
     *
     * @return integer 
     */
    public function getPricePack30()
    {
        return $this->pricePack30;
    }

    /**
     * Set priceHour10
     *
     * @param integer $priceHour10
     * @return Annonce
     */
    public function setPriceHour10($priceHour10)
    {
        $this->priceHour10 = $priceHour10;

        return $this;
    }

    /**
     * Get priceHour10
     *
     * @return integer 
     */
    public function getPriceHour10()
    {
        return $this->priceHour10;
    }

    /**
     * Set priceHour16
     *
     * @param integer $priceHour16
     * @return Annonce
     */
    public function setPriceHour16($priceHour16)
    {
        $this->priceHour16 = $priceHour16;

        return $this;
    }

    /**
     * Get priceHour16
     *
     * @return integer 
     */
    public function getPriceHour16()
    {
        return $this->priceHour16;
    }

    /**
     * Set priceHour30
     *
     * @param integer $priceHour30
     * @return Annonce
     */
    public function setPriceHour30($priceHour30)
    {
        $this->priceHour30 = $priceHour30;

        return $this;
    }

    /**
     * Get priceHour30
     *
     * @return integer 
     */
    public function getPriceHour30()
    {
        return $this->priceHour30;
    }
}
