<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relcampcurr
 *
 * @ORM\Table(name="rel_camp_curr")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relcampcurrRepository")
 */
class relcampcurr
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relcamcurr", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_campañas", type="integer")
     * ORM\ManyToOne(targetEntity="xrpgBundle\Entity\campaigns", inversedBy="id")
     * ORM\JoinColumn(name="id_campañas", referencedColumnName="id_campañas")
     */
    private $idCampaigns;

    /**
     * @var int
     *
     * ORM\Column(name="id_currency", type="integer")
     * ORM\ManyToOne(targetEntity="xrpgBundle\Entity\currency", inversedBy="id")
     * ORM\JoinColumn(name="id_currency", referencedColumnName="id_currency")
     */
    private $idCurrency;


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
     * Set idCampaigns.
     *
     * @param int $idCampaigns
     *
     * @return relcampcurr
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
     * Set idCurrency.
     *
     * @param int $idCurrency
     *
     * @return relcampcurr
     */
    public function setIdCurrency($idCurrency)
    {
        $this->idCurrency = $idCurrency;

        return $this;
    }

    /**
     * Get idCurrency.
     *
     * @return int
     */
    public function getIdCurrency()
    {
        return $this->idCurrency;
    }
}
