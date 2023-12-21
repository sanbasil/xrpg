<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relplaysmans
 *
 * @ORM\Table(name="rel_plays_mans")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relplaysmansRepository")
 */
class relplaysmans
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relplaysmans", type="integer")
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
     * ORM\Column(name="id_mans", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\mans", inversedBy="id")
     * @ORM\JoinColumn(name="id_mans", referencedColumnName="id_mans")
     */
    private $idMans;


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
     * @return relplaysmans
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
     * Set idMans.
     *
     * @param int $idMans
     *
     * @return relplaysmans
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
}
