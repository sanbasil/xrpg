<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * misiones
 *
 * @ORM\Table(name="misiones")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\misionesRepository")
 */
class misiones
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_misiones", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_tipomision", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\tipomision")
     * @ORM\JoinColumn(name="id_tipomision", referencedColumnName="id_tipomision")
     */
    private $idTipomision;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="currency_nec", type="integer")
     */
    private $currencyNec;

    /**
     * @var int
     *
     * @ORM\Column(name="nivel", type="integer")
     */
    private $nivel;

    /**
     * @var int
     *
     * @ORM\Column(name="numMax", type="integer")
     */
    private $numMax;

    /**
     * @var int
     *
     * @ORM\Column(name="currency_val", type="integer")
     */
    private $currencyVal;

    /**
     * @var int
     *
     * @ORM\Column(name="orden", type="integer")
     */
    private $orden;

    /**
     * @var int
     *
     * @ORM\Column(name="experiencia", type="integer")
     */
    private $experiencia;

        /**
     * @ORM\ManyToMany(targetEntity="mans", inversedBy="id")
     * @ORM\JoinTable(name="rel_mis_mans_camp",
     *      joinColumns={@ORM\JoinColumn(name="id_misiones", referencedColumnName="id_misiones")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_mans", referencedColumnName="id_mans")}
     *      )
     * @var Collection
     */
    private $mans;


    public function __construct()
    {
        //$this->currencies = new ArrayCollection();
        $this->mans = new ArrayCollection();
    }

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
     * Set idTipomision.
     *
     * @param int $idTipomision
     *
     * @return misiones
     */
    public function setIdTipomision($idTipomision)
    {
        $this->idTipomision = $idTipomision;

        return $this;
    }

    /**
     * Get idTipomision.
     *
     * @return int
     */
    public function getIdTipomision()
    {
        return $this->idTipomision;
    }

    /**
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return misiones
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion.
     *
     * @param string $descripcion
     *
     * @return misiones
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

    /**
     * Set valor.
     *
     * @param int $currencyNec
     *
     * @return misiones
     */
    public function setCurrencynec($currencyNec)
    {
        $this->currencyNec = $currencyNec;

        return $this;
    }

    /**
     * Get currencyNec.
     *
     * @return int
     */
    public function getCurrencynec()
    {
        return $this->currencyNec;
    }

    /**
     * Set nivel.
     *
     * @param int $nivel
     *
     * @return misiones
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel.
     *
     * @return int
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set numMax.
     *
     * @param int $numMax
     *
     * @return misiones
     */
    public function setNumMax($numMax)
    {
        $this->numMax = $numMax;

        return $this;
    }

    /**
     * Get numMax.
     *
     * @return int
     */
    public function getNumMax()
    {
        return $this->numMax;
    }

    /**
     * Set currencyVal.
     *
     * @param int $currencyVal
     *
     * @return misiones
     */
    public function setCurrencyVal($currencyVal)
    {
        $this->currencyVal = $currencyVal;

        return $this;
    }

    /**
     * Get currencyVal.
     *
     * @return int
     */
    public function getCurrencyVal()
    {
        return $this->currencyVal;
    }

    /**
     * Set orden.
     *
     * @param int $orden
     *
     * @return misiones
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get experiencia.
     *
     * @return int
     */
    public function getExperiencia()
    {
        return $this->experiencia;
    }

    /**
     * Set experiencia.
     *
     * @param int $experiencia
     *
     * @return misiones
     */
    public function setExperiencia($experiencia)
    {
        $this->experiencia = $experiencia;

        return $this->experiencia;
    }

    /**
     * Get orden.
     *
     * @return int
     */
    public function getOrden()
    {
        return;
    }

    /**
     * Get mans.
     *
     * @return string
     */
    public function getMans()
    {
        return $this->mans;
    }

    /**
     * Add man.
     *
     * @param mans $mans
     * @return self
     */
    public function addMan(mans $mans)
    {
        $this->mans->add($mans);
    }

    // public function setMans(ArrayCollection $mans)
    // {
    //     if (is_array($mans)) {
    //         $this->mans = $mans;
    //     } else {
    //         $this->mans->clear();
    //         $this->mans->add($mans);
    //     }
    // }
}
