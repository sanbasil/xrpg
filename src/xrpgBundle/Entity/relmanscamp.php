<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relmanscamp
 *
 * @ORM\Table(name="rel_mans_camp")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relmanscampRepository")
 */
class relmanscamp
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relmanscamp", type="integer")
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
     * ORM\Column(name="id_campaigns", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\campaigns", inversedBy="id")
     * @ORM\JoinColumn(name="id_campaigns", referencedColumnName="id_campaigns")
     */
    private $idCampaigns;


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
     * @return relmanscamp
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
     * Set idCampaigns.
     *
     * @param int $idCampaigns
     *
     * @return relmanscamp
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
}
