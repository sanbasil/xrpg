<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * virtudes
 *
 * @ORM\Table(name="virtudes")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\virtudesRepository")
 */
class virtudes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_Virtudes", type="integer")
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
     * @ORM\Column(name="mod_resistencia_charac", type="integer", length=255)
     */
    private $mod_resistencia_charac;

    /**
     * @var int
     *
     * @ORM\Column(name="mod_resistencia_man", type="integer", length=255)
     */
    private $mod_resistencia_man;

    /**
     * @var integer
     *
     * @ORM\Column(name="asset", type="integer", length=255)
     */
    private $asset;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_c", type="integer", length=255)
     */
    private $tipo_c;

    /**
     * @var integer
     *
     * @ORM\Column(name="actions", type="integer", length=255)
     */
    private $actions;


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
     * @return virtudes
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
     * Set mod_resistencia_charac
     *
     * @param string $mod_resistencia_charac
     *
     * @return virtudes
     */
    public function setModResistenciaCharac($mod_resistencia_charac)
    {
        $this->mod_resistencia_charac = $mod_resistencia_charac;

        return $this;
    }

    /**
     * Get mod_resistencia_charac
     *
     * @return integer
     */
    public function getModResistenciaCharac()
    {
        return $this->mod_resistencia_charac;
    }

            /**
     * Set mod_resistencia_man
     *
     * @param string $mod_resistencia_man
     *
     * @return virtudes
     */
    public function setModResistenciaMan($mod_resistencia_man)
    {
        $this->mod_resistencia_man = $mod_resistencia_man;

        return $this;
    }

    /**
     * Get mod_resistencia_man
     *
     * @return integer
     */
    public function getModResistenciaMan()
    {
        return $this->mod_resistencia_man;
    }

    /**
     * Set asset
     *
     * @param string $asset
     *
     * @return virtudes
     */
    public function setAsset($asset)
    {
        $this->asset = $asset;

        return $this;
    }

    /**
     * Get asset
     *
     * @return integer
     */
    public function getAsset()
    {
        return $this->asset;
    }

        /**
     * Set tipo_c
     *
     * @param string $tipo_c
     *
     * @return virtudes
     */
    public function setTipoC($tipo_c)
    {
        $this->tipo_c = $tipo_c;

        return $this;
    }

    /**
     * Get tipo_c
     *
     * @return integer
     */
    public function getTipoC()
    {
        return $this->tipo_c;
    }

    /**
     * Set actions
     *
     * @param string $actions
     *
     * @return virtudes
     */
    public function setActions($actions)
    {
        $this->actions = $actions;

        return $this;
    }

    /**
     * Get actions
     *
     * @return integer
     */
    public function getActions()
    {
        return $this->actions;
    }

    
}
