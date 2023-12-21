<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relmismanscamp
 *
 * @ORM\Table(name="rel_mis_mans_camp")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relmismanscampRepository")
 */
class relmismanscamp
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relmismanscamp", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var misiones idMisiones
     *
     * ORM\Column(name="id_misiones", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\misiones", inversedBy="id")
     * @ORM\JoinColumn(name="id_misiones", referencedColumnName="id_misiones")
     */
    private $idMisiones;

    /**
     * @var mans idMans
     *
     * ORM\Column(name="id_mans", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\mans", inversedBy="id")
     * @ORM\JoinColumn(name="id_mans", referencedColumnName="id_mans")
     */
    private $idMans;

    /**
     * @var campaigns idCampaigns
     *
     * ORM\Column(name="id_campaigns", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\campaigns", inversedBy="id")
     * @ORM\JoinColumn(name="id_campaigns", referencedColumnName="id_campaigns")
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
     * Set idMisiones.
     *
     * @param int $idMisiones
     *
     * @return relmismanscamp
     */
    public function setIdMisiones($idMisiones)
    {
        $this->idMisiones = $idMisiones;

        return $this;
    }

    /**
     * Get idMisiones.
     *
     * @return int
     */
    public function getIdMisiones()
    {
        return $this->idMisiones;
    }

    /**
     * Set idMans.
     *
     * @param int $idMans
     *
     * @return relmismanscamp
     */
    public function setIdMans($idMans)
    {
        $this->idMans = $idMans;

        return $this;
    }

    /**
     * Get idMans.
     *
     * @return int
     */
    public function getIdMans()
    {
        return $this->idMans;
    }

        /**
     * Set idCampaigns.
     *
     * @param int $idCampaigns
     *
     * @return relmismanscamp
     */
    public function setIdCampaigns($idCampaigns)
    {
        $this->idCampaigns = $idCampaigns;

        return $this;
    }

    /**
     * Get idCampaigns.
     *
     * @return int
     */
    public function getIdCampaigns()
    {
        return $this->idCampaigns;
    }
}
