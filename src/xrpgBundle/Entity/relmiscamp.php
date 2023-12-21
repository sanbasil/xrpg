<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relmiscamp
 *
 * @ORM\Table(name="rel_mis_camp")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relmiscampRepository")
 */
class relmiscamp
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relmiscamp", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_misiones", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\misiones", inversedBy="id")
     * @ORM\JoinColumn(name="id_misiones", referencedColumnName="id_misiones")
     */
    private $idMisiones;

    /**
     * @var int
     *
     * ORM\Column(name="id_campaigns", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\campaigns", inversedBy="id")
     * @ORM\JoinColumn(name="id_campaigns", referencedColumnName="id_campaigns")
     */
    private $idCampaigns;

    /**
     * @var int
     *
     * @ORM\Column(name="iteraciones", type="integer")
     */
    private $iteraciones;


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
     * @return relmiscamp
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
     * Set idCampaigns.
     *
     * @param int $idCampaigns
     *
     * @return relmiscamp
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

    /**
     * Set iteraciones.
     *
     * @param int $iteraciones
     *
     * @return relcharaccamp
     */
    public function setIteraciones($iteraciones)
    {
        $this->iteraciones = $iteraciones;

        return $this;
    }

    /**
     * Get iteraciones.
     *
     * @return int
     */
    public function getIteraciones()
    {
        return $this->iteraciones;
    }
}
