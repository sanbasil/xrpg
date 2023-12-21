<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * objefectos
 *
 * @ORM\Table(name="obj_efectos")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\objefectosRepository")
 */
class objefectos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_obefectos", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_objetos", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\objects", inversedBy="id")
     * @ORM\JoinColumn(name="id_objetos", referencedColumnName="id_objetos")
     */
    private $idObjetos;

    /**
     * @var string
     *
     * @ORM\Column(name="efecto", type="string", length=255)
     */
    private $efecto;

    /**
     * @var string
     *
     * @ORM\Column(name="signo", type="string", length=1)
     */
    private $signo;

    /**
     * @var int
     *
     * @ORM\Column(name="valor", type="integer")
     */
    private $valor;

    /**
     * @var string
     *
     * ORM\Column(name="id_tablacampo", type="string", length=255)
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\tablacampo", inversedBy="id")
     * @ORM\JoinColumn(name="id_tablacampo", referencedColumnName="id_tablacampo")
     */
    private $idTablacamp;


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
     * Set idObjetos.
     *
     * @param int $idObjetos
     *
     * @return objefectos
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
     * Set efecto.
     *
     * @param string $efecto
     *
     * @return objefectos
     */
    public function setEfecto($efecto)
    {
        $this->efecto = $efecto;

        return $this;
    }

    /**
     * Get efecto.
     *
     * @return string
     */
    public function getEfecto()
    {
        return $this->efecto;
    }

    /**
     * Set signo.
     *
     * @param string $signo
     *
     * @return objefectos
     */
    public function setSigno($signo)
    {
        $this->signo = $signo;

        return $this;
    }

    /**
     * Get signo.
     *
     * @return string
     */
    public function getSigno()
    {
        return $this->signo;
    }

    /**
     * Set valor.
     *
     * @param int $valor
     *
     * @return objefectos
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor.
     *
     * @return int
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set idTablacamp.
     *
     * @param string $idTablacamp
     *
     * @return objefectos
     */
    public function setIdTablacamp($idTablacamp)
    {
        $this->idTablacamp = $idTablacamp;

        return $this;
    }

    /**
     * Get idTablacamp.
     *
     * @return string
     */
    public function getIdTablacamp()
    {
        return $this->idTablacamp;
    }
}
