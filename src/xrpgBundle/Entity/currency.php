<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * currency
 *
 * @ORM\Table(name="currency")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\currencyRepository")
 */
class currency
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_currency", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, unique=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(name="id_campaigns", type="integer")
     */
    private $idCampaigns;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion.
     *
     * @param string $descripcion
     *
     * @return currency
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set idCampaigns.
     *
     * @param integer $idCampaigns
     *
     * @return currency
     */
    public function setIdCampaigns($idCampaigns)
    {
        $this->idCampaigns = $idCampaigns;

        return $this;
    }

    /**
     * Get idCampaigns.
     *
     * @return integer
     */
    public function getIdCampaigns()
    {
        return $this->idCampaigns;
    }
}
