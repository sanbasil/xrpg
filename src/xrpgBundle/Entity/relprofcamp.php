<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relprofcamp
 *
 * @ORM\Table(name="rel_prof_camp")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relprofcampRepository")
 */
class relprofcamp
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relprofcamp", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_profesiones", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\profesiones", inversedBy="id")
     * @ORM\JoinColumn(name="id_profesiones", referencedColumnName="id_profesiones")
     */
    private $idProfesiones;

    /**
     * @var int
     *
     * ORM\Column(name="id_campañas", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\campaigns", inversedBy="id")
     * @ORM\JoinColumn(name="id_campañas", referencedColumnName="id_campañas")
     */
    private $idCampaigns;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;


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
     * Set idProfesiones.
     *
     * @param int $idProfesiones
     *
     * @return relprofcamp
     */
    public function setIdProfesiones($idProfesiones)
    {
        $this->idProfesiones = $idProfesiones;

        return $this;
    }

    /**
     * Get idProfesiones.
     *
     * @return int
     */
    public function getIdProfesiones()
    {
        return $this->idProfesiones;
    }

    /**
     * Set idCampaigns.
     *
     * @param int $idCampaigns
     *
     * @return relprofcamp
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
     * Set cantidad.
     *
     * @param int $cantidad
     *
     * @return relprofcamp
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad.
     *
     * @return int
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }
}
