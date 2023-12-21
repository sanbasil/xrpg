<?php

namespace xrpgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * campaigns
 *
 * @ORM\Table(name="campaigns")
 * @ORM\Entity(repositoryClass="xrpgBundle\Repository\campaignsRepository")
 */
class campaigns
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_campaigns", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="num_mans", type="integer")
     */
    private $numMans;

    /**
     * @var int
     *
     * @ORM\Column(name="nivel", type="integer")
     */
    private $nivel;

    /**
     * @var int
     *
     * @ORM\Column(name="precio", type="integer")
     */
    private $precio;

    /**
     * @var int
     *
     * @ORM\Column(name="puntos", type="integer")
     */
    private $puntos;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=50)
     */
    private $imagen;

    // /**
    //  * @ORM\ManyToMany(targetEntity="currency", inversedBy="campaigns")
    //  * @ORM\JoinTable(name="relcampcurr",
    //  *      joinColumns={@ORM\JoinColumn(name="id_campaigns", referencedColumnName="id_campaigns")},
    //  *      inverseJoinColumns={@ORM\JoinColumn(name="id_currency", referencedColumnName="id_currency")}
    //  *      )
    //  * @var Collection
    //  */
    // private $currencies;

        /**
     * @ORM\ManyToMany(targetEntity="mans", inversedBy="campaigns")
     * @ORM\JoinTable(name="rel_mans_camp",
     *      joinColumns={@ORM\JoinColumn(name="id_campaigns", referencedColumnName="id_campaigns")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_mans", referencedColumnName="id_mans")}
     *      )
     * @var Collection
     */
    private $mans;

    public function __construct()
    {
        //$this->currencies = new ArrayCollection();
        $this->mans = new ArrayCollection();
    }


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
     * Set descripcion.
     *
     * @param string $descripcion
     *
     * @return campaigns
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set numMans.
     *
     * @param int $numMans
     *
     * @return campaigns
     */
    public function setNumMans($numMans)
    {
        $this->numMans = $numMans;

        return $this;
    }

    /**
     * Get numMans.
     *
     * @return int
     */
    public function getNumMans()
    {
        return $this->numMans;
    }

    /**
     * Set precio.
     *
     * @param int $precio
     *
     * @return campaigns
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio.
     *
     * @return int
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set puntos.
     *
     * @param int $puntos
     *
     * @return campaigns
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    /**
     * Get puntos.
     *
     * @return int
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set imagen.
     *
     * @param string $imagen
     *
     * @return campaigns
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen.
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set nivel.
     *
     * @param string $nivel
     *
     * @return campaigns
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel.
     *
     * @return string
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Get mans.
     *
     * @return string
     */
    public function getMans()
    {
        return $this->mans;
    }

    /**
     * Add man.
     *
     * @param mans $mans
     * @return self
     */
    public function addMan(mans $mans)
    {
        $this->mans->add($mans);
        //$mans->addCampaign($this);
      //$this->mans[] = $mans;
  
      //return $this;
    }

    public function setMans(ArrayCollection $mans)
    {
        if (is_array($mans)) {
            $this->mans = $mans;
        } else {
            $this->mans->clear();
            $this->mans->add($mans);
        }
    }


    // /**
    //  * Get currencies.
    //  *
    //  * @return string
    //  */
    // public function getCurrencies()
    // {
    //     return $this->currencies;
    // }

    // public function setCurrencies(ArrayCollection $currencies)
    // {
    //     if (is_array($currencies)) {
    //         $this->currencies = $currencies;
    //     } else {
    //         $this->currencies->clear();
    //         $this->currencies->add($currencies);
    //     }
    // }

    // public function addCurrencies(currencies $currencies)
    // {
    //   $this->currencies[] = $currencies;
  
    //   return $this;
    // }

    // public function removeCurrencies(currencies $currencies)
    // {
    //   $this->currencies->removeElement($currencies);
    // }
    
}
