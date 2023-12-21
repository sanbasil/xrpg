<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relmisacttipo
 *
 * @ORM\Table(name="rel_mis_acttipo")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relmisacttipoRepository")
 */
class relmisacttipo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relmisacttipo", type="integer")
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
     * ORM\Column(name="id_acttipo", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\acttipo", inversedBy="id")
     * @ORM\JoinColumn(name="id_acttipo", referencedColumnName="id_acttipo")
     */
    private $idActtipo;

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
     * Set idMisiones.
     *
     * @param int $idMisiones
     *
     * @return relmisacttipo
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
     * Set idActtipo.
     *
     * @param int $idActtipo
     *
     * @return relmisacttipo
     */
    public function setIdActtipo($idActtipo)
    {
        $this->idActtipo = $idActtipo;

        return $this;
    }

    /**
     * Get idActtipo.
     *
     * @return int
     */
    public function getIdActtipo()
    {
        return $this->idActtipo;
    }

    /**
     * Set prob.
     *
     * @param int $prob
     *
     * @return relmisacttipo
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
