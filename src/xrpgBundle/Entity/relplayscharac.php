<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relplayscharac
 *
 * @ORM\Table(name="rel_plays_charac")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relplayscharacRepository")
 */
class relplayscharac
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relplayscharac", type="integer")
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
     * @return relplayscharac
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
     * @return relplayscharac
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
}
