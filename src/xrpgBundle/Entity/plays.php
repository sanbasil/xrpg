<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * plays
 *
 * @ORM\Table(name="plays")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\playsRepository")
 */
class plays
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_plays", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_characters", type="integer")
     * @ORM\ManyToOne(targetEntity="characters");
     * @ORM\JoinColumn(name="id_characters", referencedColumnName="id_characters");
     */
    private $idCharacters;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var int
     *
     * ORM\Column(name="id_tipojuego", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\TipoJuego", inversedBy="id")
     * @ORM\JoinColumn(name="id_tipojuego", referencedColumnName="id_tipojuego")
     */
    private $idTipojuego;

    /**
     * @var float
     *
     * @ORM\Column(name="duracion_o", type="float")
     */
    private $duracion_o;

    /**
     * @var float
     *
     * @ORM\Column(name="duracion_p", type="float")
     */
    private $duracion_p;

        /**
     * @var float
     *
     * @ORM\Column(name="duracion_a", type="float")
     */
    private $duracion_a;

        /**
     * @var float
     *
     * @ORM\Column(name="duracion_dp", type="float")
     */
    private $duracion_dp;

        /**
     * @var float
     *
     * @ORM\Column(name="duracion_m", type="float")
     */
    private $duracion_m;

        /**
     * @var float
     *
     * @ORM\Column(name="duracion_mto", type="float")
     */
    private $duracion_mto;

        /**
     * @var float
     *
     * @ORM\Column(name="duracion_c", type="float")
     */
    private $duracion_c;

        /**
     * @var float
     *
     * @ORM\Column(name="duracion_cto", type="float")
     */
    private $duracion_cto;

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
     * @ORM\Column(name="puntos", type="integer")
     */
    private $puntos;

    /**
     * @var int
     *
     * @ORM\Column(name="cc", type="integer")
     */
    //private $cc;


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
     * Set idCharacters.
     *
     * @param int $idCharacters
     *
     * @return plays
     */
    public function setIdCharacters($idCharacters)
    {
        $this->idCharacters = $idCharacters;

        return $this;
    }

    /**
     * Get idCharacters.
     *
     * @return int
     */
    public function getIdCharacters()
    {
        return $this->idCharacters;
    }

    /**
     * Set fecha.
     *
     * @param \DateTime $fecha
     *
     * @return plays
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha.
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set idTipojuego.
     *
     * @param int $idTipojuego
     *
     * @return plays
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

    /**
     * Set duracion_o.
     *
     * @param float $duracion_o
     *
     * @return plays
     */
    public function setDuracionO($duracion_o)
    {
        $this->duracion_o = $duracion_o;

        return $this;
    }

    /**
     * Get duracion_o.
     *
     * @return float
     */
    public function getDuracionO()
    {
        return $this->duracion_o;
    }

     /**
     * Set duracion_p.
     *
     * @param float $duracion_p
     *
     * @return plays
     */
    public function setDuracionP($duracion_p)
    {
        $this->duracion_p = $duracion_p;

        return $this;
    }

    /**
     * Get duracion_p.
     *
     * @return float
     */
    public function getDuracionP()
    {
        return $this->duracion_p;
    }

    /**
     * Set duracion_a.
     *
     * @param float $duracion_a
     *
     * @return plays
     */
    public function setDuracionA($duracion_a)
    {
        $this->duracion_a = $duracion_a;

        return $this;
    }

    /**
     * Get duracion_a.
     *
     * @return float
     */
    public function getDuracionA()
    {
        return $this->duracion_a;
    }

        /**
     * Set duracion_dp.
     *
     * @param float $duracion_dp
     *
     * @return plays
     */
    public function setDuracionDp($duracion_dp)
    {
        $this->duracion_dp = $duracion_dp;

        return $this;
    }

    /**
     * Get duracion_dp.
     *
     * @return float
     */
    public function getDuracionDp()
    {
        return $this->duracion_dp;
    }

    /**
     * Set duracion_m.
     *
     * @param float $duracion_m
     *
     * @return plays
     */
    public function setDuracionM($duracion_m)
    {
        $this->duracion_m = $duracion_m;

        return $this;
    }

    /**
     * Get duracion_m.
     *
     * @return float
     */
    public function getDuracionM()
    {
        return $this->duracion_m;
    }

/**
     * Set duracion_mto.
     *
     * @param float $duracion_mto
     *
     * @return plays
     */
    public function setDuracionMto($duracion_mto)
    {
        $this->duracion_mto = $duracion_mto;

        return $this;
    }

    /**
     * Get duracion_mto.
     *
     * @return float
     */
    public function getDuracionMto()
    {
        return $this->duracion_mto;
    }

    /**
     * Set duracion_cto.
     *
     * @param float $duracion_cto
     *
     * @return plays
     */
    public function setDuracionCto($duracion_cto)
    {
        $this->duracion_cto = $duracion_cto;

        return $this;
    }

    /**
     * Get duracion_cto.
     *
     * @return float
     */
    public function getDuracionCto()
    {
        return $this->duracion_cto;
    }

    /**
     * Set duracion_c.
     *
     * @param float $duracion_c
     *
     * @return plays
     */
    public function setDuracionC($duracion_c)
    {
        $this->duracion_c = $duracion_c;

        return $this;
    }

    /**
     * Get duracion_c.
     *
     * @return float
     */
    public function getDuracionC()
    {
        return $this->duracion_c;
    }

    /**
     * Set idMisiones.
     *
     * @param int $idMisiones
     *
     * @return plays
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
     * Set puntos
     *
     * @param integer $puntos
     *
     * @return actions
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    /**
     * Get puntos
     *
     * @return int
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set cc
     *
     * @param integer $cc
     *
     * @return actions
     */
    /*public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }*/

    /**
     * Get cc
     *
     * @return int
     */
    /*public function getCc()
    {
        return $this->cc;
    }*/
}
