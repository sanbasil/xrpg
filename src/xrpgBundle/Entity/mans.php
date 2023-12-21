<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * mans
 *
 * @ORM\Table(name="mans")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\mansRepository")
 */
class mans
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_mans", type="integer")
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
     * @var string
     *
     * @ORM\Column(name="apodo", type="string", length=255)
     */
    private $apodo;

    /**
     * @var int
     *
     * @ORM\Column(name="tamano", type="integer")
     */
    private $tamano;

    /**
     * @var int
     *
     * @ORM\Column(name="cc_max", type="integer")
     */
    private $cc_max;

        /**
     * @var float
     *
     * @ORM\Column(name="cc_actual", type="float")
     */
    private $cc_actual;

    /**
     * @var int
     *
     * @ORM\Column(name="nivel", type="integer")
     */
    private $nivel;

    /**
     * @var int
     *
     * ORM\Column(name="id_profesiones", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\profesiones")
     * @ORM\JoinColumn(name="id_profesiones", referencedColumnName="id_profesiones")
     */
    private $idProfesiones;

    /**
     * @var int
     *
     * ORM\Column(name="id_ritmo", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\ritmo")
     * @ORM\JoinColumn(name="id_ritmo", referencedColumnName="id_ritmo")
     */
    private $idRitmo;

    /**
     * @var int
     *
     * ORM\Column(name="id_tipocuerpo", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\tipocuerpo")
     * @ORM\JoinColumn(name="id_tipocuerpo", referencedColumnName="id_tipocuerpo")
     */
    private $idTipoCuerpo;

    /**
     * @var int
     *
     * @ORM\Column(name="activo", type="integer")
     */
    private $activo;

    /**
     * @var int
     *
     * @ORM\Column(name="aparicion", type="integer")
     */
    private $aparicion;

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
     * @ORM\Column(name="atractivo", type="integer")
     */
    private $atractivo;

    /**
     * @var int
     *
     * @ORM\Column(name="edad", type="integer")
     */
    private $edad;

    /**
     * @var int
     *
     * @ORM\Column(name="estatura", type="integer")
     */
    private $estatura;

    /**
     * @var int
     *
     * @ORM\Column(name="resistencia", type="integer")
     */
    private $resistencia;

        /**
     * @var int
     *
     * @ORM\Column(name="resistencia_o", type="integer")
     */
    private $resistencia_o;

        /**
     * @var int
     *
     * @ORM\Column(name="resistencia_m", type="integer")
     */
    private $resistencia_m;
    
    /**
     * @ORM\ManyToMany(targetEntity="campaigns", mappedBy="mans", cascade={"persist"})
     * @var Collection
     */
    private $campaigns;

    /**
     * @ORM\ManyToMany(targetEntity="misiones", mappedBy="mans", cascade={"persist"})
     * @var Collection
     */
    private $misiones;


    public function __construct()
    {
        $this->campaigns = new ArrayCollection();
    }

    public function addCampaign(campaigns $campaigns)
    {
        $this->campaigns->add($campaigns);
        //$campaigns->addMan($this);
        //$this->campaigns[] = $campaigns;
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
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return mans
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
     * Set apodo.
     *
     * @param string $apodo
     *
     * @return mans
     */
    public function setApodo($apodo)
    {
        $this->apodo = $apodo;

        return $this;
    }

    /**
     * Get apodo.
     *
     * @return string
     */
    public function getApodo()
    {
        return $this->noapodombre;
    }

    /**
     * Set tamano.
     *
     * @param int $tamano
     *
     * @return mans
     */
    public function setTamano($tamano)
    {
        $this->tamano = $tamano;

        return $this;
    }

    /**
     * Get tamano.
     *
     * @return int
     */
    public function getTamano()
    {
        return $this->tamano;
    }

    /**
     * Set cc_max.
     *
     * @param int $cc_max
     *
     * @return mans
     */
    public function setCcMax($cc_max)
    {
        $this->cc_max = $cc_max;

        return $this;
    }

    /**
     * Get cc_max.
     *
     * @return int
     */
    public function getCcMax()
    {
        return $this->cc_max;
    }

        /**
     * Set cc_actual.
     *
     * @param float $cc_actual
     *
     * @return mans
     */
    public function setCcActual($cc_actual)
    {
        $this->cc_actual = $cc_actual;

        return $this;
    }

    /**
     * Get cc_actual.
     *
     * @return float
     */
    public function getCcActual()
    {
        return $this->cc_actual;
    }

    /**
     * Set nivel.
     *
     * @param int $nivel
     *
     * @return mans
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
     * Set idProfesiones.
     *
     * @param int $idProfesiones
     *
     * @return mans
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

    /**
     * Set activo.
     *
     * @param int $activo
     *
     * @return mans
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo.
     *
     * @return int
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set aparicion.
     *
     * @param int $aparicion
     *
     * @return int
     */
    public function setAparicion($aparicion)
    {
        $this->aparicion = $aparicion;

        return $this;
    }

    /**
     * Get aparicion.
     *
     * @return int
     */
    public function getAparicion()
    {
        return $this->aparicion;
    }

    /**
     * Set estamina_max.
     *
     * @param int $estamina_max
     *
     * @return int
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
        $this->estamina_max = $estamina_max;

        return $this;
    }

    /**
     * Get estamina_actual.
     *
     * @return int
     */
    public function getEstaminaActual()
    {
        return $this->estamina_actual;
    }

    /**
     * Set estamina_actual.
     * 
     * @param int $estamina_actual
     *
     * @return int
     */
    public function setEstaminaActual($estamina_actual)
    {
        $this->estamina_actual = $estamina_actual;

        return $this;
    }

    /**
     * Set atractivo.
     *
     * @param int $atractivo
     *
     * @return int
     */
    public function setAtractivo($atractivo)
    {
        $this->atractivo = $atractivo;

        return $this;
    }

    /**
     * Get atractivo.
     *
     * @return int
     */
    public function getAtractivo()
    {
        return $this->atractivo;
    }

    /**
     * Set edad.
     *
     * @param int $edad
     *
     * @return int
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad.
     *
     * @return int
     */
    public function getEdad()
    {
        return $this->edad;
    }

        /**
     * Set estatura.
     *
     * @param int $estatura
     *
     * @return int
     */
    public function setEstatura($estatura)
    {
        $this->estatura = $estatura;

        return $this;
    }

    /**
     * Get estatura.
     *
     * @return int
     */
    public function getEstatura()
    {
        return $this->estatura;
    }

    /**
     * Set resistencia.
     *
     * @param int $resistencia
     *
     * @return int
     */
    public function setResistencia($resistencia)
    {
        $this->resistencia = $resistencia;

        return $this;
    }

    /**
     * Get resistencia.
     *
     * @return int
     */
    public function getResistencia()
    {
        return $this->resistencia;
    }

    /**
     * Set resistencia_o.
     *
     * @param int $resistencia_o
     *
     * @return int
     */
    public function setResistenciaO($resistencia_o)
    {
        $this->resistencia_o = $resistencia_o;

        return $this;
    }

    /**
     * Get resistencia_o.
     *
     * @return int
     */
    public function getResistenciaO()
    {
        return $this->resistencia_o;
    }

        /**
     * Set resistencia_m.
     *
     * @param int $resistencia_m
     *
     * @return int
     */
    public function setResistenciaM($resistencia_m)
    {
        $this->resistencia_m = $resistencia_m;

        return $this;
    }

    /**
     * Get resistencia_m.
     *
     * @return int
     */
    public function getResistenciaM()
    {
        return $this->resistencia_m;
    }

    /**
     * Set idRitmo.
     *
     * @param int $idRitmo
     *
     * @return int
     */
    public function setIdRitmo($idRitmo)
    {
        $this->idRitmo = $idRitmo;

        return $this;
    }

    /**
     * Get idRitmo.
     *
     * @return int
     */
    public function getIdRitmo()
    {
        return $this->idRitmo;
    }

        /**
     * Set idTipoCuerpo.
     *
     * @param int $idTipoCuerpo
     *
     * @return int
     */
    public function setIdTipoCuerpo($idTipoCuerpo)
    {
        $this->idTipoCuerpo = $idTipoCuerpo;

        return $this;
    }

    /**
     * Get idTipoCuerpo.
     *
     * @return int
     */
    public function getIdTipoCuerpo()
    {
        return $this->idTipoCuerpo;
    }
}
