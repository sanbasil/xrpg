<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * actions
 *
 * @ORM\Table(name="actions")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\actionsRepository")
 */
class actions
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_actions", type="integer")
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
     * @var int
     *
     * @ORM\Column(name="valor", type="integer")
     */
    private $valor;

    /**
     * @var int
     *
     * @ORM\Column(name="Nivel", type="integer")
     */
    private $nivel;

    /**
     * @var int
     *
     * @ORM\Column(name="tipo_c", type="boolean")
     */
    private $tipo_c;


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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return actions
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set nivel
     *
     * @param integer $nivel
     *
     * @return actions
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
     * Set tipo_c
     *
     * @param integer $tipo_c
     *
     * @return actions
     */
    public function setTipoC($tipo_c)
    {
        $this->tipo_c = $tipo_c;

        return $this;
    }

    /**
     * Get tipo_c
     *
     * @return int
     */
    public function getTipoC()
    {
        return $this->tipo_c;
    }
}

