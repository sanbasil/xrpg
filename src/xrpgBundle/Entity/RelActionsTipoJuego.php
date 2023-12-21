<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelActionsTipoJuego
 *
 * @ORM\Table(name="rel_actions_tipojuego")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\RelActionsTipoJuegoRepository")
 */
class RelActionsTipoJuego
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relactionstipojuego", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_actions", type="integer")
     * @ORM\ManyToOne(targetEntity="actions");
     * @ORM\JoinColumn(name="id_actions", referencedColumnName="id_actions");
     */
    private $idActions;

    /**
     * @var int
     *
     * ORM\Column(name="id_tipojuego", type="integer")
     * @ORM\ManyToOne(targetEntity="TipoJuego");
     * @ORM\JoinColumn(name="id_tipojuego", referencedColumnName="id_tipojuego");
     */
    private $idTipojuego;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean")
     */
    private $activo;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idActions
     *
     * @param integer $idActions
     *
     * @return RelActionsTipoJuego
     */
    public function setIdActions($idActions)
    {
        $this->idActions = $idActions;

        return $this;
    }

    /**
     * Get idActions
     *
     * @return int
     */
    public function getIdActions()
    {
        return $this->idActions;
    }

    /**
     * Set idTipojuego
     *
     * @param integer $idTipojuego
     *
     * @return RelActionsTipoJuego
     */
    public function setIdTipojuego($idTipojuego)
    {
        $this->idTipojuego = $idTipojuego;

        return $this;
    }

    /**
     * Get idTipojuego
     *
     * @return int
     */
    public function getIdTipojuego()
    {
        return $this->idTipojuego;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return RelActionsTipoJuego
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return bool
     */
    public function getActivo()
    {
        return $this->activo;
    }
}

