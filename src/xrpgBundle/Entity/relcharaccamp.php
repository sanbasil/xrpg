<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relcharaccamp
 *
 * @ORM\Table(name="rel_charac_camp")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relcharaccampRepository")
 */
class relcharaccamp
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relcharaccamp", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_characters", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\characters", inversedBy="id")
     * @ORM\JoinColumn(name="id_characters", referencedColumnName="id_characters")
     */
    private $idCharacters;

    /**
     * @var int
     *
     * ORM\Column(name="id_campaigns", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\campaigns", inversedBy="id")
     * @ORM\JoinColumn(name="id_campaigns", referencedColumnName="id_campaigns")
     */
    private $idCampaigns;

    /**
     * @var int
     *
     * @ORM\Column(name="estado", type="integer")
     */
    private $estado;


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
     * @return relcharaccamp
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
     * Set idCampaigns.
     *
     * @param int $idCampaigns
     *
     * @return relcharaccamp
     */
    public function setIdCampaigns($idCampaigns)
    {
        $this->idCampaigns = $idCampaigns;

        return $this;
    }

    /**
     * Get idCampaigns.
     *
     * @return int
     */
    public function getIdCampaigns()
    {
        return $this->idCampaigns;
    }

    /**
     * Set estado.
     *
     * @param int $estado
     *
     * @return relcharaccamp
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado.
     *
     * @return int
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
