<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relcharaccurr
 *
 * @ORM\Table(name="rel_charac_curr")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relcharaccurrRepository")
 */
class relcharaccurr
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relcharaccurr", type="integer")
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
     * ORM\Column(name="id_currency", type="integer")
     * @ORM\ManyToOne(targetEntity="xrpgBundle\Entity\currency", inversedBy="id")
     * @ORM\JoinColumn(name="id_currency", referencedColumnName="id_currency")
     */
    private $idCurrency;

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
     * Set idCharacters.
     *
     * @param int $idCharacters
     *
     * @return relcharaccurr
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
     * Set idCurrency.
     *
     * @param int $idCurrency
     *
     * @return relcharaccurr
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

    /**
     * Set cantidad.
     *
     * @param int $cantidad
     *
     * @return relcharaccurr
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
