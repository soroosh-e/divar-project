<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ad
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Ad {

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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="time", type="string", length=255)
     */
    private $time;

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAd() {
        $this->time = new \DateTime();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="ads")
     */
    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="cities")
     */
    protected $city;

    /**
     * @ORM\ManyToOne(targetEntity="Area", inversedBy="areas_ad")
     */
    protected $area_ad;

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
     * @return Ad
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
     * Set description
     *
     * @param string $description
     *
     * @return Ad
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Ad
     */
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set time
     *
     * @param string $time
     *
     * @return Ad
     */
    public function setTime($time) {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return string
     */
    public function getTime() {
        return $this->time;
    }


    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Ad
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return Ad
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
     * Set areaAd
     *
     * @param \AppBundle\Entity\Area $areaAd
     *
     * @return Ad
     */
    public function setAreaAd(\AppBundle\Entity\Area $areaAd = null)
    {
        $this->area_ad = $areaAd;

        return $this;
    }

    /**
     * Get areaAd
     *
     * @return \AppBundle\Entity\Area
     */
    public function getAreaAd()
    {
        return $this->area_ad;
    }
}
