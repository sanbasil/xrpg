<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relmanprefcum
 *
 * @ORM\Table(name="rel_man_pref_cum")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relmanprefcumRepository")
 */
class relmanprefcum
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relmanprefcum", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_mans", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\mans", inversedBy="id")
     * @ORM\JoinColumn(name="id_mans", referencedColumnName="id_mans")
     */
    private $idMans;

    /**
     * @var int
     *
     * ORM\Column(name="id_actions", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\actions", inversedBy="id")
     * @ORM\JoinColumn(name="id_actions", referencedColumnName="id_actions")
     */
    private $idActions;

    /**
     * @var int
     *
     * @ORM\Column(name="tendencia", type="integer")
     */
    private $tendencia;


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
     * @return relmanprefcum
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
     * Set idActions.
     *
     * @param int $idActions
     *
     * @return relmanprefcum
     */
    public function setIdActions($idActions)
    {
        $this->idActions = $idActions;

        return $this;
    }

    /**
     * Get idActions.
     *
     * @return int
     */
    public function getIdActions()
    {
        return $this->idActions;
    }

    /**
     * Set tendencia.
     *
     * @param int $tendencia
     *
     * @return relmanprefcum
     */
    public function setTendencia($tendencia)
    {
        $this->tendencia = $tendencia;

        return $this;
    }

    /**
     * Get tendencia.
     *
     * @return int
     */
    public function getTendencia()
    {
        return $this->tendencia;
    }
}
