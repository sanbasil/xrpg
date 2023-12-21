<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * objects
 *
 * @ORM\Table(name="objetos")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\objectsRepository")
 */
class objects
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_objetos", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var int
     *
     * ORM\Column(name="id_tipoobjeto", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\tipoobj");
     * @ORM\JoinColumn(name="id_tipoobjeto", referencedColumnName="id_tipoobj");
     */
    private $idTipoobjeto;

    /**
     * @var int
     *
     * @ORM\Column(name="precio", type="integer")
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string")
     */
    private $icon;


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
     * Set idTipoobjeto.
     *
     * @param int $idTipoobjeto
     *
     * @return objects
     */
    public function setIdTipoobjeto($idTipoobjeto)
    {
        $this->idTipoobjeto = $idTipoobjeto;

        return $this;
    }

    /**
     * Get idTipoobjeto.
     *
     * @return int
     */
    public function getIdTipoobjeto()
    {
        return $this->idTipoobjeto;
    }

    /**
     * Set precio.
     *
     * @param int $precio
     *
     * @return objects
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio.
     *
     * @return int
     */
    public function getPrecio()
    {
        return $this->precio;
    }       

    /**
     * Set nombre.
     *
     * @param int $nombre
     *
     * @return objects
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre.
     *
     * @return int
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set icon.
     *
     * @param int $icon
     *
     * @return objects
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon.
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }
}
