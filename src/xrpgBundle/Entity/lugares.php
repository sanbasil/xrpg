<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * lugares
 *
 * @ORM\Table(name="lugares")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\lugaresRepository")
 */
class lugares
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_lugares", type="integer")
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
     * @return lugares
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
}
