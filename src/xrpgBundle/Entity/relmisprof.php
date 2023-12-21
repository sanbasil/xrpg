<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relmiscampprof
 *
 * @ORM\Table(name="rel_mis_prof")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relmiscampprofRepository")
 */
class relmisprof
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relmiscampprof", type="integer")
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
     * ORM\Column(name="id_profesiones", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\profesiones", inversedBy="id")
     * @ORM\JoinColumn(name="id_profesiones", referencedColumnName="id_profesiones")
     */
    private $idProfesiones;


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
     * Set idRelmiscamp.
     *
     * @param int $idRelmiscamp
     *
     * @return relmiscampprof
     */
    public function setIdRelmiscamp($idRelmiscamp)
    {
        $this->idRelmiscamp = $idRelmiscamp;

        return $this;
    }

    /**
     * Get idRelmiscamp.
     *
     * @return int
     */
    public function getIdRelmiscamp()
    {
        return $this->idRelmiscamp;
    }

    /**
     * Set idProfesiones.
     *
     * @param int $idProfesiones
     *
     * @return relmiscampprof
     */
    public function setIdProfesiones($idProfesiones)
    {
        $this->idProfesiones = $idProfesiones;

        return $this;
    }

    /**
     * Get idProfesiones.
     *
     * @return int
     */
    public function getIdProfesiones()
    {
        return $this->idProfesiones;
    }
}
