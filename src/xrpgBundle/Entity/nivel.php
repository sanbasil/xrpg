<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nivel
 *
 * @ORM\Table(name="niveles")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\NivelRepository")
 */
class nivel
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_nivel", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="nivel", type="integer")
     */
    private $nivel;

    /**
     * @var int
     *
     * @ORM\Column(name="rango", type="integer")
     */
    private $rango;


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
     * Set nivel
     *
     * @param integer $nivel
     *
     * @return Nivel
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return int
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set rango
     *
     * @param integer $rango
     *
     * @return Nivel
     */
    public function setRango($rango)
    {
        $this->rango = $rango;

        return $this;
    }

    /**
     * Get rango
     *
     * @return int
     */
    public function getRango()
    {
        return $this->rango;
    }

    public function __toString()
    {
        return strval($this->nivel);
    }
}

