<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelCharacAssets
 *
 * @ORM\Table(name="rel_charac_assets")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\RelCharacAssetsRepository")
 */
class RelCharacAssets
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_characterassets", type="integer")
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
     * ORM\Column(name="id_assets", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\Assets", inversedBy="id")
     * @ORM\JoinColumn(name="id_assets", referencedColumnName="id_assets")
     */
    private $idAssets;

    /**
     * @var int
     *
     * @ORM\Column(name="valor", type="integer")
     */
    private $valor;


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
     * @return RelCharacAssets
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
     * Set idAssets
     *
     * @param integer $idAssets
     *
     * @return RelCharacAssets
     */
    public function setIdAssets($idAssets)
    {
        $this->idAssets = $idAssets;

        return $this;
    }

    /**
     * Get idAssets
     *
     * @return int
     */
    public function getIdAssets()
    {
        return $this->idAssets;
    }

    /**
     * Set valor
     *
     * @param integer $valor
     *
     * @return RelCharacAssets
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return int
     */
    public function getValor()
    {
        return $this->valor;
    }
}

