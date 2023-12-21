<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * objects
 *
 * @ORM\Table(name="tipoobj")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\objectsRepository")
 */
class tipoobj
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tipoobj", type="integer")
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
     * @ORM\Column(name="inaction", type="integer")
     */
    private $inaction;


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
     * @return objects
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
     * Set inaction.
     *
     * @param int $inaction
     *
     * @return objects
     */
    public function setInaction($inaction)
    {
        $this->inaction = $inaction;

        return $this;
    }

    /**
     * Get inaction.
     *
     * @return int
     */
    public function getInaction()
    {
        return $this->inaction;
    }
}
