<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Area {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="areas")
     */
    protected $city;

    /**
     * @ORM\OneToMany(targetEntity="Ad", mappedBy="area_ad")
     */
    protected $areas_ad;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Area
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->areas_ad = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return Area
     */
    public function setCity(\AppBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \AppBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Add areasAd
     *
     * @param \AppBundle\Entity\Ad $areasAd
     *
     * @return Area
     */
    public function addAreasAd(\AppBundle\Entity\Ad $areasAd)
    {
        $this->areas_ad[] = $areasAd;

        return $this;
    }

    /**
     * Remove areasAd
     *
     * @param \AppBundle\Entity\Ad $areasAd
     */
    public function removeAreasAd(\AppBundle\Entity\Ad $areasAd)
    {
        $this->areas_ad->removeElement($areasAd);
    }

    /**
     * Get areasAd
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAreasAd()
    {
        return $this->areas_ad;
    }
}
