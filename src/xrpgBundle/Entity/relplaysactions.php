<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relplaysactions
 *
 * @ORM\Table(name="rel_plays_actions")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relplaysactionsRepository")
 */
class relplaysactions
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relplaysactions", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_plays", type="integer")
     * @ORM\ManyToOne(targetEntity="plays");
     * @ORM\JoinColumn(name="id_plays", referencedColumnName="id_plays");
     */
    private $idPlays;

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
     * ORM\Column(name="id_Actions", type="integer")
     * @ORM\ManyToOne(targetEntity="actions");
     * @ORM\JoinColumn(name="id_actions", referencedColumnName="id_actions");
     */
    private $idActions;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;


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
     * Set idPlays.
     *
     * @param int $idPlays
     *
     * @return relplaysactions
     */
    public function setIdPlays($idPlays)
    {
        $this->idPlays = $idPlays;

        return $this;
    }

    /**
     * Get idPlays.
     *
     * @return int
     */
    public function getIdPlays()
    {
        return $this->idPlays;
    }

    /**
     * Set idCharacters.
     *
     * @param int $idCharacters
     *
     * @return relplaysactions
     */
    public function setIdCharacters($idCharacters)
    {
        $this->idCharacters = $idCharacters;

        return $this;
    }

    /**
     * Get idCharacters.
     *
     * @return int
     */
    public function getIdCharacters()
    {
        return $this->idCharacters;
    }

    /**
     * Set idActions.
     *
     * @param int $idActions
     *
     * @return relplaysactions
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
     * Set cantidad.
     *
     * @param int $cantidad
     *
     * @return relplaysactions
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad.
     *
     * @return int
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }
}
