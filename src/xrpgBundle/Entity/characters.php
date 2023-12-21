<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * characters
 *
 * @ORM\Table(name="characters")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\CharactersRepository")
 */
class characters
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id_characters", type="integer")
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
     * ORM\Column(name="id_nivel", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\nivel")
     * @ORM\JoinColumn(name="id_nivel", referencedColumnName="id_nivel")
     */
    private $idNivel;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     */
    private $imagen;

    /**
     * @var int
     *
     * @ORM\Column(name="experiencia", type="integer")
     */
    private $experiencia;

    /**
     * @var int
     *
     * @ORM\Column(name="estamina_max", type="integer")
     */
    private $estamina_max;

    /**
     * @var int
     *
     * @ORM\Column(name="estamina_actual", type="integer")
     */
    private $estamina_actual;

/**
     * @var int
     *
     * @ORM\Column(name="resistencia_p", type="integer")
     */
    private $resistencia_p;

    /**
     * @var int
     *
     * @ORM\Column(name="resistencia_c", type="integer")
     */
    private $resistencia_c;

    /**
     * @var int
     *
     * @ORM\Column(name="resistencia_m", type="integer")
     */
    private $resistencia_m;

    /**
     * @var int
     *
     * @ORM\Column(name="morbo", type="integer")
     */
    private $morbo;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=1)
     */
    private $categoria;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return characters
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set idNivel
     *
     * @param integer $idNivel
     *
     * @return characters
     */
    public function setIdNivel($idNivel)
    {
        $this->idNivel = $idNivel;

        return $this;
    }

    /**
     * Get idNivel
     *
     * @return int
     */
    public function getIdNivel()
    {
        return $this->idNivel;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return characters
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set experiencia
     *
     * @param integer $experiencia
     *
     * @return characters
     */
    public function setExperiencia($experiencia)
    {
        $this->experiencia = $experiencia;

        return $this;
    }

    /**
     * Get experiencia
     *
     * @return int
     */
    public function getExperiencia()
    {
        return $this->experiencia;
    }

    /**
     * Set estamina_max
     *
     * @param integer $estamina_max
     *
     * @return characters
     */
    public function setEstaminaMax($estamina_max)
    {
        $this->estamina_max = $estamina_max;

        return $this;
    }

    /**
     * Get estamina_max
     *
     * @return int
     */
    public function getEstaminaMax()
    {
        return $this->estamina_max;
    }

        /**
     * Set estamina_actual
     *
     * @param integer $estamina_actual
     *
     * @return characters
     */
    public function setEstaminaActual($estamina_actual)
    {
        $this->estamina_actual = $estamina_actual;

        return $this;
    }

    /**
     * Get estamina_actual
     *
     * @return int
     */
    public function getEstaminaActual()
    {
        return $this->estamina_actual;
    }

        /**
     * Set resistencia_c
     *
     * @param integer $resistencia_c
     *
     * @return characters
     */
    public function setResistencia_c($resistencia_c)
    {
        $this->resistencia_c = $resistencia_c;

        return $this;
    }

    /**
     * Get resistencia_c
     *
     * @return int
     */
    public function getResistencia_c()
    {
        return $this->resistencia_c;
    }

        /**
     * Set resistencia_p
     *
     * @param integer $resistencia_p
     *
     * @return characters
     */
    public function setResistencia_p($resistencia_p)
    {
        $this->resistencia_p = $resistencia_p;

        return $this;
    }

    /**
     * Get resistencia
     *
     * @return int
     */
    public function getResistencia_p()
    {
        return $this->resistencia_p;
    }

        /**
     * Set resistencia_m
     *
     * @param integer $resistencia_m
     *
     * @return characters
     */
    public function setResistencia_m($resistencia_m)
    {
        $this->resistencia_m = $resistencia_m;

        return $this;
    }

    /**
     * Get resistencia_m
     *
     * @return int
     */
    public function getResistencia_m()
    {
        return $this->resistencia_m;
    }

    /**
     * Set morbo
     *
     * @param integer $morbo
     *
     * @return characters
     */
    public function setMorbo($morbo)
    {
        $this->morbo = $morbo;

        return $this;
    }

    /**
     * Get morbo
     *
     * @return int
     */
    public function getMorbo()
    {
        return $this->morbo;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     *
     * @return characters
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    public function __toString()
    {
        return strval($this->id);
    }
}

