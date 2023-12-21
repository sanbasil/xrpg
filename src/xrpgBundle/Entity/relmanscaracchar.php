<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relmanscaracchar
 *
 * @ORM\Table(name="rel_mans_carac_char")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relmanscaraccharRepository")
 */
class relmanscaracchar
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relmanscaracchar", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="idMans", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\mans", inversedBy="id")
     * @ORM\JoinColumn(name="id_mans", referencedColumnName="id_mans")
     */
    private $idMans;

    /**
     * @var int
     *
     * ORM\Column(name="idPelo", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\pelo", inversedBy="id")
     * @ORM\JoinColumn(name="id_pelo", referencedColumnName="id_pelo")
     */
    private $idPelo;

    /**
     * @var int
     *
     * ORM\Column(name="idBusto", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\busto", inversedBy="id")
     * @ORM\JoinColumn(name="id_busto", referencedColumnName="id_busto")
     */
    private $idBusto;

    /**
     * @var int
     *
     * ORM\Column(name="idTrasera", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\trasera", inversedBy="id")
     * @ORM\JoinColumn(name="id_trasera", referencedColumnName="id_trasera")
     */
    private $idTrasera;

    /**
     * @var int
     *
     * ORM\Column(name="idOjos", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\ojos", inversedBy="id")
     * @ORM\JoinColumn(name="id_ojos", referencedColumnName="id_ojos")
     */
    private $idOjos;

    /**
     * @var int
     *
     * ORM\Column(name="idEstatura", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\estatura", inversedBy="id")
     * @ORM\JoinColumn(name="id_estatura", referencedColumnName="id_estatura")
     */
    private $idEstatura;

    /**
     * @var int
     *
     * ORM\Column(name="idPiel", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\piel", inversedBy="id")
     * @ORM\JoinColumn(name="id_piel", referencedColumnName="id_piel")
     */
    private $idPiel;

    /**
     * @var int
     *
     * ORM\Column(name="idPelopu", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\pelopu", inversedBy="id")
     * @ORM\JoinColumn(name="id_pelopu", referencedColumnName="id_pelopu")
     */
    private $idPelopu;


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
     * Set idMans.
     *
     * @param int $idMans
     *
     * @return relmanscaracchar
     */
    public function setIdMans($idMans)
    {
        $this->idMans = $idMans;

        return $this;
    }

    /**
     * Get idMans.
     *
     * @return int
     */
    public function getIdMans()
    {
        return $this->idMans;
    }

    /**
     * Set idPelo.
     *
     * @param int $idPelo
     *
     * @return relmanscaracchar
     */
    public function setIdPelo($idPelo)
    {
        $this->idPelo = $idPelo;

        return $this;
    }

    /**
     * Get idPelo.
     *
     * @return int
     */
    public function getIdPelo()
    {
        return $this->idPelo;
    }

    /**
     * Set idBusto.
     *
     * @param int $idBusto
     *
     * @return relmanscaracchar
     */
    public function setIdBusto($idBusto)
    {
        $this->idBusto = $idBusto;

        return $this;
    }

    /**
     * Get idBusto.
     *
     * @return int
     */
    public function getIdBusto()
    {
        return $this->idBusto;
    }

    /**
     * Set idTrasera.
     *
     * @param int $idTrasera
     *
     * @return relmanscaracchar
     */
    public function setIdTrasera($idTrasera)
    {
        $this->idTrasera = $idTrasera;

        return $this;
    }

    /**
     * Get idTrasera.
     *
     * @return int
     */
    public function getIdTrasera()
    {
        return $this->idTrasera;
    }

    /**
     * Set idOjos.
     *
     * @param int $idOjos
     *
     * @return relmanscaracchar
     */
    public function setIdOjos($idOjos)
    {
        $this->idOjos = $idOjos;

        return $this;
    }

    /**
     * Get idOjos.
     *
     * @return int
     */
    public function getIdOjos()
    {
        return $this->idOjos;
    }

    /**
     * Set idEstatura.
     *
     * @param int $idEstatura
     *
     * @return relmanscaracchar
     */
    public function setIdEstatura($idEstatura)
    {
        $this->idEstatura = $idEstatura;

        return $this;
    }

    /**
     * Get idEstatura.
     *
     * @return int
     */
    public function getIdEstatura()
    {
        return $this->idEstatura;
    }

    /**
     * Set idPiel.
     *
     * @param int $idPiel
     *
     * @return relmanscaracchar
     */
    public function setIdPiel($idPiel)
    {
        $this->idPiel = $idPiel;

        return $this;
    }

    /**
     * Get idPiel.
     *
     * @return int
     */
    public function getIdPiel()
    {
        return $this->idPiel;
    }

    /**
     * Set idPelopu.
     *
     * @param int $idPelopu
     *
     * @return relmanscaracchar
     */
    public function setIdPelopu($idPelopu)
    {
        $this->idPelopu = $idPelopu;

        return $this;
    }

    /**
     * Get idPelopu.
     *
     * @return int
     */
    public function getIdPelopu()
    {
        return $this->idPelopu;
    }
}
