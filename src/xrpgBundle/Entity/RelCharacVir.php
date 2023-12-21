<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelCharacVir
 *
 * @ORM\Table(name="rel_charac_vir")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\RelCharacVirRepository")
 */
class RelCharacVir
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relcharacvir", type="integer")
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
     * ORM\Column(name="id_virtudes", type="integer")
     * @ORM\ManyToOne(targetEntity="virtudes");
     * @ORM\JoinColumn(name="id_virtudes", referencedColumnName="id_Virtudes");
     */
    private $idVirtudes;


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
     * Set idCharacters.
     *
     * @param int $idCharacters
     *
     * @return RelCharacVir
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
     * Set idVirtudes.
     *
     * @param int $idVirtudes
     *
     * @return RelCharacVir
     */
    public function setIdVirtudes($idVirtudes)
    {
        $this->idVirtudes = $idVirtudes;

        return $this;
    }

    /**
     * Get idVirtudes.
     *
     * @return int
     */
    public function getIdVirtudes()
    {
        return $this->idVirtudes;
    }
}
