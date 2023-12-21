<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relmistipojuego
 *
 * @ORM\Table(name="rel_mis_tipojuego")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relmistipojuegoRepository")
 */
class relmistipojuego
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relmistipojuego", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_mision", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\misiones", inversedBy="id")
     * @ORM\JoinColumn(name="id_mision", referencedColumnName="id_mision")
     */
    private $idMision;

    /**
     * @var int
     *
     * ORM\Column(name="id_tipojuego", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\TipoJuego", inversedBy="id")
     * @ORM\JoinColumn(name="id_tipojuego", referencedColumnName="id_tipojuego")
     */
    private $idTipojuego;


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
     * Set idMision.
     *
     * @param int $idMision
     *
     * @return relmistipojuego
     */
    public function setIdMision($idMision)
    {
        $this->idMision = $idMision;

        return $this;
    }

    /**
     * Get idMision.
     *
     * @return int
     */
    public function getIdMision()
    {
        return $this->idMision;
    }

    /**
     * Set idTipojuego.
     *
     * @param int $idTipojuego
     *
     * @return relmistipojuego
     */
    public function setIdTipojuego($idTipojuego)
    {
        $this->idTipojuego = $idTipojuego;

        return $this;
    }

    /**
     * Get idTipojuego.
     *
     * @return int
     */
    public function getIdTipojuego()
    {
        return $this->idTipojuego;
    }
}
