<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relplayscum
 *
 * @ORM\Table(name="rel_plays_cum")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relplayscumRepository")
 */
class relplayscum
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relplayscum", type="integer")
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
     * ORM\Column(name="id_mans", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\mans", inversedBy="id")
     * @ORM\JoinColumn(name="id_mans", referencedColumnName="id_mans")
     */
    private $idMans;

    /**
     * @var int
     *
     * ORM\Column(name="tipocum", type="integer")
     * @ORM\ManyToOne(targetEntity="actions");
     * @ORM\JoinColumn(name="tipocum", referencedColumnName="id_actions");
     */
    private $tipocum;


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
     * @return relplayscum
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
     * @return relplayscum
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
     * Set idMans.
     *
     * @param int $idMans
     *
     * @return relplayscum
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
     * Set tipocum.
     *
     * @param int $tipocum
     *
     * @return relplayscum
     */
    public function setTipocum($tipocum)
    {
        $this->tipocum = $tipocum;

        return $this;
    }

    /**
     * Get tipocum.
     *
     * @return int
     */
    public function getTipocum()
    {
        return $this->tipocum;
    }
}
