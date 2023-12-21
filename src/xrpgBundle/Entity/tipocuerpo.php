<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * tipocuerpo
 *
 * @ORM\Table(name="tipo_cuerpo")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\tipocuerpoRepository")
 */
class tipocuerpo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tipocuerpo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="prob", type="integer")
     */
    private $prob;


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
     * @return tipocuerpo
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
     * Set prob.
     *
     * @param int $prob
     *
     * @return tipocuerpo
     */
    public function setProb($prob)
    {
        $this->prob = $prob;

        return $this;
    }

    /**
     * Get prob.
     *
     * @return int
     */
    public function getProb()
    {
        return $this->prob;
    }
}
