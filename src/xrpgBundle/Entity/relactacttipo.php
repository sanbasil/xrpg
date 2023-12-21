<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * relactacttipo
 *
 * @ORM\Table(name="rel_act_acttipo")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\relactacttipoRepository")
 */
class relactacttipo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_relactacttipo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * ORM\Column(name="id_actions", type="integer")
     * @ORM\ManyToOne(targetEntity="actions");
     * @ORM\JoinColumn(name="id_actions", referencedColumnName="id_actions");
     */
    private $idActions;

    /**
     * @var int
     *
     * ORM\Column(name="id_acttipo", type="integer")
     * @ORM\ManyToOne(targetEntity="acttipo");
     * @ORM\JoinColumn(name="id_acttipo", referencedColumnName="id_acttipo");
     */
    private $idActtipo;


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
     * Set idActions.
     *
     * @param int $idActions
     *
     * @return relactacttipo
     */
    public function setIdActions($idActions)
    {
        $this->idActions = $idActions;

        return $this;
    }

    /**
     * Get idActions.
     *
     * @return int
     */
    public function getIdActions()
    {
        return $this->idActions;
    }

    /**
     * Set idActtipo.
     *
     * @param int $idActtipo
     *
     * @return relactacttipo
     */
    public function setIdActtipo($idActtipo)
    {
        $this->idActtipo = $idActtipo;

        return $this;
    }

    /**
     * Get idActtipo.
     *
     * @return int
     */
    public function getIdActtipo()
    {
        return $this->idActtipo;
    }
}
