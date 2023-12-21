<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelActionsVir
 *
 * @ORM\Table(name="rel_actions_vir")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\RelActionsVirRepository")
 */
class RelActionsVir
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_actionsvir", type="integer")
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
     * Set idActions.
     *
     * @param int $idActions
     *
     * @return RelActionsVir
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
     * Set idVirtudes.
     *
     * @param int $idVirtudes
     *
     * @return RelActionsVir
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
