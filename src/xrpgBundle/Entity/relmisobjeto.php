<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relmisobjeto
 *
 * @ORM\Table(name="rel_mis_objeto")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relmisobjetoRepository")
 */
class relmisobjeto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_misobjeto", type="integer")
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
     * @var string
     *
     * ORM\Column(name="id_objetos", type="string", length=255)
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\objects", inversedBy="id")
     * @ORM\JoinColumn(name="id_objetos", referencedColumnName="id_objetos")
     */
    private $idObjetos;


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
     * @return relmisobjeto
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
     * Set idObjetos.
     *
     * @param string $idObjetos
     *
     * @return relmisobjeto
     */
    public function setIdObjetos($idObjetos)
    {
        $this->idObjetos = $idObjetos;

        return $this;
    }

    /**
     * Get idObjetos.
     *
     * @return string
     */
    public function getIdObjetos()
    {
        return $this->idObjetos;
    }
}
