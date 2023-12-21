<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelCharacActions
 *
 * @ORM\Table(name="rel_charac_actions")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\RelCharacActionsRepository")
 */
class RelCharacActions
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_characactions", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_characters", type="integer")
     * @ORM\ManyToOne(targetEntity="characters");
     * @ORM\JoinColumn(name="id_characters", referencedColumnName="id_characters");
     */
    private $idCharacters;

    /**
     * @var int
     *
     * ORM\Column(name="id_actions", type="integer")
     * @ORM\ManyToOne(targetEntity="actions");
     * @ORM\JoinColumn(name="id_actions", referencedColumnName="id_actions");
     */
    private $idActions;

    /**
     * @var int
     *
     * @ORM\Column(name="tendencia", type="integer")
     */
    private $tendencia;


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
     * Set idCharacters
     *
     * @param integer $idCharacters
     *
     * @return RelCharacActions
     */
    public function setIdCharacters($idCharacters)
    {
        $this->idCharacters = $idCharacters;

        return $this;
    }

    /**
     * Get idCharacters
     *
     * @return int
     */
    public function getIdCharacters()
    {
        return $this->idCharacters;
    }

    /**
     * Set idActions
     *
     * @param integer $idActions
     *
     * @return RelCharacActions
     */
    public function setIdActions($idActions)
    {
        $this->idActions = $idActions;

        return $this;
    }

    /**
     * Get idActions
     *
     * @return int
     */
    public function getIdActions()
    {
        return $this->idActions;
    }

    /**
     * Set tendencia
     *
     * @param integer $tendencia
     *
     * @return RelCharacActions
     */
    public function setTendencia($tendencia)
    {
        $this->tendencia = $tendencia;

        return $this;
    }

    /**
     * Get tendencia
     *
     * @return int
     */
    public function getTendencia()
    {
        return $this->tendencia;
    }
}

