<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relmislugar
 *
 * @ORM\Table(name="rel_mis_lugar")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relmislugarRepository")
 */
class relmislugar
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relmislugar", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * ORM\Column(name="id_lugares", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\lugares", inversedBy="id")
     * @ORM\JoinColumn(name="id_lugares", referencedColumnName="id_lugares")
     */
    private $idLugares;


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
     * Set idMisiones.
     *
     * @param int $idMisiones
     *
     * @return relmislugar
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
     * Set idLugares.
     *
     * @param int $idLugares
     *
     * @return relmislugar
     */
    public function setIdLugares($idLugares)
    {
        $this->idLugares = $idLugares;

        return $this;
    }

    /**
     * Get idLugares.
     *
     * @return int
     */
    public function getIdLugares()
    {
        return $this->idLugares;
    }
}
