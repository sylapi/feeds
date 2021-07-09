<?php
namespace Sylapi\Feeds\Models;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("tax")
 * @Serializer\AccessType("public_method")
 */
class Tax
{
    /**
     * @Serializer\Type("string")
     */
    private $country;

    /**
     * @Serializer\Type("string")
     */
    private $region;
    
    /**
     * @Serializer\Type("double")
     */
    private $rate;

    /**
     * @Serializer\Type("boolean")
     */
    private $taxShip;

    /**
     * Get the value of country
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of region
     */ 
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set the value of region
     *
     * @return  self
     */ 
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }



    /**
     * Get the value of rate
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of taxShip
     */ 
    public function getTaxShip()
    {
        return $this->taxShip;
    }

    /**
     * Set the value of taxShip
     *
     * @return  self
     */ 
    public function setTaxShip($taxShip)
    {
        $this->taxShip = $taxShip;

        return $this;
    }
}