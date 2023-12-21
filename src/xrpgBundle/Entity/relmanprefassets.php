<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relmanprefassets
 *
 * @ORM\Table(name="rel_man_pref_assets")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relmanprefassetsRepository")
 */
class relmanprefassets
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relmanprefassets", type="integer")
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
     * ORM\Column(name="id_assets", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\Assets", inversedBy="id")
     * @ORM\JoinColumn(name="id_assets", referencedColumnName="id_assets")
     */
    private $idAssets;


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
     * @return relmanprefassets
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
     * Set idAssets.
     *
     * @param int $idAssets
     *
     * @return relmanprefassets
     */
    public function setIdAssets($idAssets)
    {
        $this->idAssets = $idAssets;

        return $this;
    }

    /**
     * Get idAssets.
     *
     * @return int
     */
    public function getIdAssets()
    {
        return $this->idAssets;
    }
}
