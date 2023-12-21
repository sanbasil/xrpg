<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relcharacobj
 *
 * @ORM\Table(name="rel_charac_obj")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relcharacobjRepository")
 */
class relcharacobj
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relcharacobj", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_characters", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\characters", inversedBy="id")
     * @ORM\JoinColumn(name="id_characters", referencedColumnName="id_characters")
     */
    private $idCharacters;

    /**
     * @var int
     *
     * ORM\Column(name="id_objetos", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\objects", inversedBy="id")
     * @ORM\JoinColumn(name="id_objetos", referencedColumnName="id_objetos")
     */
    private $idObjetos;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;


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
     * Set idCharacters.
     *
     * @param int $idCharacters
     *
     * @return relcharacobj
     */
    public function setIdCharacters($idCharacters)
    {
        $this->idCharacters = $idCharacters;

        return $this;
    }

    /**
     * Get idCharacters.
     *
     * @return int
     */
    public function getIdCharacters()
    {
        return $this->idCharacters;
    }

    /**
     * Set idObjetos.
     *
     * @param int $idObjetos
     *
     * @return relcharacobj
     */
    public function setIdObjetos($idObjetos)
    {
        $this->idObjetos = $idObjetos;

        return $this;
    }

    /**
     * Get idObjetos.
     *
     * @return int
     */
    public function getIdObjetos()
    {
        return $this->idObjetos;
    }

    /**
     * Set cantidad.
     *
     * @param int $cantidad
     *
     * @return relcharacobj
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad.
     *
     * @return int
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }
}
