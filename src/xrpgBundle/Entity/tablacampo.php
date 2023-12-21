<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * tablacampo
 *
 * @ORM\Table(name="tablacampo")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\tablacampoRepository")
 */
class tablacampo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tablacampo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tabla", type="string", length=255)
     */
    private $tabla;

    /**
     * @var string
     *
     * @ORM\Column(name="campo", type="string", length=255)
     */
    private $campo;


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
     * Set tabla.
     *
     * @param string $tabla
     *
     * @return tablacampo
     */
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;

        return $this;
    }

    /**
     * Get tabla.
     *
     * @return string
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Set campo.
     *
     * @param string $campo
     *
     * @return tablacampo
     */
    public function setCampo($campo)
    {
        $this->campo = $campo;

        return $this;
    }

    /**
     * Get campo.
     *
     * @return string
     */
    public function getCampo()
    {
        return $this->campo;
    }
}
