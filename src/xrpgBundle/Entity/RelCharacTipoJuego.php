<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelCharacTipoJuego
 *
 * @ORM\Table(name="rel_charac_tipojuego")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\RelCharacTipoJuegoRepository")
 */
class RelCharacTipoJuego
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_charactipojuego", type="integer")
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
     * @var int
     *
     * ORM\Column(name="id_tipojuego", type="integer")
     * @ORM\ManyToOne(targetEntity="TipoJuego");
     * @ORM\JoinColumn(name="id_tipojuego", referencedColumnName="id_tipojuego");
     */
    private $idTipojuego;

    /**
     * @var int
     *
     * @ORM\Column(name="probabilidad", type="integer")
     */
    private $probabilidad;


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
     * Set idCharacters
     *
     * @param integer $idCharacters
     *
     * @return RelCharacTipoJuego
     */
    public function setIdCharacters($idCharacters)
    {
        $this->idCharacters = $idCharacters;

        return $this;
    }

    /**
     * Get idCharacters
     *
     * @return int
     */
    public function getIdCharacters()
    {
        return $this->idCharacters;
    }

    /**
     * Set idTipojuego
     *
     * @param integer $idTipojuego
     *
     * @return RelCharacTipoJuego
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
     * Set probabilidad
     *
     * @param integer $probabilidad
     *
     * @return RelCharacTipoJuego
     */
    public function setProbabilidad($probabilidad)
    {
        $this->probabilidad = $probabilidad;

        return $this;
    }

    /**
     * Get probabilidad
     *
     * @return int
     */
    public function getProbabilidad()
    {
        return $this->probabilidad;
    }
}

